<?php include $_SERVER["DOCUMENT_ROOT"]."/master/_inc/head.php"; ?>
<style>
  html, body {
    background-color: #fafafa !important;
  }
</style>
<body>
  <div class="auth-page-wrapper pt-5">
    <div class="auth-page-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center mt-sm-5 mb-4 text-white-50">
              <div>
                <a href="index.html" class="d-inline-block auth-logo">
                  <img src="" alt="" height="30">
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- end row -->
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">
                <div class="card-body p-4"> 
                  <div class="text-center mt-2">
                    <h5 class="text-primary">Login</h5>
                  </div>
                  <div class="p-2 mt-4">
                    
										<form name="loginForm" id="loginForm" class="login__form" method="post" action="login_action.php">
                      <div class="mb-3">
                        <label for="userId" class="form-label">아이디</label>
                        <input type="text" class="form-control" id="userId" name="userId" placeholder="아이디 입력" msg="아이디를 입력하세요">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="userPw">비밀번호</label>
                        <div class="position-relative auth-pass-inputgroup mb-3">
                            <input type="password" class="form-control pe-5 password-input" placeholder="비밀번호 입력" id="userPw" name="userPw" msg="비밀번호를 입력하세요">
                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        </div>
                      </div>
                      <div class="mt-4">
                        <button class="btn btn-success w-100" type="submit">로그인</button>
                      </div>
                    </form>
                  </div>
              </div>
              <!-- end card body -->
            </div>
            <!-- end card -->
          </div>
        </div>
        <!-- end row -->
      </div>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"]."/master/_inc/footer.php"; ?>
  </div>
  <script src="/master/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/master/assets/libs/simplebar/simplebar.min.js"></script>
  <script src="/master/assets/libs/node-waves/waves.min.js"></script>
  <script src="/master/assets/libs/feather-icons/feather.min.js"></script>
  <script src="/master/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
  <script src="/master/assets/js/plugins.js"></script>
  <script src="/master/assets/libs/particles.js/particles.js"></script>
  <script src="/master/assets/js/pages/particles.app.js"></script>
  <script src="/master/assets/js/pages/password-addon.init.js"></script>
	<script>


	</script>
</body>
</html>