
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
        <li>Data Lokasi</li>
        <li class="active">Data Lokasi</li>
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

        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalInputLokasi">
            <i class="fa fa-plus"></i> Tambah
        </button>
        <hr/>
        <div class="table-responsive">
        <table id="tbl-data" class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kontributor</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>View</th>
                    <th>Verification?</th>
                </tr>
            </thead>
            <tbody>
<?php
    $no = 1;
    foreach ($location as $key => $value) {
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td><strong>".$value['user']."</strong></td>";
        echo "<td><strong>".$value['name']."</strong></td>";
        echo "<td>";
        echo "<a href='#' class='btn btn-primary btn-xs detailLokasi' data-toggle='modal' data-target='#detailLokasi' data-name='".$value['name']."' data-address='".$value['address']."' data-district='".$value['district']."' data-category='".$value['category']."' data-sub='".$value['sub_category']."' data-lat='".$value['lat']."' data-lng='".$value['lng']."' data-type='".$value['type']."'>detail location</a>";
        echo "</td>";
        echo "<td>";
        // echo "<a href='https://www.google.com/maps/@".$value['lat'].",".$value['lng'].",17z' class='btn btn-success btn-xs' target='_blank'>view on gMap</a>";
        echo "<a href='https://www.google.com/maps/search/?api=1&query=".$value['lat'].",".$value['lng']."' class='btn btn-success btn-xs' target='_blank'>view on gMap</a>";
        echo "</td>";
        echo "<td>";
        echo "<button class='btn btn-success btn-xs accepted' data-toggle='modal' data-target='#modalAccepted' data-id='".$value['id_location']."'><i class='fa fa-check'></i></button>";
        echo "&nbsp;";
        echo "<button class='btn btn-danger btn-xs denied' data-toggle='modal' data-target='#modalDenied' data-id='".$value['id_location']."'><i class='fa fa-remove'></i></button>";
        echo "</td>";
        echo "</tr>";
    }
?>
            </tbody>
        </table>
        </div>


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
