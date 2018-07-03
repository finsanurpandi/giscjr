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
    <form method="post" class="sidebar-form">
      <div class="input-group">
        <select name="kategori" class="form-control">
          <option>All ...</option>
          <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
        </select>
      </div>
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search location..." id="searchForm">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li id="menuCianjur">
        <a href="#" id="cianjur">
          <i class="fa fa-bandcamp"></i> <span>Cianjur</span>
          <!-- <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span> -->
        </a>
      </li>
      <li class="treeview" id="pemerintahan">
        <a href="#">
          <i class="fa fa-institution"></i> <span>Pemerintahan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li id="menuDinas" class=""><a href="#" id="kantorDinas"><i class="fa fa-circle-o"></i> Kantor Dinas</a></li>
          <li id="menuKecamatan" class=""><a href="#" id="kantorKecamatan"><i class="fa fa-circle-o"></i> Kantor Kecamatan</a></li>
          <li id="menuUmum" class=""><a href="#" id="pelayananUmum"><i class="fa fa-circle-o"></i> Pelayanan Umum</a></li>
          <li id="menuBumd" class=""><a href="#" id="bumd"><i class="fa fa-circle-o"></i> BUMD</a></li>
        </ul>
      </li>
      <li class="treeview" id="pendidikan">
        <a href="#">
          <i class="fa fa-mortar-board"></i>
          <span>Pendidikan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li id="menuSd"><a href="#" id="sekolahDasar"><i class="fa fa-circle-o"></i> SD</a></li>
          <li id="menuSmp"><a href="#" id="smp"><i class="fa fa-circle-o"></i> SMP</a></li>
          <li id="menuSma"><a href="#" id="sma"><i class="fa fa-circle-o"></i> SMA/SMK</a></li>
          <li id="menuPt"><a href="#" id="pt"><i class="fa fa-circle-o"></i> Perguruan Tinggi</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-ambulance"></i>
          <span>Kesehatan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li id="menuRs"><a href="#" id="rs"><i class="fa fa-circle-o"></i> Rumah Sakit</a></li>
          <li id="menuPuskesmas"><a href="#" id="puskesmas"><i class="fa fa-circle-o"></i> Puskesmas</a></li>
        </ul>
      </li>
      <li id="menuPariwisata">
        <a href="#" id="pariwisata">
          <i class="fa fa-tree"></i> <span>Pariwisata</span>
          <!-- <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span> -->
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-shopping-basket"></i>
          <span>Bidang Usaha</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li id="menuKuliner"><a href="#" id="kuliner"><i class="fa fa-circle-o"></i> Kuliner</a></li>
          <li id="menuPerbankan"><a href="#" id="perbankan"><i class="fa fa-circle-o"></i> Perbankan</a></li>
          <li id="menuUmkm"><a href="#" id="umkm"><i class="fa fa-circle-o"></i> UMKM</a></li>
          <li id="menuPenginapan"><a href="#" id="penginapan"><i class="fa fa-circle-o"></i> Penginapan</a></li>
        </ul>
      </li>
      <li id="menuSarana">
        <a href="#" id="sarana">
          <i class="fa fa-building"></i> <span>Sarana Prasarana</span>
          <!-- <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span> -->
        </a>
      </li>

      <li>
        <a href="pages/widgets.html">
          <i class="fa fa-user-circle"></i> <span>Tentang</span>
          <!-- <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span> -->
        </a>
      </li>

  </section>
  <!-- /.sidebar -->
</aside>

