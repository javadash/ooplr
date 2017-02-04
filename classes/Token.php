<?php
class Token {
  // gats the values for session[token_name] and associates it with md5 
  public static function generate() {
    return Session::put(Config::get('session/token_name'), md5(uniqid()));
  }
/*   this function check token sent by the form
  then finds out if a session already exists with that token
  we are checking the token in the form and the token in the session to see if they match
  check a session with the set token and token in the form, if it does we delete the token
  we dont need it anymore and true, this means Cross Site Request Forgery has failed */
  public static function check($token){
    $tokenName = Config::get('session/token_name');
    if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
      Session::delete($tokenName);
      return true;
    }
    return false;
  }
}