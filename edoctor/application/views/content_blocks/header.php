<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>EDOCTOR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <link href="<?php echo base_url() ?>assets/main.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            .hidden-div {
                visibility: hidden;
            }

            .zoom:hover {
                transform: scale(1.1);
            }

            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: white;
            }
        </style>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/daterangepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/dataTables.min.js"></script>

    </head>

    <body><?php
        $sessionData = $this->session->userdata('edoctor_auth');
        $role = $sessionData['role'];
        $id = $sessionData['uid'];
        ?>
        <div id="loader" class="se-pre-con"><img style="position: absolute;
                                                 top:0;
                                                 bottom: 0;
                                                 left: 0;
                                                 right: 0;
                                                 margin: auto;
                                                 x" src="<?php echo base_url() ?>assets/images/loader.gif" /></div>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <div class="app-header header-shadow">
                <div class="app-header__logo">
                    <img src="<?php echo base_url() ?>assets/images/logo-edoctor.png" width="80" class="img-responsive" />
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                    </div>
                </div>
                <div class="app-header__content">
                    <div class="app-header-left"></div>
                    <div class="app-header-right">
                        <div class="header-btn-lg pr-0">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">

                                        <div class="btn-group">
                                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                                <img width="42" class="rounded-circle" src="<?php echo base_url() ?>assets/images/avatar.png" alt="">
                                                <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                            </a>

                                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                <?php
                                                if ($role == 'PATIENT') {
                                                    ?>
                                                    <a href="<?php echo site_url() ?>/doctorprofile/editPatient?id=<?php echo $id ?>" type="button" tabindex="0" class="dropdown-item">Edit profile</a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="<?php echo site_url() ?>/doctorprofile/editDoctor?id=<?php echo $id ?>" type="button" tabindex="0" class="dropdown-item">Edit profile</a>
                                                <?php } ?>

                                                <a href="<?php echo site_url('login/logout') ?>" type="button" tabindex="0" class="dropdown-item">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <br />
                                <li>
                                    <a href="<?php echo site_url() ?>" class="<?php
                                    if ($this->uri->segment(1) == "") {
                                        echo "mm-active";
                                    }
                                    ?>">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Home
                                    </a>
                                </li>
                                <?php
                                if ($role == 'PATIENT') {
                                    ?>
                                    <li>

                                        <a href="<?php echo site_url("/patientRequest") ?>" class="<?php
                                        if ($this->uri->segment(1) == "") {
                                            echo "mm-active";
                                        }
                                        ?>">
                                            <i class="metismenu-icon fa fa-plus"></i>
                                            Consultation Request
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url("/myrequests") ?>" class="<?php
                                        if ($this->uri->segment(1) == "") {
                                            echo "mm-active";
                                        }
                                        ?>">
                                            <i class="metismenu-icon fa fa-list-alt"></i>
                                            My Requests
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url("/feedback/patientreviews") ?>" class="<?php
                                        if ($this->uri->segment(1) == "") {
                                            echo "mm-active";
                                        }
                                        ?>">
                                            <i class="metismenu-icon fa fa-star-half"></i>
                                            My Reviews
                                        </a>
                                    </li>

                                    <?php
                                } else {
                                    ?>
                                    <li>

                                        <a href="<?php echo site_url("/requests") ?>" class="<?php
                                        if ($this->uri->segment(1) == "") {
                                            echo "mm-active";
                                        }
                                        ?>">
                                            <i class="metismenu-icon fa fa-plus"></i>
                                            Patient's Requests
                                        </a>
                                    </li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    $(window).load(function () {
                        // Animate loader off screen
                        $(".se-pre-con").fadeOut("slow");
                    });
                </script>