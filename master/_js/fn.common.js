import { resetSelectedFiles, resetOldFiles } from '/master/_js/fn.attach.js';

export function fetchWrapper(url, method, body, isFormData = false) {
	const headers = {
		'X-CSRF-Token': document.getElementById('csrfToken').value
	};

	if (!isFormData) {
		headers['Content-Type'] = 'application/x-www-form-urlencoded';
	}

	return fetch(url, {
		method : method,
		headers: headers,
		body   : body
	})
	.then(response => response.json())
	.catch(error => {
		console.error('Error:', error);
		throw error;
	});
}


// MODIFY & DETAIL INFO 
export function getBoardRowInfo(bIdx, bbsCd, url) {
	if (!bIdx) {
		alert("항목을 선택하세요");
		return Promise.reject(new Error("항목을 선택하세요")); // Promise.reject를 반환
	}

	if (!url) {
		alert("SYSTEM_ERROR");
		return Promise.reject(new Error("SYSTEM_ERROR")); // Promise.reject를 반환
	}

	const userData = { bIdx };

	if (bbsCd) {
		userData['bbsCd'] = bbsCd;
	}

	return fetchWrapper(url, 'POST', new URLSearchParams(userData).toString());
}


export function setBoardRowDelete(bbs_cd, selectedIds, url, getListFunction) {

	const params = new URLSearchParams();
	
	const currentPage = parseInt(document.getElementById("t_page").value, 10);
	const listCnt     = parseInt(document.getElementById("select_view_cnt").value, 10);

	selectedIds.forEach((id) => {
		params.append('m_chk[]', id);
	});

	params.append('bbs_cd', bbs_cd);
	params.append('t_page', currentPage);
	params.append('listCnt', listCnt);


	fetchWrapper(url, 'POST', params.toString())
	.then(data => {
		alert(data.msg);
		if (data.st == true) {
			getListFunction(document.getElementById('t_page').value);
		} 
	});
}


// REGFORM RESET
export function resetForm(editors = []) {
	const formElement = document.getElementById("regForm");
	if (!formElement) {
			console.error('Form element with id "regForm" not found.');
			return;
	}

	formElement.reset();

	editors.forEach(editor => {
		if (editor) {
			clearEditorContent(editor);
		}
	});


	const inputs = document.querySelectorAll('.form-control');
	if (inputs) {
		inputs.forEach(input => {
			clearError(input); 
		});
	}

	resetSelectedFiles();  // selectedFiles 초기화
	resetOldFiles();  // oldFiles 초기화

	document.querySelectorAll('.select_file_list').forEach(element => {
			element.innerHTML = '';
	});

	document.querySelectorAll('.image_file_list').forEach(element => {
			element.innerHTML = '';
	});
}

