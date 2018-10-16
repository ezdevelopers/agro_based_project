
<ul id="dropdown2" class="dropdown-content">
  <?php 
  if($_SESSION['role'] === 'admin'){
    echo'<li><a href="admin/index.php" class="dark-text">Admin</a></li>';
  }elseif($_SESSION['role'] === 'investor'){
    echo'<li><a href="investor/index.php" class="dark-text">Dashboard</a></li>';
  }elseif($_SESSION['role'] === 'farmer'){
    echo'<li><a href="farmer/index.php" class="dark-text">Dashboard</a></li>';
  }
  else{
    echo'<li><a href="index" class="dark-text">Home</a></li>';
  }
  ?> 

<li><a class="blue-text" href="includes/logout">Log out</a></li>
</ul>
<div class="navbar-fixed">
 <nav class="navblack">
   <div class="nav-wrapper nav-wrapper-2 container white">
   <ul class="left">
     <li><a href="index" class="brand"></a></li>
     <li><a href="index" class="dark-text">Agrovest</a></li>

   </ul>

   <ul  class="right">
       
     <li><a href="cart" class="dark-text baskett"><i class="material-icons">shopping_cart</i>
       <span class="badge <?php if(!isset($_SESSION['item']) OR $_SESSION['item'] == 0) echo'hide'; ?>"><?= $_SESSION['item']; ?></span></a></li>
     <li><a href="editprofile" class="nohover dropdown-button" class="dropdown-button" data-activates="dropdown2"><img class="responsive-img" src="users/default.jpg"></a></li>
   </ul>
 </div>
 </nav>
</div>
