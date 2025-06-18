
import { searchEmployees, setupSearchEventListeners } from '/master/_js/fn.searchUtils.js';
import { createPagination, globalSearchParams } from '/master/_js/fn.pagination.js';
import { handleFileSelect, readURL, selectedFiles, oldFiles } from '/master/_js/fn.attach.js';
import { getBoardRowInfo, setBoardRowDelete, resetForm, fetchWrapper } from '/master/_js/fn.common.js';

document.addEventListener('DOMContentLoaded', function () {

	const bbs_category = document.getElementById("bbs_category").value;
	const tPageElement = document.getElementById("t_page");
	
	// LIST
	window.getBoardList = function (t_page, searchParamsStr = '') {


		const searchParams = searchParamsStr ? Object.fromEntries(new URLSearchParams(searchParamsStr)) : globalSearchParams;
		searchParams.bbs_category = bbs_category;
		searchParams.page         = t_page;
		searchParams.listcnt      = document.getElementById("select_view_cnt").value;

		fetchWrapper('/master/_controller/getBoardList.php', 'POST', new URLSearchParams(searchParams).toString())
			.then(data => {
	
				if (data.st == true) {

					const list = data.list;
					const page = data.page;


					let strList = "";
		
					if (data.cnt > 0) {
						list.forEach(item => {

							switch (bbs_category) {

								case "ir":
								case "ann":
								case "news":
								case "bg_example":
								case "history":
						
									strList += `
									<tr data-bIdx="${item.bIdx}">
										<td>${item.no}</td>`;
									
									if (bbs_category == "ann") {
										strList += `<td>${item.wYmd}</td>`;
									} else if (bbs_category == "history") {
										strList += `<td>${item.wYear}</td>`;
										strList += `<td><a href='javascript:void(0);' class='recordDetail' data-bIdx="${item.bIdx}"> ${item.content}</a></td>`;
									} else {
										strList += `<td>${item.v_bbsCd}</td>`;
									}
								
									strList += `
										<td><a href='javascript:void(0);' class='recordDetail' data-bIdx="${item.bIdx}"> ${item.subject}</a></td>
										<td>${item.wDt}</td>
										<td>${item.mDt}</td>
									</tr>`;
								break;
								case "achi":
									strList += `
									<tr data-bIdx="${item.bIdx}">
										<td>${item.no}</td>
										<td>${item.wYear}</td>
										<td><a href='javascript:void(0);' class='recordDetail' data-bIdx="${item.bIdx}"> ${item.subject}</a></td>
									</tr>`;
								break;
							};
					
						});
					} else {

						const listCols = document.getElementById('listCols');
						let colCnt;
						if (listCols) {
							colCnt = listCols.querySelectorAll('col').length;
						}
						strList += `<tr><td colspan='${colCnt}' class='nodata'> 조회된 내역이 없습니다. </td></tr>`;
					}

					const pBlock = createPagination(page, 'getBoardList');

					document.getElementById("strList").innerHTML     = strList;
					document.getElementById("pageList").innerHTML    = pBlock;
					document.getElementById("recordCnt").textContent = numberFormat(data.cnt);

					tPageElement.value = t_page;


				} else {
					alert(data.msg);
				}
			})
			.catch(error => console.error('Error:', error));
	}

	
	// LOADING - REGISTRATION, MODIFY, SELECT RESIGN, SEARCH

	if (tPageElement) {
		const t_page = 1;
		tPageElement.value = t_page;
		getBoardList(t_page);

	}


	// REGISTRATION EVENT
	const btnSave = document.getElementById("btnSave");
	if (btnSave) {
		btnSave.addEventListener("click", setBoardReg);
	}


	// REGISTRATION FUN
	function setBoardReg(e) {

		e.preventDefault();

		const regForm = document.regForm;

		if (chkFrm(regForm)) {
			
			if (confirm("저장하시겠습니까?")) {


				let formData = new FormData();
				let formElements = regForm.elements;

				let bIdx        = document.getElementById("b_idx");
				let bbsCateValue = document.getElementById("bbs_category").value;			
				
				formData.append("bbsCd", document.getElementById("bbs_cd").value);

				for (let i = 0; i < formElements.length; i++) {
					if (formElements[i].name === "") continue;

					if (formElements[i].type === "radio" || formElements[i].type === "checkbox") {
						if (formElements[i].checked) {
							formData.append(formElements[i].name, formElements[i].value);
						}
					} else if (formElements[i].type !== "file") {
						formData.append(formElements[i].name, formElements[i].value);
					}
				}

				if (bbsCateValue == "ir" || bbsCateValue == "ann") {

					if (bIdx.value) {

						oldFiles.forEach(file => {
							formData.append('o_files[]', file.idx);
						});

						selectedFiles.forEach(function (file) {
							formData.append('f_files[]', file);
						});
					
					}

					else {
						selectedFiles.forEach(file => {
							formData.append('f_files[]', file);
						});
					}
				}
				if (typeof myEditor !== 'undefined' && myEditor) {
					const editorData = myEditor.getData();
					formData.append("content", editorData);
				}
				if (typeof myEditorEng !== 'undefined' && myEditorEng) {
					const editorDataEng = myEditorEng.getData();
					formData.append("content_eng", editorDataEng);
				}


				fetchWrapper('/master/_controller/setBoardReg.php', 'POST', formData, true)
				.then(data => {
					alert(data.msg);
			
					if (data.st == true) {
						location.href = data.url;
					}

					// boardRegister.hide();
					// fnCloseLoading();

				})
				.catch(error => console.error('Error:', error));
			}
		}
	}


	// MODIFY & DETAIL
	// const strList = document.getElementById('strList');
	// if (strList) {
	// 	strList.addEventListener('click', function (event) {
	// 		const target = event.target;
	// 		const trElement = target.closest('tr');
	// 		if (trElement) {
	// 			const bIdx = trElement.dataset.bidx;

	// 			if (target.classList.contains('recordDetail')) {
	// 				location.href = `/master/board/${bbs_category}_reg.php?bIdx=${bIdx}`;
	// 			}
	// 		}
	// 	});
	// }
	const strList = document.getElementById('strList');
	if (strList) {
		strList.addEventListener('click', function (event) {
			// 클릭된 요소에서 가장 가까운 <a> 태그를 찾음
			const linkElement = event.target.closest('a.recordDetail');
			if (linkElement) {
				const trElement = linkElement.closest('tr'); // <tr> 요소 찾기
				if (trElement) {
					const bIdx = trElement.dataset.bidx;

					// 원하는 동작 수행
					location.href = `/master/board/${bbs_category}_reg.php?bIdx=${bIdx}`;
				}
			}
		});
	}


	
	// DELETE
	const btnSelDelete = document.getElementById("btnDelete");
	if (btnSelDelete) {

		btnSelDelete.addEventListener("click", function (e) {
			e.preventDefault();

			if (confirm("삭제하시겠습니까?")) {
				if (confirm("삭제한 항목은 복구할 수 없습니다. \n그래도 삭제 하시겠습니까?")) {
					let bIdx = document.getElementById("b_idx").value;
					let bbs_category = document.getElementById("bbs_category").value;

					const form = document.createElement("form");
					form.method = "POST";
					form.action = "/master/_controller/setBoardDelete.php";

					const input = document.createElement("input");
					input.type = "hidden";
					input.name = "bIdx";
					input.value = bIdx;
					form.appendChild(input);

					const inputCategory = document.createElement("input");
					inputCategory.type = "hidden";
					inputCategory.name = "bbs_category";
					inputCategory.value = bbs_category;

					form.appendChild(inputCategory);					
					document.body.appendChild(form);
					form.submit();
				}
			}
		});
	}


	// SETUP SEARCH EVENT LISTENERS
	setupSearchEventListeners(getBoardList);


	
	// ATTACH
	let limitFileCnt = 10;
	const fileAttach = document.getElementById('fileAttach');
	if (fileAttach) {
		fileAttach.addEventListener('change', function () {
			handleFileSelect(this, false, limitFileCnt);
		});
	}

	const f_file = document.getElementById("f_file");
	if (f_file) {
		f_file.addEventListener("change", function(event) {
			readURL(event.target);
		});
	}	

	const b_idx = document.getElementById("b_idx");
	if (b_idx) {
		if (b_idx.value != "") {
			if (typeof oldFilesFromPHP !== 'undefined') {
				oldFiles.push(...oldFilesFromPHP);
			}
		}
	}

	
	// CKEDITOR OEMBED
	function convertOembedToIframe() {
		var oembeds = document.querySelectorAll('oembed[url]');
		oembeds.forEach(function(oembed) {
			var url = oembed.getAttribute('url');
			var iframe = document.createElement('iframe');
			iframe.width = "560";
			iframe.height = "315";
			iframe.src = url;
			iframe.frameBorder = "0";
			iframe.allowFullscreen = true;
			oembed.parentNode.replaceChild(iframe, oembed);
		});
	}

	// Achievement 기본설정
	const achiBasic = document.getElementById("baseEdit");
	if (achiBasic) {
		achiBasic.addEventListener("click", function (e) {
			e.preventDefault();

			if (confirm("수정하시겠습니까?")) {
				const form = document.getElementById("baseFrm");
				
				form.method = "POST";
				form.action = "/master/_controller/setAchiBasic.php";
				form.submit();
			}
		});
	} 

});

