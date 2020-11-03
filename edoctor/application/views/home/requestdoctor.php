<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<div class=" app-main__outer">
    <div class="card">
        <div class="card-header">
            Enter Details Here
        </div>
        <div class="card-body">
            <h5 class="card-title">Fill the following fields</h5>
            <form action="<?php echo site_url(); ?>/doctorprofile/requestsave" method="post">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Person to be consulted</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="person">
                        <option value="MYSELF">Myself</option>
                        <option value="FAMILY">Family Member</option>
                    </select>
                </div>
                <br>


                <h5 class="card-title">Importance</h5> <br>
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <input type="radio" required name="importance" value="HIGH"> High <br><br>
                        <input type="radio" required name="importance" value="LOW"> Low <br>
                    </div>


                    <br>

                    <h5 class="card-title">Describe your health problem here</h5> <br>

                    <div class="form-group">
                        <textarea required class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
                    </div>
                    <input type="hidden" name="doctor" value="<?php echo $doctor_id ?>" id="hidden-id" />

                    <button type="submit" class="btn btn-primary btn-lg" name="requestbtn" value="patientRequest">Save</button>

            </form>
        </div>
    </div>

</div>



<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'footer.php'); ?>