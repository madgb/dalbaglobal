<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/checkloginSa.php"; 

try {


  if($_REQUEST['bIdx'] != ""){
    $b_idx = $DB->htmlfilter($_REQUEST['bIdx']);
    $qu = "SELECT * FROM tb_board_info WHERE b_idx = '".$b_idx."'";
    $rw = $DB->get_row($qu);

    $strFileAttach = "";

    $quAttach = "SELECT * FROM tb_board_attach WHERE b_idx ='".$b_idx."'";
    $reAttach = $DB->get_results($quAttach);
    if($reAttach['cnt'] > 0){
      foreach ($reAttach['result'] as $rwFile) {

				$oldAttachList[] = [
					"idx"  => $rwFile['ba_idx']
				, "ba_org"  => $rwFile['ba_file_org']
				, "ba_chg"  => $rwFile['ba_file_chg']
				, "ba_size" => $rwFile['ba_file_size']
				];

        $strFileAttach.="
        <li id='file-item-".$rwFile['ba_idx']."'>
        	<div class='file'>
         	  <a href='/_pro_inc/downloadFile.php?nm=".$rwFile['ba_file_chg']."&on=".$rwFile['ba_file_org']."'>".$rwFile['ba_file_org']."</a>
        		<button type='button' class='btn_delete btn_delete_file' data-filename='".$rwFile['ba_file_org']."' data-fileid='".$rwFile['ba_idx']."'>삭제</button>
        	</div>
        </li>";
      }
    }
  }




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
                <h4 class="mb-sm-0">Achievements 등록</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Achievements</a></li>
                    <li class="breadcrumb-item active">Achievements 등록</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- end page title -->
   
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">


                  <form name="regForm" id="regForm" method="POST" action="javascript:void(0);" novalidate>
                    <input type="hidden" name="bbs_category" id="bbs_category" value="achi">
                    <input type="hidden" name="bbs_cd" id="bbs_cd" value="achievements">
                    <input type="hidden" id="csrfToken" value="<?php echo $_SESSION['csrfToken']?>">
                    <input type="hidden" name="b_idx" id="b_idx" value="<?PHP echo $rw['b_idx']?>">


                    <div class="table-responsive table-responsive-detail">
                      <input type="hidden" name="idx" value="<?php echo $idx;?>"/>  
                      <table class="table align-middle table-nowrap mb-0 table_detail">
                        <colgroup>
                          <col style="width: 120px">
                          <col style="width: auto">
                          <col style="width: 120px">
                          <col style="width: auto">
                        </colgroup>
                        <tbody>

                        <tr>
                            <th>연도<span class="asterisk">*</span></th>
                            <td colspan="3">
                                <div class="d-flex align-items-center gap-2">
                                <input type="text" class="form-control" placeholder="" id="w_year" name="w_year" value="<?php echo isset($rw) ? $rw['w_year']:""?>" required msg="연도">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th>누적매출(억)<span class="asterisk">*</span></th>
                            <td colspan="3">
                              <div class="d-flex align-items-center gap-2">
                              <input type="text" class="form-control" placeholder="" id="subject" name="subject" value="<?php echo isset($rw) ? $rw['subject']:""?>" required msg="누적매출">
                              </div>
                            </td>
                        </tr>


                        </tbody>
                      </table>
                    </div>
                  
                    <div class="d-flex justify-content-end align-items-center mt-3 gap-2">
                      <a href="./achi_list.php" class="btn btn-md btn-light w-md">취소</a>
                      <?php if(isset($rw) && $rw!==null) {?>
                      <button type="button" class="btn btn-md w-md btn-success" name="action" id="btnDelete">삭제</button>
                      <button type="button" class="btn btn-md w-md btn-success" name="action" id="btnSave">수정</button>
                      <?php } else { ?>
                      <button type="button" class="btn btn-md w-md btn-success" name="action" id="btnSave">저장</button>
                        <?php }?>
                    </div>

                  </form>
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

  <!-- apexcharts -->
  <script src="/master/assets/libs/apexcharts/apexcharts.min.js"></script>

  <!-- Vector map-->
  <script src="/master/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
  <script src="/master/assets/libs/jsvectormap/maps/world-merc.js"></script>

  <!--Swiper slider js-->
  <script src="/master/assets/libs/swiper/swiper-bundle.min.js"></script>

  <!-- Dashboard init -->
  <script src="/master/assets/js/pages/dashboard-ecommerce.init.js"></script>

  <!-- ckeditor -->
  <script src="/master/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
  <script src="/master/assets/libs/@ckeditor/ckeditor5-build-classic/build/UploadAdapter.js"></script>

  <!-- App js -->
  <script src="/master/assets/js/app.js"></script>

	<!-- Custom js -->
  <script src="/master/_js/fn.formCheck.js?v=<?PHP echo TIME_HIS?>"></script>
	<script type="module" src="/master/_js/getBoardList.js?v=<?PHP echo TIME_HIS?>"></script>

</body>
</html>