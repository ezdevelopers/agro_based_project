<?php
session_start();

if (!isset($_GET['id'])) {
    header('Location: index');
}

if (!isset($_SESSION['logged_in'])) {
  $nav = 'includes/nav.php';
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}

$id_product =$_GET['id'];
 require 'includes/header.php';
 require $nav;?>

 <div class="container-fluid product-page" id="top">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Home</a>
            <a href="product.php?id=<? $id_product; ?>" class="breadcrumb">Product</a>
          </div>
        </div>
      </nav>
    </div>
   </div>


<div class="container-fluid product">
  <div class="container">
   <div class="row">
     <div class="col s12 m6">
        <div class="card">
          <div class="card-image">
            <?php

            include 'db.php';

            //get products
            $queryproduct = "SELECT id, name, price, description,location,method,id_picture, thumbnail
              FROM product WHERE id = '{$id_product}'";
            $result1 = $connection->query($queryproduct);
            if ($result1->num_rows > 0) {
            // output data of each row
            while($rowproduct = $result1->fetch_assoc()) {
              $id_productdb = $rowproduct['id'];
              $name_product = $rowproduct['name'];
              $price_product = $rowproduct['price'];
              $product_location= $rowproduct['location'];
              $method = $rowproduct['method'];
              $id_pic = $rowproduct['id_picture'];
              $description = $rowproduct['description'];
              $thumbnail_product = $rowproduct['thumbnail']; }}?>
            <img class="materialboxed" width="650" src="products/<?= $thumbnail_product; ?>" alt="">
          </div>
        </div>
     </div>

     <div class="col s12 m6">
       <form method="post">
       <h2><?= $name_product;
       if($method === "investment"){
        echo" (Investment needed)";
      }
       ?></h2>
        <h5>Price : NGN <?= $price_product; ?></h5>
        <h5>Location : <?= $product_location; ?></h5>
         <div class="divider"></div>
           <p><?= $description; ?></p>
           <?php if($method === "sale"){
            echo '<div class="input-field col s12">
            <i class="material-icons prefix">shopping_basket</i>
            <input id="icon_prefix" type="number" name="quantity" min="1" class="validate" required>
            </div>
            <div class="center-align">
           <button type="submit" name="buy" class="btn-large meh button-rounded waves-effect waves-light ">Add To Cart</button>
           </div>
            ';
           }else{
             echo"<h4>This product needs investment, please sign up as an investor</h4>";
           }
           
           ?>
         

           <?php

            if (isset($_POST['buy'])) {

               if (!isset($_SESSION['logged_in'])) {
                 echo "<meta http-equiv='refresh' content='0;url=http://localhost/Agrovest/sign' />";
               }

               else {
              $quantity = $_POST['quantity'];

              //inserting into command
              include 'db.php';

              $querybuy = "INSERT INTO sales(id_produit, quantity, statut,type, id_user)
              VALUES ('$id_productdb','$quantity','ordered','sales', '$idsess')";

            if ($connection->query($querybuy) === TRUE) {
                     $_SESSION['item'] += 1;

                     echo "<meta http-equiv='refresh' content='0;url=product.php?id=$id_productdb' />";
                 } else {
                     echo "<h5 class='text-red'>Error: " . $querybuy . "</h5><br><br><br>" . $connection->error;
                 }
                 $connection->close();
                 }
                }

            ?>
       </div>
        </form>
     </div>
   </div>
  </div>
</div>
<?php
 require 'includes/secondfooter.php';
 require 'includes/footer.php'; ?>
