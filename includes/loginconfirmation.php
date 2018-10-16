<?php

if (isset($_POST['login'])) {

  $role = $_POST['role'];
      switch ($role) {
        case 'investor':
         $user_table = "investors";
          break;
        
        case 'farmer':
        $user_table = "farmers";
          break;
         
        default:
        $user_table = "admin";
          break;
      }

$email = $_POST['emaillog'];
$password=md5($_POST['passworddb']);
include 'db.php';
$email=mysqli_real_escape_string($connection, $email);
$query = "SELECT * FROM {$user_table} WHERE email='{$email}' and password = '{$password}'";
$select_user_query = mysqli_query($connection, $query);


if (!$select_user_query) {
DIE("QUERY FAILED". mysqli_error($connection));
}
$row = mysqli_fetch_array($select_user_query);

$user_id = $row['id'];
$user_email = $row['email'];
$user_password = $row['password'];
$user_firstname= $row['firstname'];
$user_lastname= $row['lastname'];
$user_address= $row['address'];
$user_city= $row['city'];
$user_country= $row['country'];
$user_role = $row['role'];
$verify = $row['verify'];


if ($email !== $user_email && $password !== $user_password) {
echo "<div class='center-align meh'>
  <h5 class='red-text'>Wrong Info, Check your Details and Role</h5>
</div>";
}



else{
  if($user_role === 'admin'){

    $_SESSION['id'] = $user_id;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['address'] = $user_address;
    $_SESSION['city'] = $user_city;
    $_SESSION['country'] = $user_country;
    $_SESSION['email'] = $user_email;
    $_SESSION['role'] = 'admin';
    $_SESSION['logged_in']= 'True';
    echo "<meta http-equiv='refresh' content='0;url=admin/index' />";
  }

    else if($user_role === 'investor' && $verify === '0') {
    $_SESSION['id'] = $user_id;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['address'] = $user_address;
    $_SESSION['city'] = $user_city;
    $_SESSION['country'] = $user_country;
    $_SESSION['email'] = $user_email;
    $_SESSION['role'] = 'investor';
    $_SESSION['verify'] = $verify;
    $_SESSION['logged_in'] = 'True';
    echo "<meta http-equiv='refresh' content='0;url=investor/editprofile'/>";

    }else if($user_role === 'investor' && $verify === '1'){
      $_SESSION['id'] = $user_id;
      $_SESSION['firstname'] = $user_firstname;
      $_SESSION['lastname'] = $user_lastname;
      $_SESSION['address'] = $user_address;
      $_SESSION['city'] = $user_city;
      $_SESSION['country'] = $user_country;
      $_SESSION['email'] = $user_email;
      $_SESSION['role'] = 'investor';
      $_SESSION['verify'] = $verify;
      $_SESSION['logged_in']= 'True';
      echo "<meta http-equiv='refresh' content='0;url=investor/index'/>";
    }
    else if($user_role === 'farmer' && $verify === '0') {
      $_SESSION['id'] = $user_id;
      $_SESSION['firstname'] = $user_firstname;
      $_SESSION['lastname'] = $user_lastname;
      $_SESSION['address'] = $user_address;
      $_SESSION['city'] = $user_city;
      $_SESSION['country'] = $user_country;
      $_SESSION['email'] = $user_email;
      $_SESSION['verify'] = $verify;
      $_SESSION['logged_in']= 'True';
      $_SESSION['role'] = 'farmer';
      echo "<meta http-equiv='refresh' content='0;url=farmer/editprofile'/>";
      }

      else if($user_role === 'farmer' && $verify === '1') {
        $_SESSION['id'] = $user_id;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['address'] = $user_address;
        $_SESSION['city'] = $user_city;
        $_SESSION['country'] = $user_country;
        $_SESSION['email'] = $user_email;
        $_SESSION['verify'] = $verify;
        $_SESSION['logged_in']= 'True';
        $_SESSION['role'] = 'farmer';
        // $back = $_SERVER['HTTP_REFERER'];
        //header('Location:www.google.com');
        echo "<meta http-equiv='refresh' content='0;url=farmer/index'/>";
        }
 }
}

?>
