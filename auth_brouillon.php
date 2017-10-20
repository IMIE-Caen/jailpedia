<?

class Auth{
  $base_auths = ["Article"=>
                    ['create', 'update'],
                'Tag'=>
                ['create', 'update']
                ];

  static function authorize($user, $action, $resource){
    if(!$user && $action == 'read')
      return true ;
    else if($user && $user->$role == 'admin')
      return true ;
    else if ($user->$role && in_array($action, $base_auth[$resource]))
      return true ;
    else
      //throw(new UnauthorizedException());
      return 'Erreur';
  }



}

class Article{
  function create(){
    Auth::authorize($currentUser, __FUNCTION__, __CLASS__)
  }

}
