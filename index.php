<?php
require_once 'core/init.php';

// var_dump ( Config::get ( 'mysql/host' ) ); - '127.0.0.1'
// $user = DB::getInstance ()->get('users', array ('username', '=', 'alex'));

/* if(!$user->count()) {
  echo "No User", PHP_EOL;
} else {
  echo "OK!", PHP_EOL;
}  */

/* $userInsert = DB::getInstance()->insert('users', array(
    'username' =>'Dale',
    'password' => 'password',
    'salt' => 'salt',
    'category' => '1',
    'name' => 'Dale Johnson'
)); */

/* $userInsert = DB::getInstance()->update('users', 3, array( 
    'password' => 'newpassword',
    'name' => 'Dale Baraett'
)); */


// There is a flash message that confirms your login after you registered and doesnt apear agaian afterwards
if(Session::exists('home')) {
  echo '<p>' . Session::flash('home') . '</p>';
}

// echo Session::get(Config::get('session/session_name'));
$user = new User();
if($user->isLoggedIn()) {
  echo 'Logged In';
?>
  <p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>
  <ul>
  <li><a href="logout.php">Log out</a></li>
  <li><a href="update.php">Update Details</a></li>
  <li><a href="changepassword.php">Change Password</a></li>
  </ul>
<?php
  if($user->hasPermission('admin')) {
    echo '<p>You are an administrator!</p>';
  }
} else {
    echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register.</a></p>';
}