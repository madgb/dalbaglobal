// ====== 검색영역 날짜 검색
function clickDate(type, event) {
	$(".date_btns button").removeClass("active");
	$(event).addClass("active");

	// 오늘
	let todayDate = new Date();
	let today = todayDate.toISOString().substring(0, 10);

	let changeDate;

	if (type == "all") {
		$("#s_date").val("");
		$("#e_date").val("");
	} else if (type == "month3") {
		changeDate = new Date(todayDate);
		changeDate.setMonth(todayDate.getMonth() - 3);
		$("#s_date").val(toStringByFormatting(changeDate));
		$("#e_date").val(today);
	} else if (type == "month6") {
		changeDate = new Date(todayDate);
		changeDate.setMonth(todayDate.getMonth() - 6);
		$("#s_date").val(toStringByFormatting(changeDate));
		$("#e_date").val(today);
	} else if (type == "year1") {
		changeDate = new Date(todayDate);
		changeDate.setMonth(todayDate.getMonth() - 12);
		$("#s_date").val(toStringByFormatting(changeDate));
		$("#e_date").val(today);
	} else if (type == "day7") {
		changeDate = new Date(todayDate);
		changeDate.setDate(todayDate.getDate() - 7);
		$("#s_date").val(toStringByFormatting(changeDate));
		$("#e_date").val(today);
	} else if (type == "month1") {
		changeDate = new Date(todayDate);
		changeDate.setMonth(todayDate.getMonth() - 1);
		$("#s_date").val(toStringByFormatting(changeDate));
		$("#e_date").val(today);
	} else if (type == "today") {
		$("#s_date").val(today);
		$("#e_date").val(today);
	}
}

function toStringByFormatting(source, delimiter = "-") {
	const year = source.getFullYear();
	const month = ("0" + (source.getMonth() + 1)).slice(-2);
	const day = ("0" + source.getDate()).slice(-2);

	return [year, month, day].join(delimiter);
}

// ====== 날짜 Format
function leftPad(value) {
	if (value >= 10) {
		return value;
	}

	return `0${value}`;
}

function toStringByFormatting(source, delimiter = "-") {
	const year = source.getFullYear();
	const month = leftPad(source.getMonth() + 1);
	const day = leftPad(source.getDate());

	return [year, month, day].join(delimiter);
}

// function openModal(id) {
// 	console.log(`open ${id}`);
// 	$("#" + id).addClass('open');
// 	$("body").addClass("fixed");
// 	const pageY = window.scrollY;
// 	$("body.fixed").css("position", "fixed");
// 	$("body.fixed").css("left", "0");
// 	$("body.fixed").css("top", `${(-(pageY))}px`);
//   }
  
//   function closeModal(id) {
// 	$("#" + id).removeClass('open')
// 	const top = $("body").css("top").replace("px", "");
// 	const topNum = (Number(-top));
  
// 	$("body.fixed").css("top", `0px`);
// 	$("body.fixed").css("position", "static");
// 	$(window).scrollTop(topNum);
// 	$("body").removeClass("fixed");
//   }
  
//   function closeAllModal() {
// 	$(".modal").removeClass('open')
// 	const top = $("body").css("top").replace("px", "");
// 	const topNum = (Number(-top));
  
// 	$("body.fixed").css("top", `0px`);
// 	$("body.fixed").css("position", "static");
// 	$(window).scrollTop(topNum);
// 	$("body").removeClass("fixed");
//   }
  
//   $(document).keydown(function (event) {
// 	if (event.keyCode == 27 || event.which == 27) {
// 	  $(".modal").removeClass('open')
  
// 	  const top = $("body").css("top").replace("px", "");
// 	  const topNum = (Number(-top));
  
// 	  $("body.fixed").css("top", `0px`);
// 	  $("body.fixed").css("position", "static");
// 	  $(window).scrollTop(topNum);
// 	  $("body").removeClass("fixed");
// 	}
//   });


// NUMBER_FORMAT
function numberFormat(input, decimals = 0, decPoint = '.', thousandsSep = ',') {
  let number = parseFloat(input);
  
  if (isNaN(number)) {
    console.error('Invalid number input');
  }
  
  decimals = isNaN(decimals) ? 0 : Math.min(Math.max(parseInt(decimals, 10), 0), 20); // 0~20 범위 제한

  const fixedNumber = number.toFixed(decimals);
  let [integerPart, decimalPart] = fixedNumber.split('.');
  integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, thousandsSep);
  return decimalPart ? integerPart + decPoint + decimalPart : integerPart;
}