  <header id="page-topbar">
    <div class="layout-width">
      <div class="navbar-header">
        <div class="d-flex">

          <button type="button"
            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none"
            id="topnav-hamburger-icon">
            <span class="hamburger-icon">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </button>
        </div>

        <div class="d-flex align-items-center">

          <div class="dropdown d-md-none topbar-head-dropdown header-item">
            <button type="button"
              class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
              id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="bx bx-search fs-22"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
              aria-labelledby="page-header-search-dropdown">
              <form class="p-3">
                <div class="form-group m-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search ..."
                      aria-label="Recipient's username">
                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="dropdown ms-sm-3 header-item topbar-user">
            <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="d-flex align-items-center">
                <img class="rounded-circle header-profile-user" src="/_img/common/floating_img.png" style="object-fit:contain"
                  alt="Header Avatar">
                <span class="text-start ms-xl-2">
                  <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"> <?php echo $_SESSION['user_name']?></span>
                  <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">관리자</span>
                </span>
              </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
              <!-- item-->
              <h6 class="dropdown-header">Welcome <?php echo $_SESSION['user_name']?></h6>
              <!-- <a class="dropdown-item" href="auth-logout-basic.html"><i -->
              <a class="dropdown-item" href="javascript:void(0);" onclick="openModal('modal-password')"><i 
                  class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                  >비밀번호 변경</span></a>
              <a class="dropdown-item" href="/master/logout.php"><i 
                  class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                  data-key="t-logout">로그아웃</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php include $_SERVER["DOCUMENT_ROOT"]."/master/_inc/password_modal.php";?>
 
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <!-- Light Logo-->
        <a href="/master/board/ir_list.php" class="logo logo-light">
          <span class="logo-sm">
            <img src="/_img/common/logo_white.svg" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="/_img/common/logo_white.svg" alt="" height="40">
          </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
          id="vertical-hover">
          <i class="ri-record-circle-line"></i>
        </button>
      </div>

      <div id="scrollbar">
        <div class="container-fluid">
          <div id="two-column-menu">
          </div>
          <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <!-- <li class="nav-item">
              <a class="nav-link menu-link" href="/master/index.php"  role="button"
                aria-expanded="false" aria-controls="sidebarDashboards">
                <i class="ri-home-5-line"></i> <span data-key="t-dashboards">메인화면</span>
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link menu-link" href="/master/board/ir_list.php" role="button"
                aria-expanded="false" aria-controls="sidebarApps">
                <i class=" ri-edit-box-line"></i> <span data-key="t-apps">IR Material</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link menu-link" href="/master/board/ann_list.php" role="button"
                aria-expanded="false" aria-controls="sidebar1">
                <i class=" ri-edit-circle-line"></i> <span data-key="t-apps">Announcements</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu-link" href="/master/board/news_list.php" role="button"
                aria-expanded="false" aria-controls="sidebar2">
                <i class=" ri-customer-service-line"></i> <span data-key="t-apps">Newsroom</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu-link" href="/master/board/history_list.php" role="button"
                aria-expanded="false" aria-controls="sidebar3">
                <i class="ri-direction-fill"></i> <span data-key="t-apps">History</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu-link" href="/master/board/achi_list.php" role="button"
                aria-expanded="false" aria-controls="sidebar3">
                <i class="ri-direction-fill"></i> <span data-key="t-apps">Achievements</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- Sidebar -->
      </div>

      <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->

