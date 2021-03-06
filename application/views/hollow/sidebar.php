<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
      <img src="<?=base_url()?>assets/img/cjr_160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Kabupaten Cianjur</p>
        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
      </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li id="menuDashboard">
        <a href="<?=base_url()?>hollow/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li id="menuMaster" class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="menuLokasi"><a href="<?=base_url()?>hollow/lokasi"><i class="fa fa-circle-o"></i> Data Lokasi</a></li>
            <li id="menuKategori"><a href="<?=base_url()?>hollow/kategori"><i class="fa fa-circle-o"></i> Data Kategori</a></li>
            <li id="menuKategori"><a href="<?=base_url()?>hollow/user"><i class="fa fa-circle-o"></i> Data User</a></li>
          </ul>
      </li>
      <li id="menuVerifikasi">
        <a href="<?=base_url()?>hollow/verifikasi">
          <i class="fa fa-check-square-o"></i> <span>Verifikasi Data</span>
        </a>
      </li>
      <li id="menuStatistik" class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Statistik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="menuAllData"><a href="<?=base_url()?>hollow/statistik"><i class="fa fa-circle-o"></i> All Data</a></li>
            <li id="menuStPendidikan"><a href="<?=base_url()?>hollow/pendidikan"><i class="fa fa-circle-o"></i> Pendidikan</a></li>
          </ul>
      </li>
      <li>
        <a href="#" data-toggle="modal" data-target="#modalLogout">
          <i class="fa fa-sign-out"></i> <span>Logout</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Modal -->
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

