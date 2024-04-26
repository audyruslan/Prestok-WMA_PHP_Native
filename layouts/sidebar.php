  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link <?php if ($menu == "Dashboard") echo "";
                                    else echo "collapsed"; ?>" href="home.php">
                  <i class="bx bxs-dashboard"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link <?php if ($menu == "Data Barang") echo "";
                                    else echo "collapsed"; ?>" href="data-barang.php">
                  <i class='bx bxs-package'></i>
                  <span>Data Barang</span>
              </a>
          </li><!-- End Barang Page Nav -->

          <li class="nav-item">
              <a class="nav-link <?php if ($menu == "Data Penjualan") echo "";
                                    else echo "collapsed"; ?>" href="data-penjualan.php">
                  <i class='bx bxs-shopping-bags'></i>
                  <span>Data Penjualan</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link <?php if ($menu == "Proses Peramadan") echo "";
                                    else echo "collapsed"; ?>" href="proses-peramalan.php">
                  <i class='bx bx-line-chart'></i>
                  <span>Peramalan</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link <?php if ($menu == "Laporan Produk" || $menu == "Laporan Penjualan") echo "";
                                    else echo "collapsed"; ?>" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
                  <i class="bx bxs-file"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="laporan-nav" class="nav-content collapse <?php if ($menu == "Laporan Produk" || $menu == "Laporan Penjualan") echo "show";
                                                                else echo ""; ?>" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="laporan-produk.php" class="<?php if ($menu == "Laporan Produk" || $menu == "Laporan Penjualan") echo "active";
                                                            else echo ""; ?>">
                          <i class="bi bi-circle"></i><span>Laporan Produk</span>
                      </a>
                  </li>
                  <li>
                      <a href="laporan-penjualan.php" class="<?php if ($menu == "Laporan Penjualan") echo "active";
                                                                else echo ""; ?>">
                          <i class="bi bi-circle"></i><span>Laporan Penjualan</span>
                      </a>
                  </li>
              </ul>
          </li>


          <li class="nav-heading">Pages</li>

          <li class="nav-item">
              <a class="nav-link <?php if ($menu == "Profile") echo "";
                                    else echo "collapsed"; ?>" data-bs-target="#pengaturan-nav" data-bs-toggle="collapse" href="#">
                  <i class="bx bxs-cog"></i><span>Pengaturan</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="pengaturan-nav" class="nav-content collapse <?php if ($menu == "Profile") echo "show";
                                                                    else echo ""; ?>" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="profile.php" class="<?php if ($menu == "Profile") echo "active";
                                                    else echo ""; ?>">
                          <i class="bi bi-circle"></i><span>Profile</span>
                      </a>
                  </li>
              </ul>
          </li>

          <li class="nav-item">
              <a class="nav-link <?php if ($menu == "About") echo "";
                                    else echo "collapsed"; ?>" href="about.php">
                  <i class="bx bxs-info-circle"></i>
                  <span>Tentang Kami</span>
              </a>
          </li><!-- End About Us Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-toggle="modal" data-bs-target="#logoutModal">
                  <i class="bx bx-log-out"></i>
                  <span>Logout</span>
              </a>

          </li><!-- End About Us Page Nav -->

      </ul>

  </aside><!-- End Sidebar-->

  <div class="modal fade" id="logoutModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><i class="bx bx-log-out"></i> Logout</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  Hai, <strong><b><?= $admin["nama_lengkap"]; ?></b></strong><br>
                  Apakah, Kamu Yakin Ingin Keluar?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <a class="btn btn-primary" href="logout.php">Keluar</a>
              </div>
          </div>
      </div>
  </div>