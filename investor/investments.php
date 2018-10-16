<?php

session_start();

if ($_SESSION['role'] !== 'investor') {
  header('Location: ../index');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; 
 //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="../index" class="breadcrumb">Agro Investment</a>
            <a href="index" class="breadcrumb">Investor Dashboard</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container dashboard">
  <div class="row">
</div>


 <?php require 'includes/footer.php'; ?>
