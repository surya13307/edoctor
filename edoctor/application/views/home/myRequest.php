<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<div class="app-main__outer">
    
                         <a href="<?= site_url('') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>


    <h2>My Requests</h2><br>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">To whome</th>
                <th scope="col">Specialisation</th>
                <th scope="col">Requested Doctor</th>
                <th scope="col">Importance</th>
                <th scope="col">Decsription</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>


            <?php
            $slno = 1;
            foreach ($myrequest as $i) {
                ?>
                <tr>
                    <td><?php echo $slno ?></td>
                    <td><?php echo $i['person'] ?></td>
                    <td><?php echo $i['specialisation'] ?></td>
                    <td><?php echo $i['doctor_name'] ?></td>
                    <td><?php echo $i['importance'] ?></td>
                    <td><?php echo $i['description'] ?></td>
                    <td><?php echo $i['requested_date'] ?></td>
                    <td><?php echo $i['status'] ?></td>
                    <?php
                    if ($i['status'] == 'PENDING') {
                        ?>
                        <td> <a href="<?php echo site_url(); ?>/myrequests/editrequest?id=<?php echo $i['id'] ?>" class="btn btn-warning">Edit</a></td>
                    <?php } else {
                        ?>
                        <td>_</td>
                        <?php
                        if ($i['status'] == 'ACCEPTED') {
                            ?>
                            <td> <a href="<?php echo site_url(); ?>/myrequests/chatbox?id=<?php echo $i['id'] ?>" class="btn btn-info">Message</a></td>
                            <td> <a href="<?php echo site_url(); ?>/myrequests/patientPrescription?id=<?php echo $i['id'] ?>" class="btn btn-info">Prescription</a></td>
                            <?php
                            if ($i['prescription_entered'] == true && $i['reviewed'] == false) {
                                ?>
                                <td> <a href="<?php echo site_url(); ?>/feedback?id=<?php echo $i['id'] ?>" class="btn btn-info">Write a review</a></td>
                                <?php
                            }
                        }
                    }
                    ?>

                    <?php $slno++ ?>



                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'footer.php'); ?>