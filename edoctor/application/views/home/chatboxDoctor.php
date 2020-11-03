<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<div class="app-main__outer">
  <a href="<?= site_url('requests') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>


    <style>


        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 50%;
            height: 50px;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right:0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }
        .scroll {
            width: 100%; height: 400px;
            overflow: auto;
        }
    </style>

    <div  class="container">

        <h2>Chat Messages</h2>


        <div id="message-scroll-div" class="scroll" >

            <?php
            foreach ($patient_messages as $i) {

                if ($i['is_patient'] == false) {
                    ?>
                    <div class="container">
                        <img src="<?php echo base_url() ?>assets/images/doctor_avatar.jpg" alt="Avatar" style="width:50%;">
                        <p><?php echo $i['message'] ?></p>
                        <span class="time-right"><?php echo $i['date'] ?></span>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="container darker">
                        <img src="<?php echo base_url() ?>assets/images/patient.png" alt="Avatar" class="right" style="width:100%;">
                        <p><?php echo $i['message'] ?></p>
                        <span class="time-left"><?php echo $i['date'] ?></span>
                    </div>
                    <?php
                }
            }
            ?>

        </div>


        <hr>
    </div>
    <form action="<?php echo site_url(); ?>/myrequests/saveDoctorChat" method="post">
        <div class="container-fluid">
            <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="write message"></textarea>
            <input type="hidden" id="hidden-id" name="request_id" value="<?php echo $request_id ?>" />
            <br><button class="btn btn-success pull-right"  type="submit" name="btn-chat" >send message</button>
        </div>
    </form>
</div>

<script>
    var objDiv = document.getElementById("message-scroll-div");
    objDiv.scrollTop = objDiv.scrollHeight;


    setInterval(function () {
        var message = $('#message').val();
        if (message == '') {
            window.location.reload(1);
        }
    }, 30000);
</script>


<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'footer.php'); ?>
