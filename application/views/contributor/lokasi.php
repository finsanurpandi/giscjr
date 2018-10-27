
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
                    <th>Status</th>
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
        echo "<td>";
        if ($value['status'] == 0) {
          echo "<span class='label label-warning'>Pending</span>";
        } else if ($value['status'] == 1) {
          echo "<span class='label label-success'>Accepted</span>";
        } else {
          echo "<span class='label label-danger'>Rejected</span>";
        }
        echo "</td>";
        echo "<td>";
        if ($value['status'] == 0 || $value['status'] == 2) {
        echo "<button class='btn btn-success btn-xs editLokasi' data-toggle='modal' data-target='#modalEditLokasi' data-name='".$value['name']."' data-address='".$value['address']."' data-district='".$value['district']."' data-category='".$value['category']."' data-lat='".$value['lat']."' data-lng='".$value['lng']."'><i class='fa fa-pencil'></i></button>";
        echo "&nbsp;";
        echo "<button class='btn btn-danger btn-xs' data-toggle='modal' data-target='#modalHapusLokasi'><i class='fa fa-trash'></i></button>";
        }
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


<!-- Modal Input Lokasi -->
<div class="modal fade modal-primary-custom" id="modalInputLokasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Input Location</h4>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name"/>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>District</label>
            <select class="form-control" name="district">
            <option></option>
            <?php
              foreach ($district as $key => $value) {
                echo "<option value=".$value['district'].">".$value['district']."</option>";
              }
            ?>
            </select>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=col-md-6>
              <label>Category</label>
              <select name="category" class="form-control" id="category" onchange="selectSubCategory();">
              <option></option>
              <?php
                foreach ($category as $key => $value) {
                  echo "<option value=".$value['category'].">".$value['category']."</option>";
                }
              ?>
              </select>
              </div>
              <div class=col-md-6>
              <label>Sub Category</label>
              <select name="sub_category" class="form-control" id="subCategory" onChange="selectIconType();">
              <option></option>
              <?php
                foreach ($sub_category as $key => $value) {
                  echo "<option value=".$value['sub_category'].">".$value['sub_category']."</option>";
                }
              ?>
              </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=col-md-6>
              <label>Latitude</label>
              <input type="text" name="lat" class="form-control"/>
              </div>
              <div class=col-md-6>
              <label>Longitude</label>
              <input type="text" name="lng" class="form-control"/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Icon Type</label>
            <select name="type" class="form-control" id="iconType">
            <option></option>
            <?php
              foreach ($icon_type as $key => $value) {
                echo "<option value=".$value['type'].">".ucwords($value['type'])."</option>";
              }
            ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancel</button>
        <input type="submit" name="submit" class="btn btn-primary btn-xs" value="Submit"/>
        <!-- <a href="#" name="submit" class="btn btn-primary btn-xs">Submit</a> -->
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Lokasi -->
<div class="modal fade modal-primary-custom" id="modalEditLokasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Location</h4>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label>Name</label>
            <input class="form-control nameLocation" type="text" name="name"/>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control addressLocation"></textarea>
          </div>
          <div class="form-group">
            <label>District</label>
            <select class="form-control districtLocation" name="district">
            <option></option>
            <?php
              foreach ($district as $key => $value) {
                echo "<option value=".$value['district'].">".$value['district']."</option>";
              }
            ?>
            </select>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=col-md-6>
              <label>Category</label>
              <select name="category" class="form-control categoryLocation" id="editCategory">
              <option></option>
              <?php
                foreach ($category as $key => $value) {
                  echo "<option value=".$value['category'].">".$value['category']."</option>";
                }
              ?>
              </select>
              </div>
              <div class=col-md-6>
              <label>Sub Category</label>
              <select name="sub_category" class="form-control subcatLocation" id="editSubCategory">
              <option></option>
              <?php
                foreach ($sub_category as $key => $value) {
                  echo "<option value=".$value['sub_category'].">".$value['sub_category']."</option>";
                }
              ?>
              </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=col-md-6>
              <label>Latitude</label>
              <input type="text" name="lat" class="form-control latLocation"/>
              </div>
              <div class=col-md-6>
              <label>Longitude</label>
              <input type="text" name="lng" class="form-control lngLocation"/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Icon Type</label>
            <select name="type" class="form-control typeLocation" id="iconType">
            <option></option>
            <?php
              foreach ($icon_type as $key => $value) {
                echo "<option value=".$value['type'].">".ucwords($value['type'])."</option>";
              }
            ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancel</button>
        <input type="submit" name="submit" class="btn btn-success btn-xs" value="Submit"/>
        <!-- <a href="#" name="submit" class="btn btn-primary btn-xs">Submit</a> -->
        </form>
      </div>
    </div>
  </div>
</div>
