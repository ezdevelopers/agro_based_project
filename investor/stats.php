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
            <a href="infoproduct" class="breadcrumb">Products</a>
            <a href="stats" class="breadcrumb">stats</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

        <div class="container center-align staaats">
          <div class="row">

          <div class="container">
     <table class="highlight striped">
        <thead>
        <caption>Farmers Table</caption>
          <tr>
              <th data-field="ID">ID</th>
              <th data-field="name">Name</th>
              <th data-field="amount">Amount</th>
              <th data-field="details">Details</th>
              <th data-field="returns">Returns</th>
          </tr>
        </thead>
        <tbody>
        
          <?php
          include '../db.php';

                  //get users
                  $queryuser = "SELECT * FROM farmers";
                  $resultuser = $connection->query($queryuser);
                  if ($resultuser->num_rows > 0) {
                    while($rowuser = $resultuser->fetch_assoc()) {
                     $id_user = $rowuser['id'];
                     $firstname = $rowuser['firstname'];
                     $lastname = $rowuser['lastname']; 
                     $email = $rowuser['email']; 
                     $address = $rowuser['address']; 
                     $city = $rowuser['city']; 
                     $country = $rowuser['country']; 
                     $role = $rowuser['role']; 
              ?>
               <tr>
                    <td><?= $id_user; ?></td>
                    <td><?= $firstname; ?></td>
                    <td><?= $lastname ?></td>
                    <td><?= $email ?></td>
                    <td><?= $address ?></td>
                    <td><?= $city ?></td>
                    <td><?= $country ?></td>
                    <td><?= $role ?></td>
                    <td><a href="deleteuser.php?id=<?= $id_user; ?>"><i class="material-icons red-text">close</i></a></td>
                    <!-- <td><a href="viewuser.php?id=<?= $id_user; ?>"><i class="material-icons red-text">open</i></a></td> -->
              </tr>
              
              <?php }}  ?>
            </tbody>
          </table>
          </div>
          </div>
        </div>
 <?php require 'includes/footer.php'; ?>
