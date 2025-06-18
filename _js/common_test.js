$(function () {
  /* Nice Select */
  $(".nice-select").niceSelect();

  /* Datepicker */
  $(".datepicker").datepicker({
    dateFormat: "yy-mm-dd",
    dayNamesMin: ["일", "월", "화", "수", "목", "금", "토"],
    monthNames: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
    monthNamesShort: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
  });
});

// 반응형 resize
$(window).on("resize", function () {
  let width = $(window).width();
});

// ====== Modal 공통
function openModal(id) {
  $("#" + id).addClass("open");
  $("body").addClass("fixed");
  const pageY = window.scrollY;
  $("body.fixed").css("position", "fixed");
  $("body.fixed").css("left", "0");
  $("body.fixed").css("top", `${-pageY}px`);
}

function closeModal(id) {
  $("#" + id).removeClass("open");
  const top = $("body").css("top").replace("px", "");
  const topNum = Number(-top);

  $("body.fixed").css("top", `0px`);
  $("body.fixed").css("position", "static");
  $(window).scrollTop(topNum);
  $("body").removeClass("fixed");
}

function closeAllModal() {
  $(".modal").removeClass("open");
  const top = $("body").css("top").replace("px", "");
  const topNum = Number(-top);

  $("body.fixed").css("top", `0px`);
  $("body.fixed").css("position", "static");
  $(window).scrollTop(topNum);
  $("body").removeClass("fixed");
}

$(document).keydown(function (event) {
  if (event.keyCode == 27 || event.which == 27) {
    $(".modal").removeClass("open");

    const top = $("body").css("top").replace("px", "");
    const topNum = Number(-top);

    $("body.fixed").css("top", `0px`);
    $("body.fixed").css("position", "static");
    $(window).scrollTop(topNum);
    $("body").removeClass("fixed");
  }
});

// $(document).ready(function () {
//   $(".ham_btn").click(function () {
//     if ($(this).hasClass("active")) {
//       // 메뉴 닫기
//       $(this).removeClass("active");
//       $(".pc_sidebar").removeClass("open");

//       const top = $("body").css("top").replace("px", "");
//       const topNum = Number(-top);

//       $(window).scrollTop(topNum);
//       $("body").removeClass("fixed");
//     } else {
//       $("body").addClass("fixed");
//       const pageY = window.scrollY;
//       $("body.fixed").css("top", `${-pageY}px`);
//     }
//     $(this).addClass("active");
//     $(".pc_sidebar").addClass("open");
//   });

//   // x_btn 클릭 시 사이드바 닫기
//   $(".pc_sidebar .x_btn").click(function () {
//     $(".pc_sidebar").removeClass("open");
//     $(".ham_btn").removeClass("active");

//     const top = parseInt($("body").css("top"), 10) || 0;
//     $("body").removeClass("fixed").css({
//       position: "static",
//       top: "auto",
//     });

//     $(window).scrollTop(-top); // 기존 스크롤 위치 복원
//   });
// });

// 세부메뉴
$(document).ready(function () {
  $(" .btn-lnb").removeClass("active");
  $(".lnb__list").hide();

  $(document).on("click", ".btn-lnb", function () {
    if (!$(this).hasClass("active")) {
      $(".btn-lnb").removeClass("active");
      $(".lnb__list").slideUp(300);
      $(this).addClass("active");
      $(this).next(".lnb__list").slideDown(300);
    } else {
      $(this).removeClass("active");
      $(this).next(".lnb__list").slideUp(300);
    }
  });
});
//언어
$(document).ready(function () {
  $(".global_ul").hide();

  $(".global_btn").click(function (e) {
    e.stopPropagation();
    $(".global_ul").toggle();
  });

  $(document).click(function (e) {
    if (!$(e.target).closest(".global").length) {
      $(".global_ul").hide();
    }
  });
});
// 페이지가 완전히 로드된 후 실행
window.onload = function () {
  $("html, body").animate({ scrollTop: 0 }, 0);

  // Swiper 첫 번째 슬라이드로 이동
  if (typeof swiper !== "undefined" && swiper.slideTo) {
    swiper.slideTo(0);
  }
};
// top button
$(".btn_gotop").click(function () {
  $("html, body").animate({ scrollTop: 0 }, 400);
  if (swiper && swiper.slideTo) {
    swiper.slideTo(0);
  }
  return false;
});

// 클릭 이동
// $(document).ready(function () {
//   $(".sidebar_ul li a").on("click", function (event) {
//     event.preventDefault(); // 기본 이동 방지

//     let target = $(this).attr("href"); // 클릭한 요소의 href 값 가져오기
//     let offsetTop = $(target).offset().top; // 해당 섹션의 위치

//     $("html, body").animate({ scrollTop: offsetTop }, 600); // 부드러운 스크롤

//     $(".lnb__list").slideUp(); // 네비게이션 닫기 (선택 사항)
//   });
// });
// JavaScript
// var swiper = new Swiper(".swiper-container", {
//   speed: 500,
//   direction: "vertical",
//   touchRatio: 1, // 터치 반응 비율
//   simulateTouch: true,
//   threshold: 10,
//   touchReleaseOnEdges: true,
//   mousewheel: {
//     forceToAxis: true,
//     releaseOnEdges: true,
//   },
//   pagination: {
//     el: ".swiper-pagination",
//     clickable: true,
//   },
//   slidesPerView: 1,
//   observer: true, // 변경 감지
//   observeParents: true, // 부모 요소 변경도 감지
//   on: {
//     reachEnd: function () {
//       // allowPageScroll = false; // 마지막 슬라이드에서 바로 스크롤되지 않도록 차단
//       swiper.mousewheel.enable();
//     },
//     reachBeginning: function () {
//       swiper.mousewheel.disable();
//     },
//     slideChange: function () {
//       allowPageScroll = false;
//       swiper.mousewheel.enable();
//     },
//   },
// });
var swiper = new Swiper(".swiper-container", {
  speed: 500,
  direction: "vertical",
  // touchRatio: 1, // 터치 반응 비율
  // simulateTouch: true,
  // threshold: 10,
  // touchReleaseOnEdges: true,
  mousewheel: {
    forceToAxis: true,
    // releaseOnEdges: true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  slidesPerView: 1,
  // observer: true, // 변경 감지
  // observeParents: true, // 부모 요소 변경도 감지
  on: {
    reachEnd: function () {
      allowPageScroll = false; // 마지막 슬라이드에서 바로 스크롤되지 않도록 차단
      swiper.mousewheel.enable();
    },
    reachBeginning: function () {
      swiper.mousewheel.disable();
    },
    slideChange: function () {
      allowPageScroll = false;
      swiper.mousewheel.enable();
    },
  },
});
// let startY = 0;
// let isLastSlide = false;

// swiper.on("slideChange", () => {
//   isLastSlide = swiper.isEnd;
// });

// swiper.el.addEventListener("touchstart", (e) => {
//   startY = e.touches[0].clientY;
// });

// swiper.el.addEventListener("touchmove", (e) => {
//   if (!isLastSlide) return;

//   const currentY = e.touches[0].clientY;
//   const diff = startY - currentY;

//   if (diff < -30) {
//     // 아래로 스와이프
//     window.scrollTo({
//       top: window.scrollY + 100, // 자연스럽게 아래로 이동
//       behavior: "smooth",
//     });
//   }
// });

let allowPageScroll = false;
let lastScrollTime = 0; // 스크롤 이벤트 타이머

window.addEventListener("wheel", function (event) {
  const now = Date.now();
  if (now - lastScrollTime < 500) return; // 0.5초 내에 연속 스크롤 차단
  lastScrollTime = now;

  if (window.scrollY === 0) {
    if (event.deltaY < 0) {
      swiper.mousewheel.enable();
    } else if (event.deltaY > 0) {
      if (swiper.isEnd) {
        if (!allowPageScroll) {
          event.preventDefault();
          allowPageScroll = true;
        } else {
          swiper.mousewheel.disable();
        }
      }
    }
  } else {
    swiper.mousewheel.disable();
  }
});

//햄버거버튼pc
$(document).ready(function () {
  // 사이드바 항목 클릭 시 페이지 이동 (부드러운 스크롤)
  $(".sidebar_ul li a").on("click", function (event) {
    event.preventDefault(); // 기본 이동 방지

    // let target = $(this).attr("href"); // 클릭한 요소의 href 값 가져오기
    // let offsetTop = $(target).offset().top; // 해당 섹션의 위치

    // // 부드러운 스크롤 이동
    // $("html, body").animate({ scrollTop: offsetTop }, 500);
    // $(".lnb__list").slideUp(); // 네비게이션 닫기 (선택 사항)
    let target = $(this).attr("href");

    if (target === "#IR_Material" || target === "#Announcements" || target === "#Newsroom") {
      $(".swiper-container").addClass("fixed");

      let offsetTop = $(target).offset().top;

      $("html, body").animate({ scrollTop: offsetTop }, 500);
    } else {
      $(".swiper-container").removeClass("fixed");
      // Swiper 슬라이드로 이동
      let slideIndex = -1;
      switch (target) {
        case "#home":
          slideIndex = 0;
          $("html, body").animate({ scrollTop: 0 }, 0, function () {
            if (swiper && swiper.slideTo) {
              swiper.slideTo(0); // 애니메이션이 끝난 후 스와이퍼 슬라이드 이동
            }
          });
          break;
        case "#mission":
          slideIndex = 1;
          $("html, body").animate({ scrollTop: 0 }, 0, function () {
            if (swiper && swiper.slideTo) {
              swiper.slideTo(1); // 애니메이션이 끝난 후 스와이퍼 슬라이드 이동
            }
          });
          break;
        case "#history":
          slideIndex = 2;
          $("html, body").animate({ scrollTop: 0 }, 0, function () {
            if (swiper && swiper.slideTo) {
              swiper.slideTo(2); // 애니메이션이 끝난 후 스와이퍼 슬라이드 이동
            }
          });
          break;
        case "#career":
          slideIndex = 3;
          $("html, body").animate({ scrollTop: 0 }, 0, function () {
            if (swiper && swiper.slideTo) {
              swiper.slideTo(3); // 애니메이션이 끝난 후 스와이퍼 슬라이드 이동
            }
          });
          break;
        default:
          break;
      }
      // const swiper = $(".swiper-container")[0].swiper; // Swiper 인스턴스 가져오기
      // if (swiper) {
      //   swiper.slideTo(slideIndex); // 해당 인덱스의 슬라이드로 이동
      // }
    }

    $(".pc_sidebar").removeClass("open");
    $(".ham_btn").removeClass("active");
  });

  // 햄버거 버튼 클릭 시 사이드바 열기/닫기
  $(".ham_btn").click(function () {
    if ($(this).hasClass("active")) {
      // 메뉴 닫기
      $(this).removeClass("active");
      $(".pc_sidebar").removeClass("open");

      $("body").removeClass("fixed");
    } else {
      // 사이드바 열기
      $("body").addClass("fixed");
      const pageY = window.scrollY; // 현재 스크롤 위치 기록
      $("body.fixed").css("top", `${-pageY}px`); // top 속성에 기록된 위치 설정
    }
    $(this).addClass("active");
    $(".pc_sidebar").addClass("open");
  });

  // x_btn 클릭 시 사이드바 닫기
  $(".pc_sidebar .x_btn").click(function () {
    // 사이드바 닫기
    $(".pc_sidebar").removeClass("open");
    $(".ham_btn").removeClass("active");

    $("body").removeClass("fixed").css({
      position: "static",
      top: "auto",
    });
  });
});

// history
$(document).ready(function () {
  // 버튼 클릭 시 동작
  $(".year .one").click(function () {
    let year = $(this).siblings("h4").text().trim(); // h4의 텍스트 가져오기

    // 모든 연도의 on 클래스 제거 후 클릭한 연도에 추가
    $(".year").removeClass("on");
    $(this).closest(".year").addClass("on");

    // 해당 연도의 detail만 표시
    $(".detail").stop(true, true).hide();
    $(".detail." + year)
      .stop(true, true)
      .fadeIn(300);
  });

  // 초기 상태: .on이 있는 연도의 데이터만 표시
  let initialYear = $(".year.on h4").text().trim();
  $(".detail").hide();
  $(".detail." + initialYear).fadeIn(300);

  // 버튼에 호버할 때 연도 변경 (페이드 업 효과 추가)
  $(".year .one").hover(
    function () {
      let year = $(this).siblings("h4").text().trim(); // h4의 텍스트 가져오기

      $(".year").removeClass("on"); // 모든 연도에서 on 클래스 제거
      $(this).closest(".year").addClass("on"); // 현재 호버한 연도에 on 클래스 추가
      $(".detail").stop(true, true).hide(); // 모든 detail 숨기기
      $(".detail." + year)
        .stop(true, true)
        .fadeIn(700); // 해당 연도의 detail만 보이게 하기
    },
    function () {
      // 마우스가 벗어나면 클릭된 연도의 detail만 표시하고 on 클래스 유지
      let activeYear = $(".year.on h4").text().trim();
      $(".detail").hide();
      $(".detail." + activeYear).show();
    }
  );
});

// history mobile
$(function () {
  $(".tabcontent > div").hide();
  $(".year_btn a")
    .click(function () {
      $(".tabcontent > div").hide().filter(this.hash).fadeIn();
      $(".year_btn a").removeClass("active");
      $(this).addClass("active");
      return false;
    })
    .filter(":eq(0)")
    .click();
});

// ir, Announcements + 버튼
// $(document).ready(function () {
//   $(".plus").on("click", function () {
//     let $li = $(this).closest("li");
//     let $content = $li.find(".content");
//     let $file = $li.find(".file");

//     let isActive = $content.hasClass("active");

//     $(".content, .file").removeClass("active");

//     if (!isActive) {
//       $content.addClass("active");
//       $file.addClass("active");
//     }
//   });
// });

$(document).ready(function () {
  $(document).on("click", ".plus", function () {
    let $li = $(this).closest("li");
    let $content = $li.find(".content");
    let $file = $li.find(".file");

    let isActive = $content.hasClass("active");

    $(".content, .file").removeClass("active"); // 다른 요소 닫기

    if (!isActive) {
      $content.addClass("active");
      $file.addClass("active");
    }
  });
});

$(document).ready(function () {
  setTimeout(function () {
    $(".slide01 .text").addClass("active"); // 4초 후에 active 클래스 추가
  }, 2000);
});
