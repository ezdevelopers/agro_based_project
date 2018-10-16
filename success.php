<?php
session_start();

 if (!isset($_SESSION['logged_in']) && !isset($_POST['pay'])) {
     header('Location: sign');
 }
    include 'db.php';

    $querycmd ="SELECT product.id,
                       product.name as 'product',
                       product.price as 'price',

                       sales.id as 'idcmd',
                       sales.id_produit,
                       sales.quantity as 'quantity',
                       sales.statut,
                       sales.id_user as 'iduser',

                       users.id

                       FROM product, sales, users
                       WHERE product.id = sales.id_produit AND users.id = sales.id_user
                       AND sales.id_user = '{$_SESSION['id']}' AND sales.statut = 'ordered'";
    $resultcmd = $connection->query($querycmd);
    if($resultcmd->num_rows > 0){
      while ($rowcmd = $resultcmd->fetch_assoc()) {
           $productcmd = $rowcmd['product'];
           $productid = $rowcmd['id_produit'];
           $quantitycmd = $rowcmd['quantity'];
           $pricecmd = $rowcmd['price'];
           $idcmd = $rowcmd['idcmd'];
           $firstnamecmd = $_SESSION['firstname'];
           $lastnamecmd = $_SESSION['lastname'];
           $countrycmd = $_SESSION['country'];
           $citycmd = $_SESSION['city'];
           $addresscmd = $_SESSION['address'];

           $idusercmd = $rowcmd['iduser'];


    $price = $pricecmd * $quantitycmd;
    $fullname = $firstnamecmd . " " . $lastnamecmd ;

    $query_details = "INSERT INTO sales_details(product_id,
                                                  product,
                                                  quantity,
                                                  price,
                                                  id_command,
                                                  id_user,
                                                  user,
                                                  address,
                                                  country,
                                                  city,
                                                  statut) VALUES('$productid',
                                                                '$productcmd',
                                                               '$quantitycmd',
                                                               '$price',
                                                               '$idcmd',
                                                               '$idusercmd',
                                                               '$fullname',
                                                               '$addresscmd',
                                                               '$countrycmd',
                                                               '$citycmd',
                                                               'ready')";
    $resultdetails = $connection->query($query_details);

    $querypay = "UPDATE sales SET statut = 'paid' WHERE id_user = '{$_SESSION['id']}' AND statut = 'ordered'";
    $resultpay = mysqli_query($connection, $querypay);
  }
}
    unset($_SESSION["item"]);
   $idsess = $_SESSION['id'];

   $email_sess = $_SESSION['email'];
   $country_sess = $_SESSION['country'];
   $firstname_sess = $_SESSION['firstname'];
   $lastname_sess = $_SESSION['lastname'];
   $city_sess = $_SESSION['city'];
   $address_sess = $_SESSION['address'];
   //session_destroy();

 
 ?>

  <?php
  require 'includes/header.php';
  require 'includes/navconnected.php';

  ?>

  <div class="container-fluid product-page">
    <div class="container current-page">
       <nav>
         <div class="nav-wrapper">
           <div class="col s12">
             <a href="index" class="breadcrumb">Home</a>
             <a href="cart" class="breadcrumb">Cart</a>
             <a href="checkout" class="breadcrumb">Checkout</a>
             <a href="final" class="breadcrumb">Thank you</a>
           </div>
         </div>
       </nav>
     </div>
    </div>

<div class="container thanks">
  <div class="row">
    <div class="col s12 m3">

    </div>

  <div class="col s12 m6">
  <div class="card center-align">
     <div class="card-image">
       <img src="src/img/thanks.png" class="responsive-img" alt="">
     </div>
     <div class="card-content center-align">
       <h5>Thank you for your purchase</h5>
       <p>Your order is on its way : <h5 class="green-text"><?php echo"$firstname_sess". " " . "$lastname_sess";  ?></h5></p>
     </div>
   </div>

   <div class="center-align">
     <a href="details.php" class="button-rounded blue btn waves-effects waves-light">Details</a>
     <a href="index" class="button-rounded btn waves-effects waves-light">Home</a>
   </div>
  </div>
  <div class="col s12 m3">

  </div>
 </div>
</div>

    <?php require 'includes/footer.php'; ?>
