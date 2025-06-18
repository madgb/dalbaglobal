export let selectedFiles = [];
export let oldFiles = [];

// 대표이미지 로드 함수
export function readURL(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      let areaImg = document.getElementById("area_img");
      let existingContainer = document.getElementById("image_container");

      if (!existingContainer) {
        let container = document.createElement("div");
        container.id = "image_container";
        areaImg.appendChild(container);

        let btnPreview = document.createElement("button");
        btnPreview.className = "btn_delete";
        container.appendChild(btnPreview);

        let img = document.createElement("img");
        img.id = "preview";
        container.appendChild(img);
      }

      document.getElementById("preview").src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    let preview = document.getElementById("preview");
    if (preview) {
      preview.src = "";
    }
  }
}

// 대표이미지 삭제 이벤트
export function setupImageDeleteEvent() {
  const area_img = document.getElementById("area_img");
  if (area_img) {
    area_img.addEventListener("click", function (e) {
      if (e.target && e.target.classList.contains("btn_delete")) {
        let container = document.getElementById("image_container");
        if (container) {
          container.remove();
        }
        document.getElementById("formFile").value = "";
        document.getElementById("formFile").setAttribute("required", "yes");
      }
    });
  }
}

// 대표 파일 로드 함수
export function readFile(input) {
  if (input.files && input.files[0]) {
    let file = input.files[0];
    let uploadNameInput = input.parentElement.querySelector(".upload_name");

    if (uploadNameInput) {
      uploadNameInput.value = file.name;
    } else {
      let addFileList = document.getElementById("addFileList");
      if (addFileList) {
        addFileList.textContent = file.name;
      }
    }
  } else {
    // 파일이 선택되지 않은 경우 초기화
    let uploadNameInput = input.parentElement.querySelector(".upload_name");
    if (uploadNameInput) {
      uploadNameInput.value = "";
    } else {
      let addFileList = document.getElementById("addFileList");
      if (addFileList) {
        addFileList.textContent = "";
      }
    }
  }
}

// 파일삭제
document.addEventListener("click", function (e) {
  if (e.target && e.target.classList.contains("btn_delete")) {
    const fileId = e.target.dataset.fileid;
    const fileType = e.target.dataset.filetype;

    if (fileId) {
      deleteExistingFile(fileId);
    } else {
      const img_li = e.target.closest("li");
      if (img_li) {
        img_li.remove();
        let index = selectedFiles.findIndex((file) => file.name === e.target.dataset.filename);
        if (index > -1) {
          selectedFiles.splice(index, 1);
        }
      }
    }
  }
});

// 파일삭제함수
export function deleteExistingFile(fileId) {
  if (oldFiles) {
    oldFiles = oldFiles.filter((file) => file.idx !== fileId);
  }

  if (document.getElementById("file-item-" + fileId)) {
    document.getElementById("file-item-" + fileId).remove();
  }

  //파일정렬
  // if (fileOrder) {
  // 	updateFileOrder();
  // }
}

// 파일첨부
export function handleFileSelect(input, imgtype = true, limitFileCnt) {
  if (input.files) {
    if (selectedFiles.length + oldFiles.length + input.files.length > limitFileCnt) {
      showError(input, "최대 " + limitFileCnt + "개의 파일만 선택할 수 있습니다.", "red");
      // alert("최대 " + limitFileCnt + "개의 파일만 선택할 수 있습니다.");
      return;
    }
    for (let i = 0; i < input.files.length; i++) {
      let file = input.files[i];
      if (!isMatchFile(file)) {
        let randomPart = Math.floor(Math.random() * 10000);
        let tempId = "new-" + Date.now() + "-" + randomPart;
        file.tempId = tempId; // 임시 ID 생성

        selectedFiles.push(file);

        if (imgtype === true) {
          createImagePreview(file, tempId);
        } else {
          createFilePreview(file, tempId);
        }

        //파일정렬
        // if (fileOrder) {
        // 	addToFileOrder(file);
        // }
      }
    }
  }
}

// 중복파일
export function isMatchFile(newFile) {
  return selectedFiles.some(function (file) {
    return file.name === newFile.name && file.size === newFile.size && file.lastModified === newFile.lastModified;
  });
}

// 이미지파일 미리보기 생성
export function createImagePreview(file, tempId, name = "") {
  var reader = new FileReader();
  reader.onload = function (e) {
    let img_li = document.createElement("li");
    img_li.id = "file-item-" + tempId;
    img_li.classList.add("select_image");

    let img = document.createElement("img");
    let deleteBtn = document.createElement("button");

    deleteBtn.type = "button";
    deleteBtn.classList.add("btn_delete");
    deleteBtn.dataset.filename = file.name;
    deleteBtn.dataset.fileid = tempId;

    // 삭제 텍스트 추가
    deleteBtn.textContent = "삭제";

    deleteBtn.onclick = function () {
      img_li.remove();
      let index = selectedFiles.indexOf(file);
      if (index > -1) {
        selectedFiles.splice(index, 1);
      }
    };

    let fileList = document.getElementById("selectedImageList");
    img.src = e.target.result;
    img_li.appendChild(deleteBtn);
    img_li.appendChild(img);

    if (name) {
      let h3 = document.createElement("h3");
      h3.textContent = name;
      img_li.appendChild(h3);
    }

    if (!fileList) {
      fileList = document.getElementById("selectedFileTypeB");
    }

    fileList.appendChild(img_li);

    if (!fileList.classList.contains("typeB")) {
      fileList.classList.add("mt-3");
    }
  };
  reader.readAsDataURL(file);
}

// 일반 파일 미리보기 생성 함수
export function createFilePreview(file, tempId) {
  let file_li = document.createElement("li");
  file_li.id = "file-item-" + tempId;

  let file_div = document.createElement("div");
  file_div.classList.add("file");

  let fileLink = document.createElement("a");
  fileLink.href = "#";
  fileLink.textContent = file.name;

  let fileSize = document.createElement("span");
  fileSize.classList.add("text-primary");
  fileSize.textContent = (file.size / 1048576).toFixed(2) + " MB";

  let deleteBtn = document.createElement("button");
  deleteBtn.type = "button";
  deleteBtn.classList.add("btn_delete");
  deleteBtn.classList.add("btn_delete_file");
  deleteBtn.dataset.filename = file.name;
  deleteBtn.dataset.fileid = tempId;

  // 삭제 텍스트 추가
  deleteBtn.textContent = "삭제";
  deleteBtn.onclick = function () {
    file_li.remove();
    let index = selectedFiles.findIndex((f) => f.name === file.name);
    if (index > -1) {
      selectedFiles.splice(index, 1);
    }
  };

  file_li.appendChild(file_div);
  file_div.appendChild(fileLink);
  file_div.appendChild(fileSize);
  file_div.appendChild(deleteBtn);

  let fileList = document.getElementById("selectedFileList");
  if (!fileList) {
    fileList = document.getElementById("selectedFileTypeB");
  }
  fileList.appendChild(file_li);

  console.log(fileList.classList);
  if (!fileList.classList.contains("typeB")) {
    fileList.classList.add("mt-3");
  }
}

export function resetSelectedFiles() {
  selectedFiles = [];
}

export function resetOldFiles() {
  oldFiles = [];
}

document.addEventListener("DOMContentLoaded", function () {
  setupImageDeleteEvent();
});
