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
        <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/jquery.min.js"></script>
    </head>

    <body data-gr-c-s-loaded="true">


        <a href="<?= site_url('login') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>
        <div class="d-flex justify-content-center h-100 row align-items-center">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?php echo base_url() ?>assets/images/patient.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Patient</h5>
                            <p class="card-text">To consult a doctor register here.</p>
                            <a href='<?php echo site_url('register/patientform'); ?>' class='btn btn-primary'>Register</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?php echo base_url() ?>assets/images/doctor.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Doctor</h5>
                            <p class="card-text">Doctors can register here</p>
                            <a href='<?php echo site_url('register/doctorform'); ?>' class='btn btn-primary'>Register</a>

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