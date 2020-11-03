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
    </head>
    <a href="<?= site_url('register') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>
    <body data-gr-c-s-loaded="true">
        <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-plum-plate bg-animation">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-8">
                            <div class="app-logo-inverse mx-auto mb-3"></div>
                            <div class="modal-dialog w-100 mx-auto">
                                <div class="modal-content">
                                    <form action="<?php echo site_url(); ?>/register/patientsave" method="post" >
                                        <div class="modal-body">
                                            <div class="h5 modal-title text-center">
                                                <img src="<?php echo base_url() ?>assets/images/logo-edoctor.png" style="width: 40%" class="img img-fluid" />
                                                <br>
                                            </div>
                                            <br>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="name" id="name" placeholder="Name" required="required" type="text" class="form-control" /></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="age" id="age" placeholder="Age" required="required" type="text" class="form-control" /></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">  
                                                        <input type="radio" name="gender" value="male"> Male<br>
                                                        <input type="radio" name="gender" value="female"> Female<br>
                                                        <input type="radio" name="gender" value="other"> Other</div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="mobile" id="mobile" placeholder="Mobile" required="required" type="text" class="form-control" /></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="email" id="email" placeholder="Email" required="required" type="email" class="form-control"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="password" id="password" required="required" placeholder="Password" type="password" class="form-control"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="repeat-password" id="repeat-password" required="required" placeholder="Repeat Password" type="password" class="form-control"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer clearfix">
                                            <div class="float-right">
                                                <!--<button name="submit" class="btn btn-primary btn-lg">Login</button>-->
                                                <input type="submit" class="btn btn-primary btn-lg" name="patientbtn" value="Register" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/main.js"></script>
        <script>
        </script>
    </body>
</html>