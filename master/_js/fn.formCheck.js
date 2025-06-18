function showError(inputElement, message, isFront, color = 'red') {

	let error;

	if (isFront) {
		error = inputElement.closest('.fdCheck').querySelector('.error');
			
		if (!error) {
			error = document.createElement('p');
			error.className = 'error-message error';
			inputElement.closest('.fdCheck').appendChild(error);
		}
		
	} else {

		error = inputElement.parentNode.querySelector('.error-message');
		if (!error) {
			error = document.createElement('div');
			error.className = 'error-message error';
			inputElement.parentNode.appendChild(error);
		}
	}


	error.innerText = message;
	error.style.color = color;
					
	inputElement.classList.add('invalid');
	inputElement.focus();
	inputElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
}

function clearErrorFront(inputElement) {
	const error = inputElement.closest('.fdCheck').querySelector('.error');
	// console.log('error: ', error);
	if (error) {
		inputElement.classList.remove('invalid');
		error.remove();
	}
}


function clearError(inputElement) {
	const error = inputElement.parentNode.querySelector('.error-message');
	if (error) {
		inputElement.classList.remove('invalid');
		error.remove();
	}
}


function resetFormsAndErrors(forms) {
	forms.forEach(function (form) {
		form.reset(); // 폼 필드 초기화
		const inputElements = form.querySelectorAll('input');
		inputElements.forEach(function (inputElement) {
			inputElement.classList.remove('invalid'); // 에러 클래스 제거
			clearError(inputElement); // 에러 메시지 제거
		});
		clearFormErrors(form); // 폼의 에러 메시지 전체 삭제
	});
}


function clearFormErrors(form) {
	const errorMessages = form.querySelectorAll('.error-message');
	errorMessages.forEach(function (error) {
		error.remove();
	});
}

function clearAllerror() {
	const errorMessages = document.querySelectorAll('.error-message');
	errorMessages.forEach(function (error) {
		error.remove();
	});
}


function chkFrm(frm_name, isFront = false) {

	let el = frm_name;

	for (let i = 0; i < el.elements.length; i++) {

		let ele = el.elements[i];
		
		if (ele.disabled) continue;

		if (ele.required && ele.type === "radio") {
			let chked = false;
			let elname = ele.name;
			for (let j = 0; j < el.elements[elname].length; j++) {
				if (el.elements[elname][j].type === "radio" && el.elements[elname][j].checked) {
					chked = true;
				}
			}
			if (!chked) {
				showError(ele, ele.getAttribute("msg") + " 를 선택하세요.", isFront);

				return false;
			}
		}

	
		if (ele.required && ele.type === "checkbox") {

			let checkbox_name = ele.name;
			let checked = false;


			for (let j = 0; j < el.elements.length; j++) {
				let ele2 = el.elements[j];
				if (ele2.type === "checkbox" && ele2.name === checkbox_name && ele2.checked) {
					checked = true;
				}
			}

			// console.log('ele: ', ele);
			if (!checked) {
				showError(ele, ele.getAttribute("msg") + " 을(를) 선택하세요.", isFront);
				return false;
			}
		}

	
		if (ele.required && ele.type.indexOf("select") > -1) {
			if (ele.options[ele.selectedIndex].value === "") {
				showError(ele, ele.getAttribute("msg") + " 중 하나를 선택하세요.", isFront);
				return false;
			}
		}

	
		if (ele.required && ele.value === "") {
			showError(ele, ele.getAttribute("msg") + " 을(를) 입력하세요.", isFront);
			ele.focus();
			return false;
		}


		let is_match = ele.getAttribute("is_match");
		if (is_match != null && is_match === "yes") {
			let isReadOnly = ele.getAttribute("readonly");
			if (isReadOnly === null) {
				showError(ele, ele.getAttribute("msg") + " 중복확인이 필요합니다.", isFront);
				ele.focus();
				return false;
			}
		}

	
		let byte_allowed = ele.getAttribute("byte_allowed");
		if (byte_allowed != null && byte_allowed !== "") {
			if (String(ele.value).length > byte_allowed) {
				showError(ele, ele.getAttribute("msg") + " 의 값이 정해진 길이(" + byte_allowed + "byte)보다 깁니다.", isFront);
				ele.focus();
				return false;
			}
		}


		let maxLengthAllowed = ele.getAttribute("maxChar_allowed"); // 허용된 최대/최소 길이
		if (maxLengthAllowed != null && maxLengthAllowed !== "") {
			let currentValueLength = String(ele.value).length;
			if (currentValueLength < maxLengthAllowed) {
				showError(ele, ele.getAttribute("msg") + " 의 값이 정해진 최소 길이(" + maxLengthAllowed + "자)보다 짧습니다.", isFront);
				ele.focus();
				return false;
			}
		}



		let char_allowed = ele.getAttribute("char_allowed");
		if (char_allowed != null && char_allowed !== "") {
			char_allowed = parseInt(char_allowed, 10); // 숫자로 변환
			if (String(ele.value).length > char_allowed) {
				showError(ele, ele.getAttribute("msg") + "의 값이 정해진 길이(" + char_allowed + "자)보다 깁니다.", isFront);
				ele.focus();
				return false;
			}
		}
		
	
		let is_digit = ele.getAttribute("is_digit");
		if (is_digit != null && is_digit === "yes") {
			if (ele.value === '') {
				continue;
			}
			if (isNaN(ele.value)) {
				showError(ele, ele.getAttribute("msg") + "는(의) 값은 숫자여야 합니다.", isFront);
				ele.focus();
				return false;
			}
		}

	
		let is_notkr = ele.getAttribute("is_notkr");
		if (is_notkr != null && is_notkr === "yes") {
			if (ele.value === '') {
				continue;
			}
			if (/[ㄱ-ㅎ|ㅏ-ㅣ|가-힝]/.test(ele.value)) {
				showError(ele, ele.getAttribute("msg") + " 에는 한글이 들어가면 안됩니다.", isFront);
				ele.focus();
				return false;
			}
		}

	
		let is_noteng = ele.getAttribute("is_noteng");
		if (is_noteng != null && is_noteng === "yes") {
			if (ele.value === '') {
				continue;
			}
			if (/[a-zA-Z]/.test(ele.value)) {
				showError(ele, ele.getAttribute("msg") + " 에는 영어가 들어가면 안됩니다.", isFront);
				ele.focus();
				return false;
			}
		}

	
		let is_engnum = ele.getAttribute("is_engnum");
		if (is_engnum != null && is_engnum === "yes") {
			if (ele.value === '') {
				continue;
			}
			if (/[ㄱ-ㅎ|ㅏ-ㅣ|가-힝]/.test(ele.value)) {
				showError(ele, ele.getAttribute("msg") + " 에는 한글이 들어가면 안됩니다.", isFront);
				ele.focus();
				return false;
			}
		}

	
		let is_num = ele.getAttribute("is_num");
		if (is_num != null && is_num === "yes") {
			if (ele.value === '') {
				continue;
			}
			if (!/^\d+$/.test(ele.value)) {
				showError(ele, ele.getAttribute("msg") + " 의 값은 숫자여야 합니다.", isFront);
				ele.value = "";
				ele.focus();
				return false;
			}
		}

	
		let is_limitnum = ele.getAttribute("is_limitnum"); 

		if (is_limitnum && is_limitnum !== null) {
				
			if (ele.value === '') {
				continue;
			} 
	
			if (isNaN(ele.value)) {
				showError(ele, ele.getAttribute("msg") + "는(의) 값은 숫자여야 합니다.", isFront);
				ele.focus();
				return false;
			}
			
			if (parseFloat(ele.value) < parseFloat(is_limitnum)) {
				showError(ele, ele.getAttribute("msg") + `는(의) 값은 ${is_limitnum} 이상이어야 합니다.`, isFront);
				ele.focus();
				return false;
			}
		}
		

		let is_email = ele.getAttribute("is_email");
		if (ele.value !== '' && is_email === "yes") {
			if (!strCheck(ele.value, "email")) {
				showError(ele, "입력하신 전자우편 주소가 올바르지 않습니다.", isFront);
				ele.value = "";
				ele.focus();
				return false;
			}
		}


		let is_cell = ele.getAttribute("is_cell");
		if (ele.value !== '' && is_cell === "yes") {
			if (!strCheck(ele.value, "cell")) {
				showError(ele, "입력하신 휴대전화가 올바르지 않습니다.", isFront);
				ele.value = "";
				ele.focus();
				return false;
			}
		}

		let is_id = ele.getAttribute("is_id");
		if (ele.value !== '' && is_id === "yes") {
			if (!strCheck(ele.value, "id")) {
				showError(ele, "6자~20자, 영문소문자, 숫자 형태로 입력해주세요", isFront);
				ele.value = "";
				ele.focus();
				return false;
			}
		}

		let is_name = ele.getAttribute("is_name");
		if (ele.value !== '' && is_name === "yes") {
			if (!strCheck(ele.value, "name")) {
				showError(ele, "2자이상 문자 형태로 입력해주세요", isFront);
				ele.value = "";
				ele.focus();
				return false;
			}
		}

	
		let is_tint = ele.getAttribute("is_tint");
		if (is_tint === "yes") {
			if (ele.value < 0 || ele.value > 255) {
				showError(ele, ele.getAttribute("msg") + "의 범위를 다시 입력하세요.(0 ~ 255)", isFront);
				ele.focus();
				return false;
			}
		}


		let is_positive = ele.getAttribute("is_positive");
		if (is_positive === "yes") {
			if (ele.value < 0) {
				showError(ele, ele.getAttribute("msg") + "는 0보다 큰 양수로 다시 입력하세요.", isFront);
				ele.focus();
				return false;
			}
		}

	
		let is_cutstr10 = ele.getAttribute("is_cutstr10");
		if (is_cutstr10 === "yes") {
			if (ele.value.length > 10) {
				funcCountTextLen();
				return false;
			}
		}



	}
	return true;
}

