<!-- awal isi section -->
<section class="isi cf">
  <div class="container" ng-controller="ListaComprasController">
    <div class="row">
      <table id="lista-compras" class="table table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Jumlah suara</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($Gubs as $gub): ?>
          <tr>
            <td><?php echo $gub['nama']; ?></td>
            <!-- Button trigger modal -->
            <!-- Modal -->
            <td>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo ($gub['hasilvote']/$totaluser['jumlah'])*100;?>%;" aria-valuenow="<?php echo ($gub['hasilvote']/$totaluser['jumlah'])*100;?>" aria-valuemin="0" aria-valuemax="100"><?php echo ($gub['hasilvote']/$totaluser['jumlah'])*100;?>%</div>
              </div></td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <td>Belum memilih</td>
              <td>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo ($belumvote['jumlah']/$totaluser['jumlah'])*100;?>%;" aria-valuenow="<?php echo ($belumvote['jumlah']/$totaluser['jumlah'])*100;?>" aria-valuemin="0" aria-valuemax="100"><?php echo ($belumvote['jumlah']/$totaluser['jumlah'])*100;?>%</div>
                </div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- akhir isi section -->