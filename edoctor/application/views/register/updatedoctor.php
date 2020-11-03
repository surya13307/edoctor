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
                                <form action="<?php echo site_url(); ?>/register/doctorsave" method="post">
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
                                                <div class="position-relative form-group">
                                                    <select class="form-control" id="specialisation" name="specialisation">

                                                        <option value="">Specialisation</option>
                                                        <option value="PSYCHOLOGIST">Psychologist</option>
                                                        <option value="OTHER">Other</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="mobile" id="mobile" placeholder="Mobile" required="required" type="text" class="form-control" /></div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="email" id="email" placeholder="Email" required="required" type="email" class="form-control"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><textarea name="address" id="address" placeholder="Address" required="required" type="text" class="form-control"></textarea></div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="modal-footer clearfix">
                                            <div class="float-right">
                                                <!--<button name="submit" class="btn btn-primary btn-lg">Login</button>-->
                                                <input type="button" class="btn btn-primary btn-lg" name="doctorbtn" id="updatebtn" value="Update" />
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
    <input type="hidden" value="<?php echo $editDoctor['id'] ?>" id="hidden-id" />

    <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/jquery.min.js"></script>

    <script>
        var specialisation = '<?php echo $editDoctor['specialisation'] ?>';
        console.log(specialisation);
        $('#specialisation').val(specialisation);
        var mobile = '<?php echo $editDoctor['mobile'] ?>';
        $('#mobile').val(mobile);
        var address = '<?php echo $editDoctor['address'] ?>';
        $('#address').val(address);
        var email = '<?php echo $editDoctor['email'] ?>';
        $('#email').val(email);
        var name = '<?php echo $editDoctor['name'] ?>';
        $('#name').val(name);
        // var importance =  php echo $editDoctor['importance'] ?>';
        // if (importance === 'HIGH') {
        //     $("input[name=importance][value='HIGH']").prop('checked', 'checked');
        // } else {
        //     $("input[name=importance][value='LOW']").prop('checked', 'checked');

        // }




        $('#updatebtn').click(function() {
            var name = $('#name').val();
            var specialisation = $('#specialisation').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();
            var address = $('#address').val();
            var id = $('#hidden-id').val();
            var data = {
                id: id,
                name:name,
                specialisation: specialisation,
                mobile: mobile,
                address:address,
                email: email
            };
            $.ajax({
                type: "post",
                url: '<?= site_url('doctorprofile/updateRequest') ?>',
                data: data,
                success: function(response) {
                    var url = '<?= site_url('') ?>';
                    location.href = url;
                }
            });
        });
    </script>
</body>

</html>