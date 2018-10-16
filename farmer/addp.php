<?php

session_start();

error_reporting(0);
if(!isset($_GET['id']) && !isset($_GET['category']) && !isset($_GET['icon'])){
header('Location: index');
}

else {
$id_category =$_GET['id'];
$name_category =$_GET['category'];
$caticon =$_GET['icon'];
require 'includes/header.php';
require 'includes/navconnected.php'; } ?>

<div class="container-fluid product-page">
  <div class="container current-page">
    <nav>
      <div class="nav-wrapper">
        <div class="col s12">
          <a href="index" class="breadcrumb">Dashboard</a>
          <a href="infoproduct" class="breadcrumb">Manage Products</a>
          <a href="addproduct" class="breadcrumb">Add product</a>
          <a href="addproduct" class="breadcrumb"><?= $name_category; ?></a>
        </div>
      </div>
    </nav>
  </div>
</div>

<div class="container addp">
  <form method="post" enctype="multipart/form-data">
    <div class="card">
      <?php

       include '../db.php';
       ?>
      <div class="center-align">
       <h4>Agrovest Add Product</h4>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="fa fa-product-hunt prefix"></i>
          <input id="icon_prefix" type="text" class="validate" name="name" required>
          <label for="icon_prefix">Item name</label>
        </div>

        <div class="input-field col s12">
        <i class="fa fa-product-hunt prefix"></i>
          <input id="icon_prefix" type="number" class="validate" name="price" required>
          <label for="icon_prefix">Price</label>
        </div>

        <div class="input-field col s12">
        <i class="material-icons prefix">mode_edit</i>
          <input id="icon_prefix" type="text" class="validate" name="location" required>
          <label for="icon_prefix">Location</label>
        </div>

        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="icon_prefix2" class="materialize-textarea" name="description" required></textarea>
          <label for="icon_prefix2">Description</label>
        </div>

        <div class="input-field col s12">
        <i class="fa fa-product-hunt prefix"></i>
          <select class="icons" name="method" required>
              <option value=""  disabled selected>Choose Method</option>
              <option value="sale">Sale</option>
              <option value="investment">Investment</option>
            </select>
            <label>Role</label>
          </div>

        <div class="file-field input-field col s12">
          <div class="btn blue">
            <span>Thumbnail</span>
            <input type="file" name="thumbnail">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" name="thumbnail">
          </div>
        </div>

        <div class="file-field input-field col s12">
          <div class="red btn">
            <span>1</span>
            <input type="file" name="picture1">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" name="picture1">
          </div>
        </div>

        <div class="file-field input-field col s12">
          <div class="red btn">
            <span>2</span>
            <input type="file" name="picture2">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" name="picture2">
          </div>
        </div>

        <div class="file-field input-field col s12">
          <div class="red btn">
            <span>3</span>
            <input type="file" name="picture3">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" name="picture3">
          </div>
        </div>
      </div>

      <div class="center-align">
        <button type="submit" name="done" class="waves-effect button-rounded waves-light btn">Add Product</button>
      </div>
    </div>

    <?php require 'success.php'; ?>
  </form>
</div>

<?php require 'includes/footer.php'; ?>
