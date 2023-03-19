  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
          <a href="index.php" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
              <span class="d-none d-lg-block">Prestok</span>
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">

              <li class="nav-item d-block d-lg-none">
                  <a class="nav-link nav-icon search-bar-toggle " href="#">
                      <i class="bi bi-search"></i>
                  </a>
              </li><!-- End Search Icon-->

              <li class="nav-item dropdown pe-3">

                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                      <img src="admin/<?= $admin["img_dir"]; ?>" alt="Profile" class="rounded-circle">
                      <span class="d-none d-md-block dropdown-toggle ps-2"><?= $admin["nama_lengkap"]; ?></span>
                  </a><!-- End Profile Iamge Icon -->

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                      <li class="dropdown-header">
                          <h6><?= $admin["nama_lengkap"]; ?></h6>
                          <span>Administrator</span>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li>
                          <a class="dropdown-item d-flex align-items-center" href="profile.php">
                              <i class="bi bi-person"></i>
                              <span>My Profile</span>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li>
                          <a class="dropdown-item d-flex align-items-center" href="profile.php">
                              <i class="bi bi-gear"></i>
                              <span>Account Settings</span>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li>
                          <a class="dropdown-item d-flex align-items-center" href="https://api.whatsapp.com/send?phone=6289522815496&text=Assalamualaikum%20Hai, Kak%20Saya%20dari%20Aplikasi%20Prestok%20%20Mohon%20Perbaiki%20Bugnya?." target="_blank">
                              <i class="bi bi-question-circle"></i>
                              <span>Need Help?</span>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li>
                          <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
                              <i class="bi bi-box-arrow-right"></i>
                              <span>Sign Out</span>
                          </a>
                      </li>

                  </ul><!-- End Profile Dropdown Items -->
              </li><!-- End Profile Nav -->

          </ul>
      </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->