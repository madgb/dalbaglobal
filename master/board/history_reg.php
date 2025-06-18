<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/include_default_html.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/_pro_inc/checkloginSa.php"; 

try {

    if($_REQUEST['bIdx'] != ""){
        $b_idx = $DB->htmlfilter($_REQUEST['bIdx']);
        $qu = "SELECT * FROM tb_board_info WHERE b_idx = '".$b_idx."'";
        $rw = $DB->get_row($qu);
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
                <h4 class="mb-sm-0">History 등록</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">History</a></li>
                    <li class="breadcrumb-item active">History 등록</li>
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
                    <input type="hidden" name="bbs_category" id="bbs_category" value="his">
                    <input type="hidden" name="bbs_cd" id="bbs_cd" value="history">
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
                            <td>
                              <div class="d-flex align-items-center gap-2">
                                <input type="text" class="form-control form-date" placeholder="" id="w_year" name="w_year" value="<?php echo isset($rw) ? $rw['w_year']:""?>" required msg="연도">
                              </div>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <th>기간<span class="asterisk">*</span></th>
                            <td colspan="3">
                              <div class="d-flex align-items-center gap-2">
                              <input type="text" class="form-control" placeholder="" id="subject" name="subject" value="<?php echo isset($rw) ? $rw['subject']:""?>" required msg="기간">
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th>기간(영문)<span class="asterisk">*</span></th>
                            <td colspan="3">
                              <div class="d-flex align-items-center gap-2">
                              <input type="text" class="form-control" placeholder="" id="subject_eng" name="subject_eng" value="<?php echo isset($rw) ? $rw['subject_eng']:""?>" msg="기간*영문)">
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th>내용</th>
                            <td colspan="3">
                            <textarea id="content" name="content" rows="6" style="width: 100%; box-sizing: border-box;"><?php echo $rw['content']; ?></textarea>
                            </td>
                          </tr>
                          <tr>
                            <th>내용(영문)</th>
                            <td colspan="3">
                            <textarea id="content_eng" name="content_eng" rows="6" style="width: 100%; box-sizing: border-box;"><?php echo $rw['content_eng']; ?></textarea>
                            </td>
                          </tr>
                          <tr>
                            <th>등록일</th>
                            <td colspan="3">
                              <div class="d-flex align-items-center gap-2">
                                <input type="text" class="form-control" placeholder="" id="w_dt" name="w_dt" value="<?php echo isset($rw) ? $rw['w_dt']:date('Y-m-d')?>"  required msg="등록일">
                              </div>
                            </td>
                          </tr>


                        </tbody>
                      </table>
                    </div>
                  
                    <div class="d-flex justify-content-end align-items-center mt-3 gap-2">
                      <a href="./history_list.php" class="btn btn-md btn-light w-md">취소</a>
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

  <script>
    let myEditor; // 전역 변수 선언
    let myEditorEng; // content_eng용 에디터
    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#content'), {
                extraPlugins: [MyCustomUploadAdapterPlugin], // 업로드 어댑터를 사용하는 경우
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        },
                    ]
                },
                htmlEmbed: {
                    showPreviews: true
                },
            })
            .then(newEditor => {
                myEditor = newEditor; // 에디터 객체 저장
                //console.log('Editor was initialized', newEditor);
            })
            .catch(error => {
                //console.error('There was a problem initializing the editor.', error);
            });
        ClassicEditor
          .create(document.querySelector('#content_eng'), {
              extraPlugins: [MyCustomUploadAdapterPlugin],
              htmlSupport: {
                  allow: [
                      {
                          name: /.*/,
                          attributes: true,
                          classes: true,
                          styles: true
                      },
                  ]
              },
              htmlEmbed: {
                  showPreviews: true
              },
          })
          .then(newEditor => {
              myEditorEng = newEditor;
          })
          .catch(error => {
              //console.error('There was a problem initializing the editor.', error);
          });
    });

    // 업로드 어댑터를 사용하는 경우
    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new UploadAdapter(loader);
        };
    }
</script>
</body>
</html>