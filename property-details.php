<?php 
	include("model/model.php"); 
	$ob = new Model;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.ico">
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Renovation Experts
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--  Social tags      -->
  <meta name="keywords" content="">
  <meta name="description" content="">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="assets/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.min1c51.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <script>
	function confirmDelete(){
		var msg = confirm("Do you really want to delete this.");
		if (msg == true) {
		  return true;
		} else {
		  return false;
		}
	}
  </script>
</head>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <div class="wrapper ">
    <?php include("sidebar.php"); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Property Section</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="profile.php">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Property Section</h4>
                </div>
          <?php  
            $record = $ob->commonSelectJoin("property.*,client.name as client_name","property","client","property.customer_id = client.id where property.id = '".$_GET['id']."'");
            foreach($record as $row){
          ?>
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-4">
                      <div class="card card-profile">
                        <div class="card-body">
                          <h4 class="card-title">Property ID</h4>
                          <h6 class="card-category text-gray"><?php echo $row['property_id']; ?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card card-profile">
                        <div class="card-body">
                          <h4 class="card-title">Customer Name</h4>
                          <h6 class="card-category text-gray"><?php echo $row['client_name']; ?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card card-profile">
                        <div class="card-body">
                          <h4 class="card-title">Property Location</h4>
                          <h6 class="card-category text-gray"><?php echo $row['location']; ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="card card-profile">
                        <div class="card-body">
                          <h4 class="card-title">Number Of Flores</h4>
                          <h6 class="card-category text-gray"><?php echo $row['number_of_flores']; ?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card card-profile">
                        <div class="card-body">
                          <h4 class="card-title">Property Blueprint</h4>
                          <h6 class="card-category text-gray"><a href="uploads/property_blueprint/<?php echo $row['property_blueprint']; ?>" target="_blank">Download</a></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card card-profile">
                        <div class="card-body">
                          <h4 class="card-title">Project Phase</h4>
                          <h6 class="card-category text-gray"><?php if($row['project_phase'] == "1"){ echo 'Quick Estimate'; }elseif($row['project_phase'] == "2"){ echo 'Build My'; }else{ echo 'Execution'; } ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="card-body table-responsive">
                        <table class="table table-hover">
                          <thead class="text-warning">
                            <tr>
                              <th>Admin</th>
                              <th>Inspect Engg.</th>
                              <th>Inspect Date</th>
                              <th>Inspect Time</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                            $admin_ids = $row['sub_admin'];
                            $admin_ids = str_replace("-", "", $admin_ids);
                            
                            if($admin_ids != ""){
                            $record4 = $ob->commonSelectWhere("sub_admin","status = '1' AND `id` IN (".$admin_ids.")","name ASC","");
                            foreach($record4 as $row4){
                          ?>
                            <tr>
                              <td><?php if($row4['name'] != ""){ echo $row4['name']; }else{ echo "Not Not"; } ?></td>
                              <td>
                                <?php 
                                  $record5 = $ob->commonSelectWhere("quick_est_engg","status = '1' AND `id` = '".json_decode($row['engineer_id'], TRUE)[$row4['id']]."'","name ASC","");
                                  $ename = "Not Not";
                                  foreach($record5 as $row5){ $ename = $row5['name']; } echo $ename;
                                ?>
                              </td>
                              <td><?php if(json_decode($row['inspection_date'], TRUE)[$row4['id']] != ""){ echo json_decode($row['inspection_date'], TRUE)[$row4['id']]; }else{ echo "Not Not"; } ?></td>
                              <td><?php if(json_decode($row['inspection_time'], TRUE)[$row4['id']] != ""){ echo json_decode($row['inspection_time'], TRUE)[$row4['id']]; }else{ echo "Not Not"; } ?></td>
                            </tr>
                          <?php  }   }else{  ?>
                            <tr>
                              <td>Not Not</td>
                              <td>Not Not</td>
                              <td>Not Not</td>
                              <td>Not Not</td>
                            </tr>
                          <?php  }   ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="card card-profile">
                        <div class="card-body">
                          <h4 class="card-title">Property City</h4>
                          <h6 class="card-category text-gray"><?php echo $row['city']; ?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card card-profile">
                        <div class="card-body">
                          <h4 class="card-title">Property Pin Code</h4>
                          <h6 class="card-category text-gray"><?php echo $row['pincode']; ?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card card-profile">
                        <div class="card-body">
                          <h4 class="card-title">Property Own ?</h4>
                          <h6 class="card-category text-gray"><?php echo $row['property_own']; ?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card card-profile">
                        <div class="card-body">
                          <h4 class="card-title">Expected Time</h4>
                          <h6 class="card-category text-gray"><?php echo $row['expect_time']; ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="card-body table-responsive">
                      <table class="table">
                        <thead class="text-warning">
                          <tr>
                                  <th>Floor Number</th>
                                  <th></th>
                              </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $pro_spac = json_decode($row['property_size'], TRUE);
                            for($j=1;$j<=count($pro_spac);$j++){

                            $tableData = $ob->commonSelectWhere("property_details","`property_id` = '".$_GET['id']."' AND `floor_num` = '".$j."'","`property_name` ASC");
                          ?>
                          <tr>
                            <td><?php echo "Floor ".$j; ?></td>
                            <td>
                              <table class="table">
                                <thead class="text-warning">
                                  <tr>
                                    <th>#</th>
                                    <th>Space Name</th>
                                    <th>Description</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                          <?php 
                      $i=0;
                      foreach ($tableData as $row2) { 
                      $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                          <td><?php echo $row2['property_name']; ?></td>
                          <td><?php echo $row2['description']; ?></td>
                          <td>
                            <table class="table">
                              <thead class="text-warning">
                                <tr>
                                  <th>Head</th>
                                  <th>Head Category</th>
                                  <th>Head Sub Category</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $propertyheadsrecord = $ob->commonSelectJoinFour("property_details_work.*,heads.name as headname,heads_category.name as catname,heads_sub_category.name as headsubname","property_details_work","heads","heads_category","heads_sub_category","property_details_work.head_id = heads.id","property_details_work.head_cat_id = heads_category.id","property_details_work.head_subcat_id = heads_sub_category.id where `property_details_work`.`property_details_id` = '".$row2['id']."'");
                                foreach($propertyheadsrecord as $row6){
                              ?>
                              <tr>
                                  <td><?php echo $row6['headname']; ?></td>
                                  <td><?php echo $row6['catname']; ?></td>
                                  <td><?php echo $row6['headsubname']; ?></td>
                                </tr>
                                <?php  }  ?>
                              </tbody>
                            </table>
                          </td>
                    </tr>
                  <?php } ?>
                        </tbody>
                              </table>
                            </td>
                          </tr>
                        <?php  }   ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="row">
                    <div class="card-body">
                      <form action="controller/addAdminToProperty.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="flag" value="addAdminToProperty">
                      <input type="hidden" name="property_id" value="<?php echo $_GET['id']; ?>">
                      <div class="row">
                        <div class="col-md-12">
                          <label class="bmd-label-floating">Select Admins</label>
                          <div class="checkbox">
          <?php
            $admin_ids = explode(",",$admin_ids);
            $record3 = $ob->commonSelectWhere("sub_admin","status = '1' AND `workingpin` LIKE '%".$row['pincode']."%'","name ASC","");
            foreach($record3 as $row3){
          ?>
                            <label><input type="checkbox" name="admin_ids[]" value="<?php echo $row3['id']; ?>" <?php if (in_array($row3['id'], $admin_ids)){ echo "checked"; } ?> >&nbsp;&nbsp;<?php echo $row3['name']; ?></label>&nbsp;&nbsp;&nbsp;
          <?php  }  ?>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-warning pull-right"> Add Admins <div class="ripple-container"></div></button>
                      <div class="clearfix"></div>
                    </form>
                    </div>
                  </div>

                </div>
              <?php  }  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, 
            <a href="https://renovationexperts.in/" target="_blank">Renovation Experts </a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="assets/js/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="assets/js/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min1c51.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  
  <?php if(isset($_SESSION) && $_SESSION['message'] == "Success"){ ?>
	  <script>md.showNotification('top','center','Success ! Processes successfully done.','warning')</script>
  <?php } $_SESSION['message'] = ""; ?>
  
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>
</html>