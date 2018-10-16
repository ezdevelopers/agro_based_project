<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
}

elseif($_SESSION['logged_in'] == 'True') {
  header('Location: index');
}

else{
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}
error_reporting(0);

 require 'includes/header.php';
 require $nav; ?>



<div class="container-fluid sign">
  <div class="container">

  <div class="row">
    <div class="col s12">
       <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">Log In</a></li>
        <li class="tab col s3"><a  href="#test2">Sign Up</a></li>
       </ul>
   </div>

<div class="container forms">
 <div class="row">

<div id="test2" class="col s12 left-align">
     <div class="card">
       <div class="row">

    <form class="col s12" method="POST" enctype="multipart/form-data" href="sign.php">
    <?php 
    if (isset($_POST['signup'])) {
    
      $email = $_POST['email'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $password = $_POST['password'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      $role = $_POST['role'];
    
      $encryptedpass = md5($password);
    
    
      include 'db.php';
    
      //connecting & inserting data
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

  $query = "INSERT INTO {$user_table} (email,
    firstname,
    lastname,
    password,
    address,
    city,
    country,
    role) VALUES ('$email',
    '$firstname',
    '$lastname',
    '$encryptedpass',
    '$address',
    '$city',
    'Nigeria',
    '$role')";
    
    if ($connection->query($query) === TRUE) {

    $query = "SELECT * FROM {$user_table} WHERE email = '{$email}'";
    $select_user_query = mysqli_query($connection, $query);
    if (!$select_user_query) {
      DIE("QUERY FAILED". mysqli_error($connection));
      }
      $row = mysqli_fetch_array($select_user_query);
      
      $user_id = $row['id'];
      $user_firstname= $row['firstname'];
      $user_lastname = $row['lastname'];
      $user_role = $row['role'];

    $query = "INSERT INTO users(user_id,
    fullname,role) VALUES ('$user_id',
    '{$user_firstname} {$user_lastname}',
    '$user_role')";

    $insert_user_query = mysqli_query($connection, $query);

    if (!$insert_user_query) {
      DIE("QUERY FAILED". mysqli_error($connection));
      }else{
        echo "<div class='center-align'>
        <h5 class='black-text'>Welcome <span class='green-text'>$firstname</span> Please Log In</h5>
        </div>";
      }
    
         } else {
             echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
         }
    
         $connection->close();
    
    }
    
    ?>
      <div class="row">

        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input id="icon_prefix" type="text" name="email" class="validate" required>
          <label for="icon_prefix">Email</label>
        </div>

        <div class="input-field col s6">
          <select class="icons" name="role" required>
      <option value=""  disabled selected>Choose Role</option>
      <option value="investor">Investor</option>
      <option value="farmer">Farmer</option>
    </select>
    <label>Role</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">perm_identity</i>
          <input id="icon_prefix" type="text" name="firstname" class="validate" required>
          <label for="icon_prefix">First Name</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">perm_identity</i>
          <input id="icon_prefix" type="text" name="lastname" class="validate" required>
          <label for="icon_prefix">Last Name</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="password" class="validate value1" required>
          <label for="icon_prefix">Password</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
          <label for="icon_prefix">Confirm Password</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">business</i>
          <input id="icon_prefix" type="text" name="city" class="validate" required>
          <label for="icon_prefix">City</label>
        </div>

        <div class="input-field col s6 meh">
          <i class="material-icons prefix">location_on</i>
          <input id="icon_prefix" type="text" name="address" class="validate" required>
          <label for="icon_prefix">Address</label>
        </div>

            <div class="center-align">
                <button type="submit" id="confirmed" name="signup" class="btn meh button-rounded waves-effect waves-light ">Sign up</button>
            </div>

            <p>By Registering, you agree that you've read and accepted our <a href="">User Agreement</a> and 
              you're at least 18 years old</p>
      </div>
    </form>
  </div>
     </div>
     </div>
      <div id="test1" class="col s12 left-align">

        <div class="card">
          <div class="row">
       <form class="col s12" method="POST">
       

        <div class="input-field col s12">
        <i class="material-icons prefix">account_circle</i>
          <select class="icons" name="role">
              <option value=""  disabled selected>Choose Role</option>
              <option value="investor">Investor</option>
              <option value="farmer">Farmer</option>
            </select>
            <label>Role</label>
          </div>
           <div class="input-field col s12">
             <i class="material-icons prefix">email</i>
             <input id="icon_prefix" type="text" name="emaillog" class="validate">
             <label for="icon_prefix">Email</label>
           </div>
           <div class="input-field col s12 meh">
             <i class="material-icons prefix">lock</i>
             <input id="icon_prefix" type="password" name="passworddb" class="validate">
             <label for="icon_prefix">Password</label>
           </div>

           <?php require 'includes/loginconfirmation.php';?>
               <div class="center-align">
                   <button type="submit" name="login" class="btn button-rounded waves-effect waves-light ">Login</button>
               </div>

       </form>
     </div>
        </div>

      </div>
      </div>
      </div>
   </div>
  </div>
</div>


  <?php require 'includes/footer.php'; ?>
