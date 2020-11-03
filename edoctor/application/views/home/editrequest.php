<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<div class=" app-main__outer">
    <div class="card">
                                 <a href="<?= site_url('myrequests') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>

        <div class="card-header">
            Enter Details Here
        </div>
        <div class="card-body">
            <h5 class="card-title">Fill the following fields</h5>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Person to be consulted</label>
                </div>
                <select class="custom-select" id="person" name="person">
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
                    <textarea required class="form-control description" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
                </div>
                <button  type="button" id="update-btn" class="btn btn-success btn-lg" name="requestbtn" value="patientRequest">Update</button>

            </div>
        </div>


    </div>
    <input type="hidden" value="<?php echo $editrequest['id'] ?>" id="hidden-id" />
    <script>
        var des = '<?php echo $editrequest['description'] ?>';
        $('.description').text(des);
        var person = '<?php echo $editrequest['person'] ?>';
        console.log(person);
        $('#person').val(person);
        var specialisation = '<?php echo $editrequest['specialisation'] ?>';
        $('#spec').val(specialisation);
        var doctor = '<?php echo $editrequest['doctor'] ?>';
        $('#doctorselect').val(doctor);
        var specialisation = '<?php echo $editrequest['specialisation'] ?>';
        $('#spec').val(specialisation);
        var importance = '<?php echo $editrequest['importance'] ?>';
        if (importance === 'HIGH') {
            $("input[name=importance][value='HIGH']").prop('checked', 'checked');
        } else {
            $("input[name=importance][value='LOW']").prop('checked', 'checked');

        }




        $('#update-btn').click(function () {
            var person = $('#person').val();
            var spec = $('#spec').val();
            var doctor = $('#doctorselect').val();
            var importance = $("input[name=importance]:checked").val();
            var des = $('.description').val();
            var id = $('#hidden-id').val();
            var data = {id: id, des: des, importance: importance,  person: person};
            $.ajax({
                type: "post",
                url: '<?= site_url('Myrequests/updateRequest') ?>',
                data: data,
                success: function (response) {
                    var url = '<?= site_url('Myrequests') ?>';
                    location.href = url;
                }
            });
        });


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