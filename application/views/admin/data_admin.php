


  <!-- awal isi section -->
  <section class="isi cf">
    <div class="container" ng-controller="ListaComprasController">

      <form action="#" method="get">
      <div class="row">
        <div class="page-header">
          <div class="span3">
            <input type="text" name="search" class="form-control" placeholder="Cari Username Admin">
          </div>
        </div>
      </div>
      </form>
      <div class="row">
        <table id="lista-compras" class="table table-striped">
          <thead>
            <tr>
              <th>Username</th>
              <th>Fungsi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach($Mins as $min):
            ?>
            <tr class="comprado-">
              <td><?php echo $min['username']; ?></td>
              <td>
                <form action="<?php echo base_url()."admin/confirm/".$min['username'];?>" method="post">
                <button type="submit" <?php if($min['konfirmasi']==1){ echo "disabled"; }?> class="btn btn-primary">
                  <i class="fa fa-check"></i>
                </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eModal<?php echo $min['username'];?>">
                <i class="fa fa-trash"></i>
              </button>
                </form>
              </td>
              <div class="modal fade" id="eModal<?php echo $min['username'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menghapus data admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo base_url();?>admin/delete_admin/<?php echo $min['username'];?>" class="btn btn-danger">Delete</a>
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
