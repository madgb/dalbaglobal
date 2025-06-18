<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/checkloginSa.php"; 

try {

  // $quOpt = "SELECT DISTINCT w_year FROM tb_board_info WHERE bbs_cd ='Announcements' AND is_del = 'N' order by w_year DESC";
  // $reOpt = $DB->get_results($quOpt);

  // $strOpt = "";
  // if($reOpt['cnt'] > 0){
  //   foreach ($reOpt['result'] as $rwOpt) {
  //     $strOpt.="<option value='".$rwOpt['w_year']."'>".$rwOpt['w_year']."년</option>";
  //   }
  // }


} catch (Exception $e) {

  $UTIL->alertTour($e->getMessage(),"/");
  exit;
}
?>

<?php include $_SERVER["DOCUMENT_ROOT"]."/master/_inc/head.php"; ?>
<body>
  <!-- Begin page -->
  <div id="layout-wrapper">
    <?php include $_SERVER["DOCUMENT_ROOT"]."/master/_inc/header.php"; ?>

    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Announcements</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Announcements</a></li>
                    <li class="breadcrumb-item active">Announcements</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- end page title -->

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header align-items-center d-flex">
                  <h4 class="card-title mb-0 flex-grow-1">Announcements 검색</h4>
                </div><!-- end card header -->
                <div class="card-body">
                  <div class="live-preview">
										<form name="srhFrm" id="srhFrm" action="javascript:void(0);" class="form_search">
                      <input type="hidden" name="bbs_category" id="bbs_category" value="ann">
                      <input type="hidden" name="csrfToken" id="csrfToken" value="<?php echo $_SESSION['csrfToken']?>">
                      <input type="hidden" name="bbs_cd" id="bbs_cd" value="ir">
                      <input type="hidden" name="t_page" id="t_page" value="1">

                      <div class="row gx-3 gy-2 mb-3 align-items-center mb-3">
                        <h4 class="form_title">검색</h4>
                        <div class="select_input_box col-auto">
                          <!-- <div class="col-auto">
														<label class="visually-hidden" for="srhField">검색</label>
														<select class="form-select" id="srhField" name="srhField">
                              <option value="">전체</option>
															<?PHP echo $strOpt?>

                            </select>
                          </div> -->
                          <input type="text" class="form-control" name="srhKey" id="srhKey" value="">
                        </div>
                      </div>
                      <div class="row gy-2 gx-3 mb-3 align-items-center">
                        <h4 class="form_title">등록일자</h4>
                        <div class="date_input_box col-auto">
                          <div class="date_select">
                            <input type="date" class="form-control form-date" id="s_date" name="s_date">
                            <span>~</span>
                            <input type="date" class="form-control form-date" id="e_date" name="e_date">
                          </div>
                          <div class="date_btns">
                            <button type="button" class="btn btn-outline-success waves-effect waves-light active"
                              onclick="clickDate('today', this)">오늘</button>
                            <button type="button" class="btn btn-outline-success waves-effect waves-light"
                              onclick="clickDate('day7', this)">7일</button>
                            <button type="button" class="btn btn-outline-success waves-effect waves-light"
                              onclick="clickDate('month1', this)">30일</button>
                            <button type="button" class="btn btn-outline-success waves-effect waves-light"
                              onclick="clickDate('month3', this)">3개월</button>
                            <button type="button" class="btn btn-outline-success waves-effect waves-light"
                              onclick="clickDate('month6', this)">6개월</button>
                          </div>
                        </div>
                      </div>
                      <div class="search_btns">
                        <button type="button" class="btn btn-light w-sm waves-effect" id="btnReset">초기화</button>
                        <button type="submit" class="btn btn-success w-sm waves-effect waves-light" id="btnSearch">검색</button>
                      </div>
                      <!--end row-->
                    </form>
                  </div>
                </div>
              </div>
            </div> <!-- end col -->
          </div>

          <div class="row">
            <div class="list_info">
              <span class="fs-6 flex-shrink-0">총 <b id="recordCnt">0</b>건</span>
              <div class="list_sort_btns">

								<select class="form-select" id="select_view_cnt">
									<option value="10" selected>10개씩 보기</option>
									<option value="20">20개씩 보기</option>
									<option value="30">30개씩 보기</option>
								</select>

                <div class="btns">
                  <a href="./ann_reg.php" class="btn btn-success w-md waves-danger waves-light">등록</a>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body p-3">
    
                  <div class="tab-content p-3 text-muted">

                    <div class="live-preview">
                      <div class="table-responsive table-card">
                        <table class="table align-middle table-striped table-nowrap mb-0 table_list">
                          <colgroup id="listCols">
                            <col style="width: 100px;">
                            <col style="width: 200px;">
                            <col style="width: 400px;">
                            <col style="width: 200px;">
                            <col style="width: 100px;">
                          </colgroup>
                          <thead class="table-light">
                            <tr>
                              <th scope="col">no</th>
                              <th scope="col">날짜</th>
                              <th scope="col">제목</th>
                              <th scope="col">등록일</th>
                              <th scope="col">수정일</th>
                            </tr>
                          </thead>
                          <tbody id="strList">
                          </tbody>
                        </table>
                      </div>
                    </div>

										<div class="d-flex justify-content-center mt-5">
											<div class="pagination-wrap hstack gap-2" id="pageList"></div>
										</div>                    

                  </div>
                </div>
              </div>
              
            </div>
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

  <!-- apexcharts -->
  <script src="/master/assets/libs/apexcharts/apexcharts.min.js"></script>

  <!-- Vector map-->
  <script src="/master/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
  <script src="/master/assets/libs/jsvectormap/maps/world-merc.js"></script>

  <!--Swiper slider js-->
  <script src="/master/assets/libs/swiper/swiper-bundle.min.js"></script>

  <!-- Dashboard init -->
  <script src="/master/assets/js/pages/dashboard-ecommerce.init.js"></script>

  <!-- <script src="/master/assets/_js/fn.ckeditorInit.js"></script> -->

  <!-- App js -->
  <script src="/master/assets/js/app.js"></script>

  <!-- Custom js -->
	<script type="module" src="/master/_js/getBoardList.js?v=<?PHP echo TIME_HIS?>"></script>


</body>
</html>