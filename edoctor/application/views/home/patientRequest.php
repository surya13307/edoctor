<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<div class=" app-main__outer">
    <div class="card">
        <a href="<?= site_url('') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>
        <div class="card-header">
            Enter Details Here
        </div>
        <div class="card-body">
            <h5 class="card-title">Fill the following fields</h5>
            <form action="<?php echo site_url(); ?>/patientRequest/requestsave" method="post">

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
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Specialization</label>
                    </div>
                    <select class="custom-select" required id="spec" name="specialisation">
                        <option selected>Choose...</option>
                        <option value="PSYCHOLOGIST">Psychologist</option>
                        <option value="OTHER">Other</option>
                    </select>
                </div>
                <br>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Doctors Available</label>
                    </div>
                    <select class="custom-select" required disabled id="doctorselect" name="doctor">
                        <option selected>Choose...</option>
                    </select>
                </div>


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
                    <button type="submit" class="btn btn-primary btn-lg" name="requestbtn" value="patientRequest">Save</button>

            </form>
        </div>
    </div>

</div>

<script>
    $('#spec').change(function () {
        var spec = $('#spec').val();
        var data = {specialisation: spec};
        $.ajax({
            type: "get",
            url: '<?= site_url('PatientRequest/getDoctors') ?>',
            data: data,
            success: function (response) {
                var result = JSON.parse(response);
                populateDoctorData(result);
            }
        });
    });


    function populateDoctorData(doctors) {
    $('#doctorselect').removeAttr('disabled');
        var html = "<option selected>Choose...</option>";
        $.each(doctors, function (key, value) {
            html += "<option value='" + value.id + "'>" + value.name + "</option>";
        });
        $('#doctorselect').html(html);
    }
</script>

<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'footer.php'); ?>