<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
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
            <a href="editproduct" class="breadcrumb">Sales</a>
          </div>
        </div>
      </nav>
    </div>
   </div>


<div class="container scroll">
  <table class="highlight striped">
     <thead>
       <tr>
           <th data-field="name">Item name</th>
           <th data-field="price">Price</th>
           <th data-field="quantity">Quantity</th>
           <th data-field="user">Farmer</th>
           <th data-field="address">Address</th>
           <th data-field="city">City</th>
           <th data-field="country">Country</th>
           <th data-field="buyer">Buyer</th>
       </tr>
     </thead>
     <tbody>
<?php
include '../db.php';

$queryfirst = "SELECT * FROM sales_details ORDER BY id DESC ";
$resultfirst = $connection->query($queryfirst);
if ($resultfirst->num_rows > 0) {
  // output data of each row
  while($rowfirst = $resultfirst->fetch_assoc()) {

        $idp = $rowfirst['id'];
        $product_id = $rowfirst['product_id'];
        $name = $rowfirst['product'];
        $address = $rowfirst['address'];
        $country = $rowfirst['country'];
        $quantity = $rowfirst['quantity'];
        $city = $rowfirst['city'];
        $price = $rowfirst['price'];
        $buyer = $rowfirst['user'];
        //$user_id = $rowfirst['id_user'];
      

        // //get product user
        $queryproduct = "SELECT * FROM product WHERE id = '$product_id'";
        $resultproduct = $connection->query($queryproduct);
        if ($resultproduct->num_rows > 0) {
           // output data of each row
           $rowproduct = $resultproduct->fetch_assoc();
            $user_id = $rowproduct['user_id'];
        
        }

        //get user name
        $queryuser = "SELECT fullname FROM users WHERE user_id = '$user_id'";
        $resultuser = $connection->query($queryuser);
        if ($resultuser->num_rows > 0) {
          // output data of each row
          while($rowuser = $resultuser->fetch_assoc()) {
            $fullname = $rowuser['fullname'];
            
    ?>
    <tr>
      <td><?= $name; ?></td>
      <td><?= $price; ?></td>
      <td><?= $quantity; ?></td>
      <td><?= $fullname ?></td>
      <td><?= $address; ?></td>
      <td><?= $city; ?></td>
      <td><?= $country; ?></td>
      <td><?= $buyer; ?></td>
    </tr>
    <?php }} }} ?>
  </tbody>
</table>
</div>

 <?php require 'includes/footer.php'; ?>
