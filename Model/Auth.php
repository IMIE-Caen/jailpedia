<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 20/10/17
 * Time: 10:29
 */

class Auth
{

    public static function authorize($user,$action,$resource){
        $admin_auths = [
            'Article' =>
                ['create', 'update','edit','delete'],
            'Tag' =>
                ['create','update','edit','delete'],
            'User' =>
                ['create','update','edit','delete']
        ];

        if($user && $user->getRole() == 'admin'){
            return true;
        }else if ($user->getRole() && in_array($action, $admin_auths[$resource]))
            var_dump($admin_auths[$resource]);
            //return true ;
        else
            //throw(new UnauthorizedException());
            return 'Erreur';

    }

}