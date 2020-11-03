<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<div class="app-main__outer">
    <a href="<?= site_url('/requests') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>


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
        <hr>
    </div>
    <form action="<?php echo site_url(); ?>/myrequests/savePrescription" method="post">
        <div class="container-fluid">
            <textarea class="form-control" name="prescription"   id="prescription" cols="30" rows="10" placeholder="Write Prescription"><?php echo $prescription ? $prescription['prescription'] : "" ?></textarea>
            <input type="hidden" id="hidden-id" name="request_id" value="<?php echo $request_id ?>" />
            <?php
            if ($prescription) {
                ?>
                <input type="hidden" id="hidden-id-pres" name="prescription_id" value="<?php echo $prescription['id'] ?>" />
                <?php
            } else {
                ?>
                <input type="hidden" id="hidden-id-pres" name="prescription_id" value="" />
                <?php
            }
            ?>
            <br><button class="btn btn-success pull-right"  type="submit" name="btn-chat" >Save</button>
        </div>
    </form>
</div>


<script>
</script>


<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'footer.php'); ?>
