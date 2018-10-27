
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Statistik
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>hollow/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Statistik</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Data Pelayanan Publik di Kabupaten Cianjur</h3>
        </div>
        
        <div class="box-body">
<!-- conternt here -->

          <section class="content">
      <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pemerintahan</h3>

            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="pemerintahanChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Kesehatan</h3>

            </div>
            <div class="box-body">
            <canvas id="kesehatanChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Bidang Usaha</h3>

            </div>
            <div class="box-body">
              <canvas id="usahaChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pendidikan</h3>

            </div>
            <div class="box-body">
              <div class="chart">
              <canvas id="pendidikanChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Pariwisata</h3>

            </div>
            <div class="box-body">
                <p class="text-center" style="font-size:80px;font-wight:bold;">
                    <?=count($pariwisata)?>
                </p>
                <p class="text-center" style="margin-top:-30px;margin-bottom:30px;">jumlah lokasi pariwisata</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Sarana Prasarana</h3>

            </div>
            <div class="box-body">
            <p class="text-center" style="font-size:80px;font-wight:bold;">
                    <?=count($sarana)?>
                </p>
                <p class="text-center" style="margin-top:-30px;margin-bottom:30px;">jumlah sarana prasarana</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

<!-- end content           -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
// Pemerintahan
$pemerintahsub = array('Kantor Dinas', 'Kantor Kecamatan', 'Pelayanan Umum', 'BUMD');
$pemerintah = array();

foreach ($pemerintahsub as $key => $value) {
  foreach ($pemerintahan as $key => $nilai) {
    if ($value == $nilai['sub_category']) {
      @$pemerintah[$value] += 1;
    }
  }
}

// Pendidikan
$pendidikansub = array('SD', 'SMP', 'SMA/SMK', 'Perguruan Tinggi');
$jmlPendidikan = array();

foreach ($pendidikansub as $key => $value) {
  foreach ($pendidikan as $key => $nilai) {
    if ($value == $nilai['sub_category']) {
      @$jmlPendidikan[$value] += 1;
    }
  }
}

// Kesehatan
$kesehatansub = array('Rumah Sakit', 'Puskesmas');
$jmlKesehatan = array();

foreach ($kesehatansub as $key => $value) {
  foreach ($kesehatan as $key => $nilai) {
    if ($value == $nilai['sub_category']) {
      @$jmlKesehatan[$value] += 1;
    }
  }
}

// Bidang Usaha
$usahasub = array('Kuliner', 'Ritel', 'Perbankan', 'UMKM', 'Penginapan');
$jmlUsaha = array();

foreach ($usahasub as $key => $value) {
  foreach ($bidangusaha as $key => $nilai) {
    if ($value == $nilai['sub_category']) {
      @$jmlUsaha[$value] += 1;
    }
  }
}

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script>

  var pemerintahan = document.getElementById("pemerintahanChart");
  var pendidikan = document.getElementById("pendidikanChart");
  var kesehatan = document.getElementById("kesehatanChart");
  var usaha = document.getElementById("usahaChart");

  var dataPemerintahan = [];
  var labelPemerintahan = [];
  var dataPendidikan = [];
  var labelPendidikan = [];
  var dataKesehatan = [];
  var labelKesehatan = [];
  var dataUsaha = [];
  var labelUsaha = [];

  <?php foreach ($pemerintah as $key => $value) { ?>
    dataPemerintahan.push(<?=$value?>);
    labelPemerintahan.push("<?=$key?>");
  <?php } ?>

  <?php foreach ($jmlPendidikan as $key => $value) { ?>
    dataPendidikan.push(<?=$value?>);
    labelPendidikan.push("<?=$key?>");
  <?php } ?>

  <?php foreach ($jmlKesehatan as $key => $value) { ?>
    dataKesehatan.push(<?=$value?>);
    labelKesehatan.push("<?=$key?>");
  <?php } ?>

  <?php foreach ($jmlUsaha as $key => $value) { ?>
    dataUsaha.push(<?=$value?>);
    labelUsaha.push("<?=$key?>");
  <?php } ?>
  
  var pemerintahanChart = new Chart(pemerintahan, {
    type: 'bar',
    data: {
        labels: labelPemerintahan,
        datasets: [{
            label: 'Jumlah Public Service',
            data: dataPemerintahan,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var pendidikanChart = new Chart(pendidikan, {
    type: 'bar',
    data: {
        labels: labelPendidikan,
        datasets: [{
            label: 'Jumlah Public Service',
            data: dataPendidikan,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var kesehatanChart = new Chart(kesehatan, {
    type: 'bar',
    data: {
        labels: labelKesehatan,
        datasets: [{
            label: 'Jumlah Public Service',
            data: dataKesehatan,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var usahaChart = new Chart(usaha, {
    type: 'bar',
    data: {
        labels: labelUsaha,
        datasets: [{
            label: 'Jumlah Public Service',
            data: dataUsaha,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
