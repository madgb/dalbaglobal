import { globalSearchParams, resetGlobalSearchParams } from '/master/_js/fn.pagination.js';

export function searchEmployees(getBoardListFunction) {
	
	const srhFieldElement   = document.getElementById("srhField");
	const srhKeyElement     = document.getElementById("srhKey");
	const srhDtFieldElement = document.getElementById("srhDtField");
	const s_dateElement     = document.getElementById("s_date");
	const e_dateElement     = document.getElementById("e_date");

	if (srhFieldElement) {
		globalSearchParams.srhField = srhFieldElement.value;
	}
	if (srhKeyElement) {
		globalSearchParams.srhKey = srhKeyElement.value;
	}
	if (srhDtFieldElement) {
		globalSearchParams.srhDtField = srhDtFieldElement.value;
	}
	if (s_dateElement) {
		globalSearchParams.s_date = s_dateElement.value;
	}
	if (e_dateElement) {
		globalSearchParams.e_date = e_dateElement.value;
	}

	getBoardListFunction(1);
}



export function setupSearchEventListeners(getBoardListFunction) {
	// LIST COUNT
	const select_view_cnt = document.getElementById("select_view_cnt");
	if (select_view_cnt) {
		select_view_cnt.addEventListener("change", () => searchEmployees(getBoardListFunction));
	}

	// SEARCH
	const btnSearch = document.getElementById("btnSearch");
	if (btnSearch) {
		btnSearch.addEventListener("click", () => searchEmployees(getBoardListFunction));
	}

	// SEARCH RESET
	const btnReset = document.getElementById("btnReset");
	const srhFrm   = document.getElementById("srhFrm");
	if (btnReset && srhFrm) {
		btnReset.addEventListener("click", () => {
			srhFrm.reset();
			resetGlobalSearchParams();
			getBoardListFunction(1);
		});
	}
}
