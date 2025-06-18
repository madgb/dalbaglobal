document.addEventListener("DOMContentLoaded", function() {

    function reloadBoardData(sectionSelector, containerSelector, url, extraParams = "") {
        const container = document.querySelector(containerSelector);
        const loadMoreButton = document.querySelector(`${sectionSelector} .btn`);

        if (!container || !loadMoreButton) return;

        let fullUrl = `${url}?&offset=0${extraParams}`;

        fetch(fullUrl)
            .then(response => response.text())
            .then(data => {
                // container.innerHTML = data;  // 기존 데이터 삭제 후 새 데이터 로드
                // loadMoreButton.setAttribute("data-offset", 5);
                // loadMoreButton.style.display = "block";
                if (data.trim()) {
                    container.innerHTML = data;
                    loadMoreButton.setAttribute("data-offset", 5);
                    loadMoreButton.style.removeProperty("display"); // 데이터가 있으면 버튼 보이기
                } else {
                    container.innerHTML = ""; // 데이터가 없으면 리스트 초기화
                    loadMoreButton.style.display = "none"; // 버튼 숨기기
                }
            })
            .catch(error => console.error("Error reloading data:", error));
    }

    // IR Material - 탭 변경 이벤트
    document.querySelectorAll(".IR_Material .radio-btns input").forEach(radio => {
        radio.addEventListener("change", function() {
            let selectedTab = this.id;
            let bbsCd = selectedTab === "All" ? "ir%" : `ir_${selectedTab.toLowerCase()}`;
            reloadBoardData(".IR_Material", ".IR_Material .ir_ul", "load_board_data.php", `&bbs_cd=${bbsCd}`);
        });
    });

    // Announcements - 연도 선택 이벤트
    document.querySelector(".Announcements .select_box select").addEventListener("change", function() {
        let selectedYear = this.value;
        reloadBoardData(".Announcements", ".Announcements .ir_ul", "load_board_data.php", `&bbs_cd=announcements&w_year=${selectedYear}`);
    });

    // Newsroom - 탭 변경 이벤트
    document.querySelectorAll(".Newsroom .radio-btns input").forEach(radio => {
        radio.addEventListener("change", function() {
            let selectedTab = this.id;
            let bbsCd = selectedTab === "news_all" ? "news%" : `news_${selectedTab.toLowerCase()}`;
            reloadBoardData(".Newsroom", ".Newsroom .news_ul", "load_board_data.php", `&bbs_cd=${bbsCd}`);
        });
    });
    
    function loadMoreData(buttonSelector, containerSelector, url) {
        const loadMoreButton = document.querySelector(buttonSelector);
        
        if (!loadMoreButton) return; // 버튼이 없으면 실행 중지

        loadMoreButton.addEventListener("click", function() {
            let offset = parseInt(loadMoreButton.getAttribute("data-offset")) || 0;
            let limit = 5;
            let total = parseInt(loadMoreButton.getAttribute("data-total")) || 0; // 전체 개수

            fetch(`${url}&offset=${offset}`)
                .then(response => response.text())
                .then(data => {
                    const container = document.querySelector(containerSelector);
                    
                    if (data.trim()) {
                        container.innerHTML += data;
                        offset += limit;
                        loadMoreButton.setAttribute("data-offset", offset);

                        if (offset >= total) {
                            loadMoreButton.style.display = "none";
                        }
                    } else {
                        loadMoreButton.style.display = "none";
                    }
                })
                .catch(error => console.error("Error loading data:", error));
        });
    }
    
    loadMoreData(".IR_Material .btn", ".IR_Material .ir_ul", "load_board_data.php?bbs_cd=ir%");
    loadMoreData(".Announcements .btn", ".Announcements .ir_ul", "load_board_data.php?bbs_cd=announcements");
    loadMoreData(".Newsroom .btn", ".Newsroom .ir_ul", "load_board_data.php?bbs_cd=news%");
});
