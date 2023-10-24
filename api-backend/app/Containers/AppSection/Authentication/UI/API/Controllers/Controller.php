<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\ApiLogoutAction;
use App\Containers\AppSection\Authentication\Actions\ProxyLoginForWebClientAction;
use App\Containers\AppSection\Authentication\Actions\ProxyRefreshForWebClientAction;
use App\Containers\AppSection\Authentication\Exceptions\RefreshTokenMissedException;
use App\Containers\AppSection\Authentication\Exceptions\UserNotConfirmedException;
use App\Containers\AppSection\Authentication\Notifications\EmailVerified;
use App\Containers\AppSection\Authentication\UI\API\Requests\LogoutRequest;
use App\Containers\AppSection\Authentication\UI\API\Requests\ProxyLoginPasswordGrantRequest;
use App\Containers\AppSection\Authentication\UI\API\Requests\ProxyRefreshRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Support\Facades\Cookie;
use App\Ship\Parents\Models\Authenticator as PassportAuthenticator;
use App\Ship\Parents\Models\PassportClient;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Adldap\Laravel\Facades\Adldap;
use App\Containers\AppSection\User\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Containers\AppSection\Authentication\Actions\FindMessageForApiRootVisitorAction;

class Controller extends ApiController
{
    use AuthenticatesUsers;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function apiRoot(): JsonResponse
    {
        $message = app(FindMessageForApiRootVisitorAction::class)->run();
        return response()->json($message);
    }

    /**
     * @param ServerRequestInterface $request
     * @param LoginInterface $login
     * @return JsonResponse
     */
    public function login(ServerRequestInterface $request): JsonResponse
    {
       // $search = Adldap::search()->where('mail', '=', request('email'))->get();

        $user_format = env('LDAP_USER_FORMAT', 'cn=%s,dc=example,dc=org');
        //if(!isset($search[0]) && env('APP_ENV') != 'development')
            //return response()->json(["error" => "The credentials provided do not match our records"], 401);
        //$userdn = sprintf($user_format, $search[0]->cn[0]);

        /*if(Adldap::auth()->attempt($userdn, request('password') , true) && env('APP_ENV') != 'development'){}
        else{return response()->json(["error" => "The credentials provided do not match our records"], 401);}*/
        if(!$user = User::where('email', request('email'))->first()){
            return response()->json(["error" => "The credentials provided do not match our records"], 401);
        }

        if (!request()->header("apiKey"))
            return response()->json(["error" => "Your client is not allowed on this app"], 401);

        $client = PassportClient::findClientBySecret(request()->header("apiKey"));
        $hashed = Hash::make('temp');
        $user->password = $hashed;
        $user->save();
        // generate passport tokens
        $passport = (new PassportAuthenticator($request))
            ->authenticate($client,request('email'), 'temp');
        // return the tokens to the client
        //$user->notify(new EmailVerified());
        return new JsonResponse([
            "access_token" => $passport->access_token,
            "expires_in" => $passport->expires_in,
            "refresh_token" => $passport->refresh_token,
        ], 200);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    /**
     * This `proxyLoginForWebClient` exist only because we have `WebClient`
     * The more clients (Web Apps). Each client you add in the future, must have
     * similar functions here, with custom route for dedicated for each client
     * to be used as proxy when contacting the OAuth server.
     * This is only to help the Web Apps (JavaScript clients) hide
     * their ID's and Secrets when contacting the OAuth server and obtain Tokens.
     *
     * @param ProxyLoginPasswordGrantRequest $request
     *
     * @return JsonResponse
     * @throws UserNotConfirmedException
     */
    public function proxyLoginForWebClient(ProxyLoginPasswordGrantRequest $request): JsonResponse
    {
        $result = app(ProxyLoginForWebClientAction::class)->run($request);
        return $this->json($result['response_content'])->withCookie($result['refresh_cookie']);
    }

    /**
     * Read the comment in the function `proxyLoginForWebClient`
     *
     * @param ProxyRefreshRequest $request
     *
     * @return JsonResponse
     * @throws RefreshTokenMissedException
     */
    public function proxyRefreshForWebClient(ProxyRefreshRequest $request): JsonResponse
    {
        $result = app(ProxyRefreshForWebClientAction::class)->run($request);
        return $this->json($result['response_content'])->withCookie($result['refresh_cookie']);
    }
}
