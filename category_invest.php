<?php

session_start();

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Dashboard</a>
            <a href="users" class="breadcrumb">Investments</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container scroll">
     <table class="highlight striped">
        <thead>
          <tr>
              <th data-field="name">ID</th>
              <th data-field="name">Name</th>
              <th data-field="description">Description</th>
              <th data-field="location">Location</th>
              <th data-field="price">Price</th>
              <th data-field="mode">Mode</th>
              <th data-field="view">View</th>

          </tr>
        </thead>
        <tbody>
        
          <?php
          include 'db.php';

                  //get users
                  $queryproduct = "SELECT id, name, description,location,price,method FROM product WHERE method='investment'";
                  $resultproduct = $connection->query($queryproduct);
                  if ($resultproduct->num_rows > 0) {
                    while($rowproduct = $resultproduct->fetch_assoc()) {
                     $id = $rowproduct['id'];
                     $name = $rowproduct['name'];
                     $description = $rowproduct['description'];
                     $location = $rowproduct['location']; 
                     $price = $rowproduct['price']; 
                     $mode = $rowproduct['method']; 
              ?>
               <tr>
                    <td><?= $id; ?></td>
                    <td><?= $name; ?></td>
                    <td><?= $description; ?></td>
                    <td><?= $location; ?></td>
                    <td><?= $price; ?></td>
                    <td><?= $mode; ?></td>
                    <td><a href="investment.php?id=<?= $id; ?>"><i class="material-icons blue-text">open</i>view</a></td>
              </tr>
              
              <?php }}  ?>
            </tbody>
          </table>
          </div>

   <?php require 'includes/footer.php'; ?>
