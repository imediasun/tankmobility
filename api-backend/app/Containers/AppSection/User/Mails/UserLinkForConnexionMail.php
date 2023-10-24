<?php

namespace App\Containers\AppSection\User\Mails;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Mails\Mail as ParentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLinkForConnexionMail extends ParentMail implements ShouldQueue
{
    use Queueable;

    protected User $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function build(): static
    {
        return $this->view('appSection@user::user-linkForConnexion')
            ->to($this->user->email, $this->user->name)
            ->with([
                'name' => $this->user->name,
            ]);
    }
}
