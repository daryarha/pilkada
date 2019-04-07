<!-- awal isi section -->
<section class="isi cf">
  <div class="container">
    <!-- row 1 -->
    <div class="row">
      <?php foreach ($Gubs as $gub): ?>
      <div class="col-sm-4">
        <a href="<?php echo base_url()."user/pilih/".$gub['id'];?>">
          <div class="containers">
            <img src="<?php echo base_url().$gub['url_foto'];?>" alt="Avatar" class="image">
            <div class="overlay">
              <div class="text">Pilih <?php echo $gub['nama'];?></div>
            </div>
          </div>
        </a>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</section>
<!-- akhir isi section -->