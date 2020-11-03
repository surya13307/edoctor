<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<div class="app-main__outer">
            <a href="<?= site_url('') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>

    <h2>Patient 
        Requests</h2><br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">To whome</th>
                <th scope="col">Specialisation</th>
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
            foreach ($requests as $i) {
                ?>
                <tr>
                    <td><?php echo $slno ?></td>
                    <td><?php echo $i['person'] ?></td>
                    <td><?php echo $i['specialisation'] ?></td>
                    <td><?php echo $i['importance'] ?></td>
                    <td><?php echo $i['description'] ?></td>
                    <td><?php echo $i['requested_date'] ?></td>
                    <td><?php echo $i['status'] ?></td><?php
                    if ($i['status'] == 'PENDING') {
                        ?>
                        <td> <a href="<?php echo site_url(); ?>/requests/acceptRequest?id=<?php echo $i['id'] ?>" class="btn btn-success">Accept</a></td>
                        <td> <a href="<?php echo site_url(); ?>/requests/rejectRequest?id=<?php echo $i['id'] ?>" class="btn btn-danger">Reject</a></td>

                    <?php } else { ?>
                        <td>_</td>
                        <td>_</td>
                    <?php } ?>
                    <?php
                    if ($i['status'] == 'ACCEPTED') {
                        ?>
                        <td> <a href="<?php echo site_url(); ?>/myrequests/chatboxDoctor?id=<?php echo $i['id'] ?>" class="btn btn-primary">Message</a></td>
                        <td> <a href="<?php echo site_url(); ?>/myrequests/prescription?id=<?php echo $i['id'] ?>" class="btn btn-primary">Prescription</a></td>
                        <?php
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
