<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>EDOCTOR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <link href="<?php echo base_url() ?>assets/main.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/jquery.min.js"></script>
    </head>
    <body data-gr-c-s-loaded="true">
        <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-plum-plate bg-animation">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-8">
                            <div class="app-logo-inverse mx-auto mb-3"></div>
                            <div class="modal-dialog w-100 mx-auto">
                                <div class="modal-content">

                                    <form action="<?php echo site_url(); ?>/login/authenticate" method="post" >
                                        <div class="modal-body">
                                            <div class="h5 modal-title text-center">
                                                <br>
                                            </div>
                                            <br>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="pe-7s-user"> </i></span></div>
                                                            <input placeholder="Username or Email" type="text" name="username" required="required" id="username" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="pe-7s-lock"> </i></span></div>
                                                            <input placeholder="Password" type="password" name="password" required="required" id="password" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="float-right" >
                                                        <!--<button name="submit" class="btn btn-primary btn-lg">Login</button>-->
                                                        <input type="submit" class="btn btn-primary btn-lg"  name="loginbtn" value="Login" />

                                                    </div>
                                                    <br />
                                                    <a href="<?php echo site_url('register'); ?>">Don't you have an account ?</a>
                                                </div>
                                                </form>
                                                <?php
                                                if ($credential) {
                                                    ?>
                                                    <i style="color: red;" class="pe-7s-attention"><span  >Your username or password is incorrect</span> </i>

                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/main.js"></script>
            <script>
                $('#username').focus();
            </script>
    </body>
</html>