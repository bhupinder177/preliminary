
<?php
if (!isset($this->session->userdata['adminloggedin'])) {
    echo "<script> window.location.href='" . base_url() . "/admin/logout'</script>";

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.toast.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" />



    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16" />
    <title>Admin panel</title>


</head>

<body>


    <input type="hidden" value="<?php echo base_url(); ?>" class="base_url">

  <div class="loader_panel" style="display: none;">
    <img  src="<?php echo base_url(); ?>assets/images/preloader.gif">
  </div>
    <div class="main_wrapper">
        <header id="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xl-3">
                        <div class="logo-sec">

                              <img src="<?php echo base_url(); ?>assets/images/logo.png">

                            <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 55.2">
                                    <rect y="0.6" width="72" height="10" rx="5"></rect>
                                    <rect y="24.6" width="72" height="10" rx="5"></rect>
                                    <rect y="48.6" width="72" height="10" rx="5"></rect>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-8 col-xl-9">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="header_actions h-100">
                                    <ul class="mb-0 d-flex">

                                        <li>
                                            <a href="">
                                            <span>  Welcome: Admin</span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown ac-cstm show">
                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                    <img src="<?php echo base_url(); ?>assets/images/profile.png" class="img-fluid">
                                                </a>
                                                <div class="dropdown-menu fadeIn">
                                                  <a class="dropdown-item" href="<?php echo base_url(); ?>admin/password"><i class="fa fa-cog"></i>Settings</a>
                                                    <a class="dropdown-item"  href="<?php echo base_url(); ?>admin/logout" ><i class="fa fa-sign-out"></i>Log Out</a>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <!--.site-header-->
    <?php include('sidebar.php'); ?>
