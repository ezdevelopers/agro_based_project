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
             <a href="failed" class="breadcrumb">failed</a>
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
     <div class="card-content center-align">
       <h5>Unfortunalety Your Purchase has Failed</h5>
       <p>Please try again later</p>
     </div>
   </div>

   <div class="center-align">
     <a href="index" class="button-rounded btn waves-effects waves-light">Home</a>
   </div>
  </div>
  <div class="col s12 m3">

  </div>
 </div>
</div>

    <?php require 'includes/footer.php'; ?>
