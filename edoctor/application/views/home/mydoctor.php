<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<div class="app-main__outer">
            <a href="<?= site_url('') ?>"><i class="fa fa-angle-left" aria-hidden="true"> Back</i></a>

  <h2>Doctors</h2><br>
 


      <?php
      $slno = 1;
      foreach ($doctor as $i) {
      ?>
<div class="col-lg-4">
<div class="card border-info mb-6" >
  <div class="card-header"><?php echo $i['name'] ?></div>
  <div class="card-body text-info">
    <h5 class="card-title"><?php echo $i['specialisation'] ?></h5>
    <a href="<?php echo site_url(); ?>/doctorprofile/requestDoctor?id=<?php echo $i['id']  ?>"  class="btn btn-success">Request Consultation</a>
  </div>
</div>

</div>




        
      <?php
      }
      ?>
    
</div>

<?php include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'content_blocks' . DIRECTORY_SEPARATOR . 'footer.php'); ?>