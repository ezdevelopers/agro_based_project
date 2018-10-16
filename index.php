<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
  $nav ='includes/nav.php';
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}


require 'includes/header.php';
require $nav; ?>

<div class="container-fluid home" id="top">
  <div class="container search">
    <nav class="animated slideInUp wow">
      <div class="nav-wrapper">
      <h2 style="text-align:center;font-size:36px">Welcome to Agrovest</h2>
        <form method="GET" action="search.php">
          <div class="input-field">
            <input id="search" class="searching" type="search" name='searched' required>
            <label for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>

          <div class="center-align">
            <button type="submit" name="search" class="blue waves-light miaw waves-effect btn hide">Search</button>
          </div>
        </form>
      </div>
    </nav>
  </div>
</div>

<div class="container most">
  <div class="row">
    <?php

     include 'db.php';

    $queryfirst = "SELECT

   product.id as 'id',
   product.name as 'name',
   product.price as 'price',
   product.thumbnail as 'thumbnail',

    SUM(sales.quantity) as 'total',
    sales.statut,
    sales.id_produit

    FROM product, sales
    WHERE product.id = sales.id_produit AND sales.statut = 'paid'
    GROUP BY product.id
    ORDER BY SUM(sales.quantity) DESC LIMIT 3";
    $resultfirst = $connection->query($queryfirst);
    if ($resultfirst->num_rows > 0) {
      // output data of each row
      while($rowfirst = $resultfirst->fetch_assoc()) {

            $id_best = $rowfirst['id'];
            $name_best = $rowfirst['name'];
            $price_best = $rowfirst['price'];
            $thumbnail_best = $rowfirst['thumbnail'];
            $totalsold = $rowfirst['total'];

            ?>

              <?php }} ?>


            </div>
          </div>

          <div class="container-fluid center-align categories">
            <a href="#category" class="button-rounded btn-large waves-effect waves-light">Categories</a>
            <div class="container" id="category">
              <div class="row">
                <?php

                //get categories
                $querycategory = "SELECT id, name, icon  FROM category";
                $total = $connection->query($querycategory);
                if ($total->num_rows > 0) {
                  // output data of each row
                  while($rowcategory = $total->fetch_assoc()) {
                    $id_category = $rowcategory['id'];
                    $name_category = $rowcategory['name'];
                    $icon_category = $rowcategory['icon'];

                    ?>

                    <div class="col s12 m4">
                      <div class="card hoverable animated slideInUp wow">
                        <div class="card-image">
                          <a href="category.php?id=<?= $id_category; ?>"><img style="display:block; height:200px;object-fit:cover;"src="src/img/<?= $icon_category; ?>.png" alt=""></a>
                          <span class="card-title white-text" style="display:block;background-color:#000;"><?= $name_category; ?></span>
                        </div>
                      </div>
                    </div>

                    <?php }} ?>
                  </div>
                </div>
              </div>


              <div class="container-fluid about" id="about">
                <div class="container">
                  <div class="row">
                    <div class="col s12 m6">
                      <div class="card animated slideInUp wow">
                        <div class="card-image">
                          <img src="src/img/agro.jpg" alt="">
                        </div>
                      </div>
                    </div>

                    <div class="col s12 m6">
                      <h3 class="animated slideInUp wow">About Us</h3>
                      <div class="divider animated slideInUp wow"></div>
                      <p class="animated slideInUp wow">Agrovest is an investment platform to help support small scale subsistence farmers in raising funds to expand their businesses. Investors gain rewards on profit of the business</p>
                      </div>

                    </div>
                  </div>
                </div>

                

                <?php
                require 'includes/secondfooter.php';
                require 'includes/footer.php'; ?>
