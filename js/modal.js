//コンテンツの詳細ページができるまでの文

const modalBtn = document.querySelectorAll(".viewmore");
const closeModal = document.querySelectorAll(".modal_return");
const scrollSwich1 = document.getElementsByTagName("body");
modalBtn.forEach(function (btn) {
  btn.addEventListener("click", function () {
    var modal = btn.getAttribute("data-modal");
    document.getElementById(modal).style.display = "block";
    scrollSwich1[0].classList.add("scrollSwich");
  });
});

closeModal.forEach(function (btn) {
  btn.addEventListener("click", function () {
    var modal = btn.closest(".modal");
    modal.style.display = "none";
    scrollSwich1[0].classList.remove("scrollSwich");
  });
});

window.onclick = function (event) {
  if (event.target.className === "modal") {
    event.target.style.display = "none";
    scrollSwich1[0].classList.remove("scrollSwich");
  }
};
