
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
        <li class="active">Data Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">

    <div class="col-md-6 col-xs-12">
      <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Kategori</h3>
        </div>
        <div class="box-body">
<!-- content here -->
                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalInputKategori">
                    <i class="fa fa-plus"></i> Tambah
                </button>
                <hr/>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
    $no = 1;
    foreach ($category as $key => $value) {
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$value['category']."</td>";
        echo "<td>";
        echo "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='#modalEditKategori'><i class='fa fa-pencil'></i></button>";
        echo "&nbsp;";
        echo "<button class='btn btn-danger btn-xs' data-toggle='modal' data-target='#modalHapusKategori'><i class='fa fa-trash'></i></button>";
        echo "</td>";
        echo "</tr>";
    }
?>
                        <tbody>
                    </table>
                </div>

<!-- end content           -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <div class="col-md-6 col-xs-12">
      <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Sub Kategori</h3>
        </div>
        <div class="box-body">
<!-- content here -->
                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalInputKategori">
                    <i class="fa fa-plus"></i> Tambah
                </button>
                <hr/>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Sub Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
    $no = 1;
    foreach ($subcategory as $key => $value) {
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$value['category']."</td>";
        echo "<td>".$value['sub_category']."</td>";
        echo "<td>";
        echo "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='#modalEditSubkategori'><i class='fa fa-pencil'></i></button>";
        echo "&nbsp;";
        echo "<button class='btn btn-danger btn-xs' data-toggle='modal' data-target='#modalHapusSubkategori'><i class='fa fa-trash'></i></button>";
        echo "</td>";
        echo "</tr>";
    }
?>
                        <tbody>
                    </table>
                </div>

<!-- end content           -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- row -->
    </div> 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
