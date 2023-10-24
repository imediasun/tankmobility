<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Hash;
use Adldap\Laravel\Facades\Adldap;

class CreateUserByCredentialsInLDAPTask extends ParentTask
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(User $user,$sanitizedData): User
    {

        try {
            $ds = ldap_connect(env('LDAP_HOSTS'));
            if ($ds) {

                ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
                $r = ldap_bind($ds, "cn=admin,dc=example,dc=org", 'admin');
                $info["cn"] = $user->name;
                $info["sn"] = $user->name;
                $info["mail"] = $user->email;
                $info['objectclass'][0] = "top";
                $info['objectclass'][1] = "posixAccount";
                $info['objectclass'][2] = "inetOrgPerson";
                $info['uid'] = $user->name;
                $info['uidnumber'] = 1;
                $info['givenname'] = $user->name;
                $info['gidnumber'] = 1;
                $info['userpassword'] = $sanitizedData['password'];
                $info['loginshell'] = '/bin/sh';
                $info['homedirectory'] = "/home/users/".$user->name;
                $dn = "cn=".$user->name.",dc=example,dc=org";
                // add data to directory
                $r = ldap_add($ds, $dn, $info);

                ldap_close($ds);
            } else {
                echo "Unable to connect to LDAP server";
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
            throw new CreateResourceFailedException();
        }

        return $user;
    }
}
