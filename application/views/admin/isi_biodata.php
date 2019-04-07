<!-- awal isi section -->
<section class="isi cf">
  <div class="container">
    <!-- row 1 -->
    <div class="row">
      <div class="col-sm-12">
        <h3>Pengisian Calon Gubernur </h3>
        <br>
        <p>Isi kolom di bawah dengan baik dan benar .</p>
      </div>
    </div>
    <!-- row 2 -->
    <div class="row">
      <!-- form email  -->
      <div class="col-sm-8" style="text-align:left;">
  <?php echo validation_errors(); ?>
  <?php echo $error;?>
  <?php echo form_open_multipart('admin/tambah_calon');?>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>No Hp</label>
              <input type="tel" class="form-control" name="no_hp" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Visi & Misi</label>
              <textarea rows="5" class="form-control" name="visi_misi" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div class="form-group">
              <label>Foto Calon</label><br>
            <input type="file" name="foto_calon">
          </div>
          <div id="success"></div>
          <div class="form-group">
            <a href="<?php echo base_url();?>admin/" style="margin-right: 15px; width: 200px" class="btn btn-primary">Kembali</a>
            <input type="submit" name="tambah" style="margin-left: 15px; width: 200px" class="btn btn-primary" value="Tambah"></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- akhir isi section -->