<!DOCTYPE html>
<html lang="ko" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
  data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
  <meta charset="utf-8" />
  <title>달바 관리자</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="/master/assets/images/favicon.ico">

  <!-- jQuery CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

  <!-- jsvectormap css -->
  <link href="/master/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

  <!--Swiper slider css-->
  <link href="/master/assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

  <!-- Layout config Js -->
  <script src="/master/assets/js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="/master/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="/master/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="/master/assets/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="/master/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/master/assets/css/admin.css">
  <link rel="stylesheet" href="/master/css/modal.css" />


  <script src="/master/_js/password_modal.js" defer></script>
  <script src="/master/_js/common.js" defer></script>
  <!-- <script src="/master/_js/password_modal.js"></script> -->
   <script>
    function openModal(id) {
      console.log(id);
      const modal = document.getElementById(id);
      modal.classList.add('open');
      document.body.style.position = 'fixed';  // 화면 고정
      document.body.style.top = `-${window.scrollY}px`;  // 스크롤 고정
    }
   </script>
</head>