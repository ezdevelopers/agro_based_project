<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
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
            <a href="index" class="breadcrumb">Dashboard</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container dashboard">
  <div class="row">
         <div class="col s12 m4">
           <div class="card horizontal">
             <div class="card-image">
               <img src="src/img/pixel.png" alt="" />
             </div>
             <div class="card-stacked">
              <div class="card-content">
                <p>Farm Products</p>
              </div>
               <div class="card-action">
                 <a href="infoproduct" class="blue-text">Learn More</a>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card horizontal">
             <div class="card-image">
               <img src="src/img/cat.png" alt="" />
             </div>
             <div class="card-stacked">
        <div class="card-content">
          <p>Stock</p>
        </div>
             <div class="card-action">
               <a href="products" class="blue-text">Learn more</a>
             </div>
             </div>

           </div>
         </div>

         <div class="col s12 m4">
           <div class="card horizontal">
             <div class="card-image">
               <img src="src/img/user.png" alt="" />
             </div>
             <div class="card-stacked">
              <div class="card-content">
                <p>Users</p>
              </div>
               <div class="card-action">
                 <a href="allusers" class="blue-text">Learn more</a>
               </div>
             </div>
           </div>
         </div>
         <?php

            include '../db.php';
            //get total users
            $queryusers = "SELECT count(id) as total FROM users";
            $resultusers = $connection->query($queryusers);

            if($resultusers->num_rows > 0) {
              while ($rowusers = $resultusers->fetch_assoc()) {
                $totalusers = $rowusers['total'];
              }
            }

            //get total farmers
            $queryfarmers = "SELECT count(id) as total FROM farmers";
            $resultfarmers = $connection->query($queryfarmers);

            if($resultfarmers->num_rows > 0) {
              while ($rowfarmers = $resultfarmers->fetch_assoc()) {
                $totalfarmers = $rowfarmers['total'];
              }
            }

             //get total investors
             $queryinvestors = "SELECT count(id) as total FROM investors";
             $resultinvestors = $connection->query($queryinvestors);
 
             if($resultinvestors->num_rows > 0) {
               while ($rowinvestors = $resultinvestors->fetch_assoc()) {
                 $totalinvestors = $rowinvestors['total'];
               }
             }

            //get total ordered commands
            $queryorder = "SELECT count(id) as total, statut FROM sales WHERE statut = 'ordered'";
            $resultorder = $connection->query($queryorder);

            if($resultorder->num_rows > 0) {
              while ($roworder = $resultorder->fetch_assoc()) {
                $totalorder = $roworder['total'];
              }
            }

            //get total paid commands
            $querypaid = "SELECT count(id) as total, statut FROM sales WHERE statut = 'paid'";
            $resultpaid = $connection->query($querypaid);

            if($resultorder->num_rows > 0) {
              while ($rowpaid = $resultpaid->fetch_assoc()) {
                $totalpaid = $rowpaid['total'];
              }
            }
          ?>
         <div class="col s12 m4">
           <div class="card horizontal red lighten-1">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">supervisor_account</i> Total Users</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalusers; ?></h5>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card horizontal red lighten-1">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">supervisor_account</i> Total Farmers</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalfarmers; ?></h5>
               </div>
             </div>
           </div>
         </div>


         <div class="col s12 m4">
           <div class="card horizontal red lighten-1">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">supervisor_account</i> Total Investors</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalinvestors; ?></h5>
               </div>
             </div>
           </div>
         </div>


         <div class="col s12 m4">
           <div class="card blue lighten-1 horizontal">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">shopping_cart</i> Total Investments</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalorder; ?></h5>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card green lighten-1 horizontal">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">shopping_cart</i> Total Sales</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalpaid; ?></h5>
               </div>
             </div>
           </div>
         </div>
       </div>
</div>
 <?php require 'includes/footer.php'; ?>
