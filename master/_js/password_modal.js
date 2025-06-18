function openModal(id) {
  console.log(id);
  const modal = document.getElementById(id);
  modal.classList.add("open");
  // document.body.style.position = "fixed"; // 화면 고정

  $("body").addClass("fixed");
  $("body.fixed").css("left", "0");
  // $("body.fixed").css("top", `${-pageY}px`);
  document.body.style.top = `-${window.scrollY}px`; // 스크롤 고정
}

// // 모달 닫기
// function closeModal(id) {
//   const modal = document.getElementById(id);
//   modal.classList.remove('open');
//   document.body.style.position = '';  // 화면 원래대로
//   document.body.style.top = '';  // 스크롤 원래대로
// }

// 비밀번호 변경 제출
// function submitPasswordChange() {
//   const newPassword = document.getElementById('new-password').value;
//   const confirmPassword = document.getElementById('confirm-password').value;

//   let isValid = true;

//   // 유효성 검사
//   if (newPassword.length < 8) {
//     document.getElementById('error-new-password').style.display = 'block';
//     isValid = false;
//   } else {
//     document.getElementById('error-new-password').style.display = 'none';
//   }

//   if (newPassword !== confirmPassword) {
//     document.getElementById('error-confirm-password').style.display = 'block';
//     isValid = false;
//   } else {
//     document.getElementById('error-confirm-password').style.display = 'none';
//   }

//   if (isValid) {
//     // 비밀번호 변경 로직 처리
//     console.log('비밀번호 변경 완료!');
//     closeModal('modal-password');
//   }
// }
function closeModal(id) {
  $("#" + id).removeClass("open");
  $("body").removeClass("fixed");
}

$(".form_password").submit(function (e) {
  e.preventDefault(); // 폼 기본 제출 방지

  // 폼 데이터 전송
  $.ajax({
    url: "/master/member/member_edit_action.php",
    type: "POST",
    data: $(this).serialize(), // 폼 데이터 전송
    success: function (response) {
      alert(response.message);
      if (response.status === "success") {
        closeModal("modal-password"); 
      }
    },
    error: function (xhr, status, error) {
      console.log("AJAX 오류:", xhr.responseText); 
      alert("오류가 발생했습니다.");
    },
  });
});



