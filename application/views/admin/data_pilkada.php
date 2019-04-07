<!-- awal isi section -->
<section class="isi cf">
  <div class="container" ng-controller="ListaComprasController">
    <form action="#" method="get">
      <div class="row">
        <div class="col-3">
          <input type="text" name="search" class="form-control" placeholder="Cari calon">
        </div>
        <div class="col-3 offset-6">
          <a href="<?php echo base_url()?>admin/tambah_calon" class="btn btn-primary">Tambah calon</a>
        </div>
      </div>
    </form>
    <div class="row">
      <table id="lista-compras" class="table table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>No. Handphone</th>
            <th>Visi Misi</th>
            <th>Foto</th>
            <th>Fungsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($Gubs as $gub): ?>
          <tr>
            <td><?php echo $gub['nama']; ?></td>
            <td><?php echo $gub['email']; ?></td>
            <td><?php echo $gub['no_hp']; ?></td>
            <td><?php echo $gub['visi_misi']; ?></td>
            <td><img src="<?php echo base_url().$gub['url_foto'];?>" class="img-responsive"></td>
            <td>
              <a href="<?php echo base_url();?>admin/edit_calon/<?php echo $gub['id'];?>" class="btn btn-primary btn-small">
                <i class="fa fa-pencil"></i>
              </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eModal<?php echo $gub['id'];?>">
                <i class="fa fa-trash"></i>
              </button>
            </td>
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="eModal<?php echo $gub['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menghapus data calon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo base_url();?>admin/delete_calon/<?php echo $gub['id'];?>" class="btn btn-danger">Delete</a>
                  </div>
                </div>
              </div>
            </div>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>
<!-- akhir isi section -->