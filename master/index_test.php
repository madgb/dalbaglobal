<?php include $_SERVER["DOCUMENT_ROOT"]."/master/_inc/head.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/include_default_html.php"; ?>

<?php 
if (!isset($_SESSION["user_id"])) {
    echo "<script>
            alert('로그인이 필요합니다.');
            location.replace('./login.php');
          </script>";
    exit;
}
?>

<?php
$today = [date("Y-m-d")];
$total_query = "SELECT * FROM tb_enquiry_package WHERE DATE(w_dt) = ?";
$total_result = $DB->get_results($total_query,$today);

$query = "SELECT ep.*, e.* FROM tb_enquiry_package ep JOIN tb_enquiry e ON ep.e_idx = e.e_idx WHERE is_responded IS TRUE";
$result = $DB->get_results($query);

$query = "SELECT ep.*, e.* FROM tb_enquiry_package ep JOIN tb_enquiry e ON ep.e_idx = e.e_idx WHERE is_responded IS FALSE ORDER BY ep.w_dt DESC";
$unread_result = $DB->get_results($query);

?>

<body>
  <!-- Begin page -->
  <div id="layout-wrapper">
    <?php include $_SERVER["DOCUMENT_ROOT"]."/master/_inc/header.php"; ?>
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <!-- Light Logo-->
        <a href="./index.php" class="logo logo-light">
          <span class="logo-sm">
            <img src="/_img/common/logo-sm.png" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="/_img/common/logo.png" alt="" height="17">
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
            <li class="nav-item">
              <a class="nav-link menu-link" href="/master/index.php"  role="button"
                aria-expanded="false" aria-controls="sidebarDashboards">
                <i class="ri-home-5-line"></i> <span data-key="t-dashboards">메인화면</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link menu-link" href="/master/enquiries/enquiries_list.php" role="button"
                aria-expanded="false" aria-controls="sidebarApps">
                <i class=" ri-edit-box-line"></i> <span data-key="t-apps">견적 문의함</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link menu-link" href="#sidebar1" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebar1">
                <i class=" ri-edit-circle-line"></i> <span data-key="t-apps">포트폴리오</span>
              </a>
              <div class="collapse menu-dropdown" id="sidebar1">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/master/portfolio/portfolio_list.php" class="nav-link" data-key="t-chat"> 포트폴리오 </a>
                  </li>
                  <li class="nav-item">
                    <a href="/master/portfolio/portfolio_reg.php" class="nav-link" data-key="t-chat"> 포트폴리오 등록 </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link menu-link" href="#sidebar2" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebar2">
                <i class=" ri-customer-service-line"></i> <span data-key="t-apps">고객센터</span>
              </a>
              <div class="collapse menu-dropdown" id="sidebar2">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/master/customer/customer_list.php" class="nav-link" data-key="t-chat"> 고객센터 </a>
                  </li>
                  <li class="nav-item">
                    <a href="/master/customer/customer_reg.php" class="nav-link" data-key="t-chat"> 고객센터 등록 </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link menu-link" href="#sidebar3" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebar3">
                <i class="ri-direction-fill"></i> <span data-key="t-apps">공지팝업</span>
              </a>
              <div class="collapse menu-dropdown" id="sidebar3">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/master/popup/popup_list.php" class="nav-link" data-key="t-chat"> 공지팝업 </a>
                  </li>
                  <li class="nav-item">
                    <a href="/master/popup/popup_reg.php" class="nav-link" data-key="t-chat"> 공지팝업 등록 </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
        <!-- Sidebar -->
      </div>

      <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="row mt-3">
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body p-3">
                      <p class="fs-4 fw-bold">2025년 2월 5일 수요일</p>
                      <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div id="calendar"></div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                          <div class="card mb-0 h-100">
                            <div class="card-header fs-4 fw-bold">문의건수(today)</div>
                            <div class="card-body">
                              <div class="p-4 py-3 mb-3 rounded bg-success-subtle text-dark-emphasis text-center fs-4">
                                총 <b class="fw-bold"><?php echo $total_result['cnt'] ?></b>건
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                          <div class="card mb-0 h-100">
                            <div class="card-header fs-4 fw-bold">견적서 회신 완료(건)</div>
                            <div class="card-body">
                              <div class="p-4 py-3 mb-3 rounded bg-success-subtle text-dark-emphasis text-center fs-4">
                                총 <b class="fw-bold"><?php echo $result['cnt'] ?></b>건
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <!-- <div class="col-lg-2 col-md-6 col-sm-6 align-self-stretch">
                          <div class="card mb-0 h-100">
                            <div class="card-header fs-4 fw-bold">데이터 용량</div>
                            <div class="card-body">
                              <canvas id="doughnut" class="chartjs-chart"></canvas>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 align-self-stretch">
                          <div class="card mb-0 h-100">
                            <div class="card-header fs-4 fw-bold">문의량 (주간비교)</div>
                            <div class="card-body">
                              <canvas id="lineChart" class="chartjs-chart"></canvas>
                            </div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body p-3">
                      <p class="fs-4 fw-bold">미확인 견적문의   <?php echo $unread_result['cnt']?>건</p>
                      <div class="live-preview p-3">
                        <div class="table-responsive table-card">
                          <table class="table align-middle table-striped table-nowrap mb-0 table_list">
                            <colgroup>
                            <!-- <col style="width: 80px;"> -->
                            <col style="width: 180px;">
                            <col style="width: 130px;">
                            <col style="width: 200px;">
                            <col style="width: 150px;">
                            <!-- <col style="width: 150px;">
                            <col style="width: 150px;">
                            <col style="width: 150px;">
                            <col style="width: 150px;"> -->
                            <col style="width: 130px;">
                            </colgroup>
                            <thead class="table-light">
                              <tr>
                              <!-- <th scope="col">No</th> -->
                              <th scope="col">업체명 및 이름<br>연락처 및 이메일</th>
                              <th scope="col">형태 및 종류</th>
                              <th scope="col">사이즈(가로/세로/높이)</th>
                              <th scope="col">수량</th>
                              <!-- <th scope="col">재질</th>
                              <th scope="col">인쇄</th>
                              <th scope="col">코팅</th>
                              <th scope="col">후가공</th> -->
                              <th scope="col">문의날짜</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php if ($unread_result['cnt'] > 0) {
                              $i = 0;
                              foreach ($unread_result['result'] as $row) { $i++;?>
                                <tr>
                                <!-- <td><?php echo $i;?></td> -->
                                <td>
                                  <?php echo $row['company'] . (!empty($row['name']) ? " ({$row['name']})" : ""); ?>
                                  <br>
                                  <?php echo $row['phone'] . (!empty($row['email']) ? " ({$row['email']})" : ""); ?>
                                </td>
                                <td><?php echo $row['form'] . " " . $row['type']; ?></td>
                                <td><?php $widths = json_decode($row['width'], true);
                                      $lengths = json_decode($row['length'], true);
                                      $heights = json_decode($row['height'], true);
                                      if (is_array($widths) && is_array($lengths) && is_array($heights)) {
                                        $count = min(count($widths), count($lengths), count($heights)); 
                                        for ($i = 0; $i < $count; $i++) {
                                          if($widths[$i]!=="" && $lengths[$i] !== "" & $heights[$i]!==""){
                                            echo $widths[$i] . "/" . $lengths[$i] . "/" . $heights[$i] . "<br>";
                                          }
                                        }
                                      } ?></td>
                                <td><?php $quantities = json_decode($row['quantity'],true); 
                                          echo implode(", ", $quantities);?></td>
                                <!-- <td><?php echo $row['texture']?></td>
                                <td><?php echo $row['print']?> </td>
                                <td><?php echo $row['coating']?></td>
                                <td><?php echo $row['processing']?></td> -->
                              <td><?php echo date('Y.m.d', strtotime($row['w_dt']))?></td>                           
                            </tr>
                              <?php } 
                            } else {
                              ?>
                              <tr>
                                <td colspan="9"> <?php echo "미확인된 견적문의가 없습니다.";?>
                                </td>
                            </tr>
                            <?php }?>                
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- end col -->
          </div>
        </div>
        <!-- container-fluid -->
      </div>
      <!-- End Page-content -->
      <?php include $_SERVER["DOCUMENT_ROOT"]."/master/_inc/footer.php"; ?>

    </div>
    <!-- end main content-->
  </div>
  <!-- END layout-wrapper -->

  <!-- JAVASCRIPT -->
  <script src="/master/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/master/assets/libs/simplebar/simplebar.min.js"></script>
  <script src="/master/assets/libs/node-waves/waves.min.js"></script>
  <script src="/master/assets/libs/feather-icons/feather.min.js"></script>
  <script src="/master/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
  <script src="/master/assets/js/plugins.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>


  <!-- Vector map-->
  <script src="/master/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
  <script src="/master/assets/libs/jsvectormap/maps/world-merc.js"></script>

  <!--Swiper slider js-->
  <script src="/master/assets/libs/swiper/swiper-bundle.min.js"></script>

  <!-- Dashboard init -->
  <script src="/master/assets/js/pages/dashboard-ecommerce.init.js"></script>

  <!-- Chart JS -->
  <script src="assets/libs/chart.js/chart.umd.js"></script>

  <script>

  $(document).ready(function() {
    $('#calendar').fullCalendar({
      defaultView: 'month',
      height: 500,
      contentHeight: 400
    });
  });


    // let doughnut = document.getElementById('doughnut');
    // let line = document.getElementById('lineChart');

    // new Chart(doughnut, {
    //   type: 'doughnut',
    //   data: {
    //     datasets: [{
    //       label: '데이터 용량',
    //       data: [80, 100],
    //       backgroundColor: [
    //         '#6EC864',
    //         '#fafafa',
    //       ],
    //       hoverOffset: 4
    //     }]
    //   },
    // });

    // const labels = ["1주차","2주차","3주차","4주차"];
    // const dataList = [80,45,23,48];
    // new Chart(line, {
    //   type: 'line',
    //   data: {
    //     labels: labels,
    //     datasets: [
    //         {
    //             label: '',
    //             data: dataList,
    //             borderWidth:2,
    //             borderColor: '#6EC864',
    //             backgroundColor: '#6EC864',
    //             pointRadius:3,
    //         },
    //     ],
    // },
    // options: {
    //     layout: {
    //         padding:{
    //           left:-12,
    //         },
    //     },
    //     scales:{
    //         x:{
    //             grid:{ 
    //                 drawTicks:false, //영역 밖으로 넘어간 그리드 선 삭제
    //                 color:"#ECECEC"  
    //             }, 
    //             ticks:{
    //               font:{
    //                   size: 12,
    //                 },
    //                 color:'#4F4F4F',
    //             }
    //         },
    //         y:{
    //             grid:{
    //                 drawTicks:false,
    //                 color:"#ECECEC"  
    //             },
    //             beginAtZero: true, // 0부터 시작
    //             suggestedMax: 120, // 권장 최댓값
    //             ticks:{
    //                 font:{
    //                   size: 12,
    //                 },
    //                 color:'#4F4F4F',
    //                 stepSize: 20, //고정 단계
    //                 padding: 12,
    //             },
    //         },
    //     },
    //     plugins: {
    //         // 일반 범례
    //         legend: {
    //             display: false,
    //         },
    //         tooltip: {
    //             enabled: true,
    //         },
    //     },
    //     animation: true,
    //     maintainAspectRatio: true, //크기 조정 시차트의 비율 유지
    //     devicePixelRatio: 1.5, //해상도 증가
    //     aspectRatio: 1, //차트의 비율 (가로/세로)
    // },
    // });

    
  </script>

  <!-- App js -->
  <script src="/master/assets/js/app.js"></script>
</body>
</html>