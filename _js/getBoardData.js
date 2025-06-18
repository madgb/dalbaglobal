document.addEventListener("DOMContentLoaded", function () {
  $(document).on("click", ".nice-select .option", function () {
    // console.log("dddddd");
    const selectedYear = $(this).data("value");
    // console.log("선택된 연도:", selectedYear);
    getYearData(selectedYear);
  });

  function getYearData(year) {
    const container = document.querySelector(".Announcements .ir_ul");
    const loadMoreButton = document.querySelector(".Announcements .btn");
    fetch(`/load_board_data.php?bbs_cd=announcements&w_year=${year}`)
      .then((response) => response.json())
      .then((data) => {
        container.innerHTML = "";
        if (data.posts.length > 0) {
          container.innerHTML = data.posts.map((post) => createPostHTML(post)).join("");
          loadMoreButton.setAttribute("data-offset", 5);
          loadMoreButton.setAttribute("data-total", data.total_count);

          if (data.total_count > 5) {
            loadMoreButton.style.removeProperty("display");
          } else {
            loadMoreButton.style.display = "none";
          }
        } else {
          container.innerHTML = `<li class="no-data">게시물이 없습니다.</li>`;
          loadMoreButton.style.display = "none";
        }
      })
      .catch((error) => console.error("에러 발생:", error));
  }

  function reloadBoardData(sectionSelector, containerSelector, url, extraParams = "") {
    const container = document.querySelector(containerSelector);
    const loadMoreButton = document.querySelector(`${sectionSelector} .btn`);

    if (!container || !loadMoreButton) return;

    let fullUrl = `${url}?offset=0&limit=5${extraParams}`;

    fetch(fullUrl)
      .then((response) => response.json())
      .then((jsonData) => {
        container.innerHTML = "";

        if (jsonData.posts.length > 0) {
          if (sectionSelector === ".Newsroom") {
            container.innerHTML = jsonData.posts.map((post) => createNewsroomPostHTML(post)).join("");
          } else {
            container.innerHTML = jsonData.posts.map((post) => createPostHTML(post)).join("");
          }
          loadMoreButton.setAttribute("data-offset", 5);
          loadMoreButton.setAttribute("data-total", jsonData.total_count);

          if (jsonData.total_count > 5) {
            loadMoreButton.style.removeProperty("display");
          } else {
            loadMoreButton.style.display = "none";
          }
        } else {
          container.innerHTML = `<li class="no-data">게시물이 없습니다.</li>`;
          loadMoreButton.style.display = "none";
        }
      })
      .catch((error) => console.error("Error reloading data:", error));
  }

  function loadMoreData(buttonSelector, containerSelector, url, createPostHTMLFunction, sectionSelector) {
    const loadMoreButton = document.querySelector(buttonSelector);
    if (!loadMoreButton) return;

    loadMoreButton.addEventListener("click", function () {
      // console.log("dfdsfdsfd");
      let offset = parseInt(loadMoreButton.getAttribute("data-offset")) || 0;
      let limit = 5;
      let total = parseInt(loadMoreButton.getAttribute("data-total")) || 0;
      // console.log("offset",offset);
      // console.log("total",total);

      if (offset >= total) {
        loadMoreButton.style.display = "none";
        return;
      }

      let bbsCd = "";
      if (sectionSelector === ".Newsroom") {
        const activeTab = document.querySelector(".Newsroom .radio-btns input:checked");
        bbsCd = activeTab ? (activeTab.id === "news_all" ? "news%" : `news_${activeTab.id.toLowerCase()}`) : "news%";
      } else if (sectionSelector === ".IR_Material") {
        const activeTab = document.querySelector(".IR_Material .radio-btns input:checked");
        bbsCd = activeTab ? (activeTab.id === "All" ? "ir%" : `ir_${activeTab.id.toLowerCase()}`) : "ir%";
      } else if (sectionSelector === ".Announcements") {
        const selectedYear = document.querySelector(".Announcements .select_box select").value;
        bbsCd = "announcements";
        url += `?&w_year=${selectedYear}`;
      }

      let fetchUrl = `${url}?&bbs_cd=${encodeURIComponent(bbsCd)}&offset=${offset}&limit=${limit}`;
      // console.log(offset);
      fetch(fetchUrl)
        .then((response) => response.json())
        .then((jsonData) => {
          if (jsonData.posts.length > 0) {
            const container = document.querySelector(containerSelector);
            container.innerHTML += jsonData.posts.map(createPostHTMLFunction).join("");

            offset += limit;
            loadMoreButton.setAttribute("data-offset", offset);

            if (offset >= total) {
              loadMoreButton.style.display = "none";
            }
          } else {
            loadMoreButton.style.display = "none";
          }
        })
        .catch((error) => console.error("Error loading more data:", error));
    });
  }

  function createPostHTML(post) {
    let fixedUrl = post.url && post.url.trim() ? post.url.trim() : "#";

    if (fixedUrl !== "#" && !fixedUrl.startsWith("http://") && !fixedUrl.startsWith("https://")) {
      fixedUrl = "https://" + fixedUrl;
    }

    let strReturn = "";

    // post.bbsCd
    // console.log('post.bbsCd: ', post.bbsCd);

    if (post.bbsCd == "announcements") {
      strReturn = `
            <li>
                <div class="title">
                    <h2>${post.subject}</h2>
                    <span>${post.w_year}</span>
                </div>
                <div class="content">
                    <p>${post.content}</p>
                    <button type="button" class="plus"></button>
                </div>
                <div class="file">`;

      if (post.attachments.length > 0) {
        strReturn += `<div class="file_box">
                        <span>첨부파일</span>
                        <div class="item">
                            ${
                              post.attachments.length > 0
                                ? post.attachments
                                    .map(
                                      (att) => `
                                <a href="${att.file_path}" download="${att.file_name}">
                                    <button type="button">${att.file_name}</button>
                                </a>
                            `
                                    )
                                    .join("")
                                : ""
                            }
                        </div>
                    </div>`;
      }

      strReturn += `${fixedUrl ? `<a href="${fixedUrl}" class="link_go">링크 바로가기</a>` : ""}
                </div>
            </li>`;
    } else {
      strReturn = `
            <li>
                <div class="title">
                    <h2>${post.subject}</h2>
                    <span>${post.w_dt}</span>
                </div>
                <div class="content">
                    <p>${post.content}</p>
                    <button type="button" class="plus"></button>
                </div>
                <div class="file">`;

      if (post.attachments.length > 0) {
        strReturn += `<div class="file_box">
                        <span>첨부파일</span>
                        <div class="item">
                            ${
                              post.attachments.length > 0
                                ? post.attachments
                                    .map(
                                      (att) => `
                                <a href="${att.file_path}" download="${att.file_name}">
                                    <button type="button">${att.file_name}</button>
                                </a>
                            `
                                    )
                                    .join("")
                                : ""
                            }
                        </div>
                    </div>`;
      }

      strReturn += `${fixedUrl ? `<a href="${fixedUrl}" class="link_go">링크 바로가기</a>` : ""}
                </div>
            </li>`;
    }

    return strReturn;
  }

  function createNewsroomPostHTML(post) {
    let fixedNewsUrl = post.url && post.url.trim() ? post.url.trim() : "#";

    if (fixedNewsUrl !== "#" && !fixedNewsUrl.startsWith("http://") && !fixedNewsUrl.startsWith("https://")) {
      fixedNewsUrl = "https://" + fixedNewsUrl;
    }

    return `
        <li class="news-item">
            <a href="${fixedNewsUrl}">
                <div class="title">
                    <h2>${post.subject}</h2>
                    <span>${post.w_dt}</span>
                </div>
                <div class="content">
                    <p>${post.content}</p>
                    <span></span>
                </div>
            </a>
        </li>
        `;
  }

  document.querySelectorAll(".IR_Material .radio-btns input").forEach((radio) => {
    radio.addEventListener("change", function () {
      let selectedTab = this.id;
      let bbsCd = selectedTab === "All" ? "ir%" : `ir_${selectedTab.toLowerCase()}`;
      reloadBoardData(".IR_Material", ".IR_Material .ir_ul", "load_board_data.php", `&bbs_cd=${bbsCd}`);
    });
  });

  document.querySelector(".Announcements .select_box select").addEventListener("change", function () {
    let selectedYear = this.value;
    reloadBoardData(".Announcements", ".Announcements .ir_ul", "load_board_data.php", `&bbs_cd=announcements&w_year=${selectedYear}`);
  });

  document.querySelectorAll(".Newsroom .radio-btns input").forEach((radio) => {
    radio.addEventListener("change", function () {
      let selectedTab = this.id;
      // let bbsCd = selectedTab === "news_all" ? "news%" : `news_${selectedTab.toLowerCase()}`;
      let bbsCd = "";
      if (selectedTab === "news_all") {
        bbsCd = "news%";
      } else if (selectedTab === "news_other") {
        bbsCd = "news_other";
      } else {
        bbsCd = `news_${selectedTab.toLowerCase()}`;
      }
      reloadBoardData(".Newsroom", ".Newsroom .news_ul", "load_board_data.php", `&bbs_cd=${bbsCd}`);
    });
  });

  // loadMoreData(".IR_Material .btn", ".IR_Material .ir_ul", "load_board_data.php?bbs_cd=ir%", createPostHTML);
  // loadMoreData(".Announcements .btn", ".Announcements .ir_ul", "load_board_data.php?bbs_cd=announcements", createPostHTML);
  // loadMoreData(".Newsroom .btn", ".Newsroom .news_ul", "load_board_data.php?bbs_cd=news%", createNewsroomPostHTML);
  loadMoreData(".IR_Material .btn", ".IR_Material .ir_ul", "load_board_data.php", createPostHTML, ".IR_Material");
  loadMoreData(".Announcements .btn", ".Announcements .ir_ul", "load_board_data.php", createPostHTML, ".Announcements");
  loadMoreData(".Newsroom .btn", ".Newsroom .news_ul", "load_board_data.php", createNewsroomPostHTML, ".Newsroom");
});
