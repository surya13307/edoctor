<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<div class="app-main__outer">
    <br>
            <a href="<?= site_url('') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>

    <h2>My Reviews</h2><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Doctor</th>
                <th scope="col">Rating</th>
                <th scope="col">Review</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>


            <?php
            $slno = 1;
            foreach ($feedbacks as $i) {
                ?>
                <tr>
                    <td><?php echo $slno ?></td>
                    <td><?php echo $i['doctor_name'] ?></td>
                    <td><?php echo $i['rating'] ?> ★</td>
                    <td><?php echo $i['review'] ?></td>
                    <td> <a href="<?php echo site_url(); ?>/feedback/editfeedback?id=<?php echo $i['id'] ?>" class="btn btn-warning">Edit</a></td>

                    <?php $slno++ ?>



                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'footer.php'); ?>