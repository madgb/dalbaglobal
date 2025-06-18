// 전역 변수 검색 조건을 관리
export let globalSearchParams = {};


// 전역 변수 초기화 함수
export function resetGlobalSearchParams() {
	for (let key in globalSearchParams) {
			if (globalSearchParams.hasOwnProperty(key)) {
					delete globalSearchParams[key];
			}
	}
}


// 페이지네이션
export function createPagination(page, navigateFunc) {
  let pBlock = "";

  const searchParamsStr = new URLSearchParams(globalSearchParams).toString();

  if (page.total > page.size) {
    if (page.block > 0) {
      let prev_block = (page.block - 1) * page.scale + 1;
      pBlock += `<a class="page-item pagination-prev" href="javascript:void(0);" onclick="${navigateFunc}(${prev_block}, '${searchParamsStr}')"> < </a>`;
    } else {
      pBlock += `<a class="page-item pagination-prev disabled" href="javascript:void(0);"> < </a>`;
    }

    pBlock += `<ul class="pagination listjs-pagination mb-0">`;

    let start_page = page.block * page.scale + 1;
    for (let i = 1; i <= page.scale && start_page <= page.page_max; i++, start_page++) {
      if (start_page == page.page) {
        pBlock += `<li class="active"><a class="page" href="javascript:void(0);">${start_page}</a></li>`;
      } else {
        pBlock += `<li><a class="page" href="javascript:void(0);" onclick="${navigateFunc}(${start_page}, '${searchParamsStr}')">${start_page}</a></li>`;
      }
    }

    if (page.page_max > (page.block + 1) * page.scale) {
      let next_block = (page.block + 1) * page.scale + 1;
      pBlock += `<a class="page-item pagination-next" href="javascript:void(0);" onclick="${navigateFunc}(${next_block}, '${searchParamsStr}')"> > </a>`;
    } else {
      pBlock += `<a class="page-item pagination-next disabled" href="javascript:void(0);"> > </a>`;
    }
  } else {
    pBlock = `<ul class="pagination listjs-pagination mb-0"><li class="active"><a class="page" href="javascript:void(0);">${page.page}</a></li></ul>`;
  }

  return pBlock;
}
