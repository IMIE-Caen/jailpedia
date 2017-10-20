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
        $user_auths = [
            'Article' =>
                ['create', 'update'],
            'Tag' =>
                ['create','update'],
            'User' =>
                ['create','update']
        ];

        if($user && $user->getRole() == 'admin'){
            return true;
        }else if ($user->getRole() == 'user' && in_array($action, $user_auths[$resource]))
            //var_dump($user_auths[$resource]);
            return true ;
        else
            throw new Exception("Vous n'avez pas le role requis pour cette action");

    }

}