
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Lokasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>hollow/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Statistik</li>
        <li class="active">Pendidikan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data dari Kontributor</h3>
        </div>
        <div class="box-body">
<!-- conternt here -->

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#data" aria-controls="home" role="tab" data-toggle="tab">Data</a></li>
    <li role="presentation"><a href="#mapdata" aria-controls="profile" role="tab" data-toggle="tab">Map</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

<!-- Tab Data -->
    <div role="tabpanel" class="tab-pane active" id="data">
    <div class="table-responsive">
        <table id="tbl-data" class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kecamatan</th>
                    <th>SD</th>
                    <th>SMP</th>
                    <th>SMA/SMK</th>
                    <th>Perguruan Tinggi</th>
                </tr>
            </thead>
            <tbody>

<?php
    $no = 1;
    foreach ($district as $key => $value) {
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$value['district']."</td>";
        foreach ($sd as $key => $sdvalue) {
            if ($value['district'] == $sdvalue['district']) {
                if ($sdvalue['total'] == null) {
                    echo "<td>0</td>";
                } else {
                    echo "<td>".$sdvalue['total']."</td>";
                }
            }

        }
        foreach ($smp as $key => $smpvalue) {
            if ($value['district'] == $smpvalue['district']) {
                if ($smpvalue['total'] == null) {
                    echo "<td>0</td>";
                } else {
                    echo "<td>".$smpvalue['total']."</td>";
                }
            }
        }
        foreach ($sma as $key => $smavalue) {
            if ($value['district'] == $smavalue['district']) {
                if ($smavalue['total'] == null) {
                    echo "<td>0</td>";
                } else {
                    echo "<td>".$smavalue['total']."</td>";
                }
            }
        }
        foreach ($pt as $key => $ptvalue) {
            if ($value['district'] == $ptvalue['district']) {
                if ($ptvalue['total'] == null) {
                    echo "<td>0</td>";
                } else {
                    echo "<td>".$ptvalue['total']."</td>";
                }
            }
        }
        echo "/<tr>";
    }
?>
            </tbody>
        </table>
        </div>
    </div> <!-- END OF TAB DATA -->

<!-- Tab data map -->
    <div role="tabpanel" class="tab-pane" id="mapdata">
        <p>Map</p>
    </div> <!-- END OF TAB DATA MAP -->

</div> <!-- end of tab panes -->
        


<!-- end content           -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="modalInputLokasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Logout</h4>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan keluar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
        <a href="<?=base_url()?>hollow/logout" class="btn btn-primary btn-xs">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailLokasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Lokasi</h4>
      </div> -->
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6 col-sm-12">
            <address class="detail">
            </address>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="pull-right" id="mapModal"></div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAccepted" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Verifikasi Data</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-success" role="alert">Apakah anda yakin akan melakukan verifikasi data?</div>
      </div>
      <div class="modal-footer">
      <form method="post">
        <input type="hidden" name="id_location" class="idlocationaccepted"/>
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
        <button name="accepted" href="#" class="btn btn-success btn-xs">Accepted</button>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDenied" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Verifikasi Data</h4>
      </div>
      <div class="modal-body">
      <div class="alert alert-danger" role="alert">Apakah anda yakin akan menolak data dari kontributor?</div>
      </div>
      <div class="modal-footer">
      <form method="post">
        <input type="hidden" name="id_location" class="idlocationdenied"/>
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
        <button name="denied" href="#" class="btn btn-danger btn-xs">Declined</button>
      </form>
      </div>
    </div>
  </div>
</div>
