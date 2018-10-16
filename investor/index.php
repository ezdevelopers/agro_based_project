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

         <div class="col s12 m4">
           <div class="card horizontal red lighten-1">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">supervisor_account</i><a href="../category_invest.php" class="white-text">Invest in Product</a></h5>
              </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card blue lighten-1 horizontal">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">shopping_cart</i><a href="investments" class="white-text">Total Investment</a></h5>
              </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card green lighten-1 horizontal">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">shopping_cart</i><a href="investments" class="white-text">Check Returns</a></h5>
              </div>
             </div>
           </div>
         </div>
       </div>
</div>


 <?php require 'includes/footer.php'; ?>
