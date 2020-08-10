<?php 
	if(isset($_SESSION) && !empty($_SESSION['adminLoginSess']) && $_SESSION['adminLoginSess']['email'] != ""){
?>
<style>
a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}
</style>
<div class="sidebar" data-color="orange" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="https://renovationexperts.in/" class="simple-text logo-normal">
          Renovation Experts
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>

      <li class="nav-item ">
        <a class="nav-link" href="admin.php"><i class="material-icons">people</i>
          <p>Admin Section</p>
        </a>
      </li>

		  <li class="nav-item">
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
				<i class="material-icons">people</i>
				<p>Staff Management</p>
				</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
              <li class="nav-item ">
                  <a class="nav-link" href="design-engineer.php">Design Engineer</a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="quick-estimate-engg.php">Quick Estimate Engg.</a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="vendors.php">Vendors</a>
              </li>
          </ul>
      </li>
      <li class="nav-item">
        <a href="#headSection" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
        <i class="material-icons">list</i>
        <p>Head Section</p>
        </a>
          <ul class="collapse list-unstyled" id="headSection">
              <li class="nav-item ">
                  <a class="nav-link" href="head.php">Heads</a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="heads-category.php">Heads Category</a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="heads-sub-category.php">Heads Sub Category</a>
              </li>
          </ul>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="customer.php"><i class="material-icons">people</i>
          <p>Customer Section</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="property.php"><i class="material-icons">home</i>
          <p>Property Section</p>
        </a>
      </li>
		<!---
          <li class="nav-item ">
            <a class="nav-link" href="quick-estimate-engg.php">
              <i class="material-icons">people</i>
              <p>Quick Estimate Engg.</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="design-engineer.php">
              <i class="material-icons">people</i>
              <p>Design Engineer</p>
            </a>
          </li>
		  --->
			
		  <!--
          <li class="nav-item ">
            <a class="nav-link" href="tables.html">
              <i class="material-icons">content_paste</i>
              <p>Table List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="typography.html">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="rtl.html">
              <i class="material-icons">language</i>
              <p>RTL Support</p>
            </a>
          </li>
		  -->
        </ul>
      </div>
    </div>
	
	<?php  }else{
		header("location:logout.php");
	} ?>	