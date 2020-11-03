<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
&nbsp; &nbsp;
<div class="app-main__outer">
    <br><br>

    &nbsp; &nbsp;
    <?php
    $sessionData = $this->session->userdata('edoctor_auth');
    $role = $sessionData['role'];
    if ($role == 'PATIENT') {
    ?>

        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-4">
                <div class="card">
                    <img src="<?php echo base_url() ?>assets/images/consult.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Consultation</h5>
                        <a href="<?php echo site_url("/patientRequest") ?>" class="btn btn-primary">Click Here</a>



                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="<?php echo base_url() ?>assets/images/requests.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">My Requests</h5>
                        <a href="<?php echo site_url("/myrequests") ?>" class="btn btn-primary">Click Here</a>
                      
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="<?php echo base_url() ?>assets/images/doctorss.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Doctors</h5>
                        <a href="<?php echo site_url("/doctorprofile/doctors") ?>" class="btn btn-primary">Click Here</a>

                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="<?php echo base_url() ?>assets/images/review.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">My Reviews</h5>
                        <a href="<?php echo site_url("/feedback/patientreviews") ?>" class="btn btn-primary">Click Here</a>

                    </div>
                </div>
            </div>
        </div>

    <?php } else { ?>
     
        <<div class="row col-sm-3">

            <div class="col mb-12">
                <div class="card">
                    <img src="<?php echo base_url() ?>assets/images/drrqsts.jpg"  class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Pending Requests</h5>
                        <a href="<?php echo site_url("/requests") ?>" class="btn btn-primary">Click here</a>




                    </div>
                </div>
            </div>
</div>
    <?php } ?>

    <a href="<?php echo site_url('login/logout') ?>" type="button" tabindex="0" style="float: right" class="btn btn-danger">Logout </a>

    <?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'footer.php'); ?>