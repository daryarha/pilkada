



  <!-- awal isi section -->
  <section class="isi cf">
    <div class="container">
      <!-- row 1 -->
    <dov class="row">
      <div class="col-sm-12">
        <?php foreach ($Gubs as $gub): ?>          
        <div class="status">
          <div class="man cf"><img src="<?php echo base_url().$gub['url_foto'];?>" alt="" ><h3><?php echo $gub['nama'];?></h3></div>
          <p><?php echo $gub['visi_misi'];?></p>
        </div>
        <?php endforeach ?>
      </div>
    </dov>

    </div>
  </section>
  <!-- akhir isi section -->

  <!-- <div class="clearfix"></div> -->
