<?php

session_start();

if ($_SESSION['role'] !== 'investor') {
  header('Location: ../index');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Dashboard</a>
            <a href="editprofile" class="breadcrumb">Edit Profile</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container editprofile">
  <div class="container">
    <div class="card">
      <div class="row">
      <?php
      if(isset($_SESSION['verify'])){
        if($_SESSION['verify'] == 0){
          echo' <div class="row" style="display:block;border:1px solid red;padding:30px"> Your account is not verified. Please apply for verification to receive funds';

        }
      }
     
      ?>

   <form class="col s12" method="POST" >
     <div class="row">
    
       <div class="input-field col s12">
      
         <i class="material-icons prefix">email</i>
         <input id="icon_prefix" type="text" name="email" class="validate" required>
         <label for="icon_prefix">Email</label>
        
       </div>
       
       
       <div class="input-field col s12">
      
         <i class="material-icons prefix">account_circle</i>
         <input id="icon_prefix" type="file" name="id" class="validate value1" required>
         <label for="icon_prefix">Upload ID</label>
         
       </div>

       
       <div class="input-field col s12 meh">
       
         <i class="material-icons prefix">account_circle</i>
         <input id="icon_prefix" type="file" name="land" class="validate value2" required>
         <label for="icon_prefix">Land Verification</label>
         
       </div>
            <?php

             if (isset($_POST['update'])) {

               $newemail = $_POST['email'];
               $newpassword = md5($_POST['password']);

              include '../db.php';
              // update info on users Toble
              $queryupdate = "UPDATE users SET email ='$newemail', password ='$newpassword' WHERE role='admin'";
              $result = $connection->query($queryupdate);

              echo "<meta http-equiv='refresh' content='0'; url='editprofile' />";

             }

             ?>
           <div class="center-align">
               <button type="submit" id="confirmed" name="update" class="btn meh button-rounded waves-effect waves-light ">Apply For Verification</button>
           </div>

     </div>
   </form>
 </div>
    </div>
  </div>
</div>
    <?php require 'includes/footer.php'; ?>
