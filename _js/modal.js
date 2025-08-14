// Get the modal
var modal = document.getElementById("myModal");

// URL에 ?showModal=true가 포함되어 있을 때만 모달을 보여줌
window.onload = function () {
  const urlParams = new URLSearchParams(window.location.search);
  const shouldShow = urlParams.get("showModal");
  if (shouldShow === "true") {
    modal.style.display = "block";
  }
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

document.addEventListener("DOMContentLoaded", function () {
  const langToggle = document.getElementById("langToggle");
  const koContent = document.querySelector(".modal-inner.ko");
  const enContent = document.querySelector(".modal-inner.en");

  langToggle.addEventListener("change", function () {
    if (langToggle.value === "en") {
      koContent.style.display = "none";
      enContent.style.display = "block";
    } else {
      koContent.style.display = "block";
      enContent.style.display = "none";
    }
  });
});
