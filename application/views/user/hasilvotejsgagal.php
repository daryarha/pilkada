
  <script type="text/javascript">
var n=$("#count").val();
var arrayNama=[''];
var arrayHasil=[''];
for (var i = 0; i < $n; i++) {
  arrayNama[i]=$("#gubNama"+i).val();
  arrayHasil[i]=$("#gubHasil"+i).val();
}

console.log($arrayHasil);
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
		title:{
			text: "HASIL PEMILU KEPALA DESA BEGOBEBAS"
		},
		data: [
		{

			type: "column",
			dataPoints: [
      for (var i = 0; i < n; i++) {
        { label: arrayNama[i],  y: arrayHasil[i]  },
      }
			]
		}
		]
	});
	chart.render();
}
</script>


  <!-- awal isi section -->
      <input type="text" id="count" class="form-control hidden-xs-up" value="<?php echo $count['jumlah'];?>">
      <?php foreach($Gubs as $gub): ?>
      <input type="text" id="gubNama<?php echo $gub['id'];?>" class="form-control hidden-xs-up" value="<?php echo $gub['nama'];?>">
      <input type="text" id="gubHasil<?php echo $gub['id']?>" class="form-control hidden-xs-up" value="<?php echo $gub['hasilvote'];?>">
    <?php endforeach;?>
  <section class="isi cf">
    <div class="container">
      <!-- row 1 -->
    <dov class="row">
      <div class="col-sm-12">
          <div id="chartContainer" style="height: 300px; width: 100%;"></div>
      </div>
    </dov>

    </div>
  </section>
  <!-- akhir isi section -->
