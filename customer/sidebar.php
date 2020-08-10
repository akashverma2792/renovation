<?php 
	if(isset($_SESSION) && !empty($_SESSION['customerSession']) && $_SESSION['customerSession']['id'] != ""){

		if(isset($_SESSION['customerSession']['askfordashboard']) && $_SESSION['customerSession']['askfordashboard'] == "yes"){
			$_SESSION['customerSession']['askfordashboard'] = "";
		}
?>
<div class="sidebar" data-color="orange" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
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
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
		  
          <li class="nav-item ">
            <a class="nav-link" href="project.php">
              <i class="material-icons">home</i>
              <p>Project Section</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="complete-project.php">
              <i class="material-icons">home</i>
              <p>Complete Project Section</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="running-project.php">
              <i class="material-icons">home</i>
              <p>Running Project Section</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="save-for-later.php">
              <i class="material-icons">home</i>
              <p>Save For Later  Project</p>
            </a>
          </li>
		  
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