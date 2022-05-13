 <!-- Sidebar -->
 <div class="sidebar">

     <div class="sidebar-wrapper scrollbar-inner">
         <div class="sidebar-content">
             <div class="user">
                 <div class="info">
                     <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                         <span>
                             <?= $_SESSION['nama_user'] ?>
                             <!-- <span class="user-level">Administrator</span> -->
                             <!-- <span class="caret"></span> -->
                         </span>
                     </a>
                     <div class="clearfix"></div>

                 </div>
             </div>
             <ul class="nav">
                 <li class="nav-item <?php if($this->uri->segment(2) == 'dashboard') { echo "active"; }?>">
                     <a href="<?= base_url('admin/dashboard') ?>">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-section">
                     <h4 class="text-section">Master Data</h4>
                 </li>
                 <li class="nav-item <?php if($this->uri->segment(2) == 'satuan') { echo "active"; }?>">
                     <a href="<?= base_url('admin/satuan') ?>">
                         <i class="fas fa-balance-scale"></i>
                         <p>Satuan</p>
                     </a>
                 </li>

                 <li class="nav-section">
                     <h4 class="text-section">Transaksi</h4>
                 </li>
                 <li class="nav-item <?php if($this->uri->segment(3) == 'masuk') { echo "active"; }?>">
                     <a href="<?= base_url('admin/transaksi/masuk') ?>">
                        <i class="fas fa-arrow-down"></i>
                         <p>Barang Masuk</p>
                     </a>
                 </li>
                 <li class="nav-item <?php if($this->uri->segment(3) == 'keluar') { echo "active"; }?>">
                     <a href="<?= base_url('admin/transaksi/keluar') ?>">
                     <i class="fas fa-exchange-alt"></i>
                         <p>Barang Keluar</p>
                     </a>
                 </li>
                
                 

                 <li class=" nav-section">
                     <h4 class="text-section">Pengaturan</h4>
                 </li>
                 <li class="nav-item <?php if($this->uri->segment(3) == 'email') { echo "active"; }?>">
                     <a href="<?= base_url('admin/profil') ?>">
                         <i class="fas fa-cogs"></i>
                         <p>Rubah Kata Sandi</p>
                     </a>
                 </li>
               

                 <li class="nav-item <?php if($this->uri->segment(3) == 'email') { echo "active"; }?>">
                     <a href="<?= base_url('admin/logout') ?>">
                         <i class="fas sign-out-alt"></i>
                         <p>Keluar</p>
                     </a>
                 </li>
               
                  
             </ul>
         </div>
     </div>
 </div>

