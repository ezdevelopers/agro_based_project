<?php
session_start();

if (!isset($_SESSION['logged_in']) && !isset($_SESSION['item'])) {
    header('Location: sign');
}

elseif($_SESSION['item'] < 1){
  header('Location: index');
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];

  $email_sess = $_SESSION['email'];
  $country_sess = $_SESSION['country'];
  $firstname_sess = $_SESSION['firstname'];
  $lastname_sess = $_SESSION['lastname'];
  $city_sess = $_SESSION['city'];
  $address_sess = $_SESSION['address'];
  $price = $_SESSION['total_price'];
}

 require 'includes/header.php';
 require $nav;?>
 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Home</a>
            <a href="cart" class="breadcrumb">Cart</a>
            <a href="checkout" class="breadcrumb">Checkout</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container checkout">
    <div class="card pay">
      <form method="post" action="processPayment">
        <div class="row">
          <input type="hidden" name="id" value="<?= $idsess; ?>" /> 
          <input type="hidden" name="amount" value="<?= $price; ?>" /> <!-- Replace the value with your transaction amount -->
          <input type="hidden" name="payment_method" value="both" /> <!-- Can be card, account, both (optional) -->
          <input type="hidden" name="description" value="Agro Investors and Ecommerce" /> <!-- Replace the value with your transaction description -->
          <input type="hidden" name="logo" value="" /> <!-- Replace the value with your logo url (optional) -->
          <input type="hidden" name="title" value="Agrovest" /> <!-- Replace the value with your transaction title (optional) -->
          <input type="hidden" name="country" value="NG" /> <!-- Replace the value with your transaction country -->
          <input type="hidden" name="currency" value="NGN" /> <!-- Replace the value with your transaction currency -->
          <input type="hidden" name="pay_button_text" value="Complete Payment" /> <!-- Replace the value with the payment button text you prefer (optional) -->
          <input type="hidden" name="env" value="staging"> <!-- live or staging -->
          <input type="hidden" name="publicKey" value="FLWPUBK-5187e64233eeeba57f4dae7c78eec2e5-X"> <!-- Put your public key here -->
          <input type="hidden" name="secretKey" value="FLWSECK-96e6f9d23eda87bb1f4fef959270fcad-X"> <!-- Put your secret key here -->
          <input type="hidden" name="successurl" value="http://localhost/Agrovest/success"> <!-- Put your success url here -->
          <input type="hidden" name="failureurl" value="http://localhost/Agrovest/failed">
            
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="icon_prefix" type="text" name="email" value='<?= $email_sess; ?>' class="validate" required>
              <label for="icon_prefix">Email</label>
            </div>

            <div class="input-field col s6">
              <select class="icons" name="country" value="<?= $country_sess; ?>">
            <option value=""  disabled selected>Choose your country</option>
           <option value="NG">Nigeria</option>
           </select>
        <label>Country</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" name="firstname" value='<?= $firstname_sess; ?>' class="validate" required>
              <label for="icon_prefix">First Name</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input id="icon_prefix" type="text" name="lastname" value='<?= $lastname_sess; ?>' class="validate" required>
              <label for="icon_prefix">Last Name</label>
            </div>


            <div class="input-field col s6">
              <i class="material-icons prefix">business</i>
              <input id="icon_prefix" type="text" value='<?= $city_sess; ?>' name="city" class="validate" required>
              <label for="icon_prefix">City</label>
            </div>

            <div class="input-field col s6 meh">
              <i class="material-icons prefix">location_on</i>
              <input id="icon_prefix" type="text" value='<?= $address_sess; ?>' name="address" class="validate" required>
              <label for="icon_prefix">Address</label>
            </div>

                <div class="center-align">
                  <button type="submit" id="confirmed" name="pay" class="btn meh button-rounded waves-effect waves-light ">Pay</button>
                </div>
          </div>
      </form>
    </div>
</div>

 <?php require 'includes/footer.php'; ?>
