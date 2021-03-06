
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Master
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>hollow/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Data Master</li>
        <li class="active">Data Lokasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Lokasi</h3>
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
                    <th>Nama</th>
                    <th>Address</th>
                    <th>Kecamatan</th>
                    <th>Kategori</th>
                    <th>Sub Kategori</th>
                    <th>Koordinat</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
<?php
    $no = 1;
    foreach ($location as $key => $value) {
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td><strong>".$value['name']."</strong></td>";
        echo "<td>".$value['address']."</td>";
        echo "<td>".$value['district']."</td>";
        echo "<td>".$value['category']."</td>";
        echo "<td>".$value['sub_category']."</td>";
        echo "<td>".$value['lat']."/".$value['lng']."</td>";
        echo "<td>".$value['type']."</td>";
        echo "<td>";
        echo "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='#modalEditSubkategori'><i class='fa fa-pencil'></i></button>";
        echo "&nbsp;";
        echo "<button class='btn btn-danger btn-xs' data-toggle='modal' data-target='#modalHapusSubkategori'><i class='fa fa-trash'></i></button>";
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
