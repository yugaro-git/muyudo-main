// ハンバーガーメニュー
const ham = document.querySelector("#js-hamburger");
const nav = document.querySelector("#js-nav");
const nItem = document.querySelectorAll(".nav_item");
const scrollSwich = document.querySelectorAll(".hamSwich");

ham.addEventListener("click", function () {
  ham.classList.toggle("active");
  nav.classList.toggle("active");
  scrollSwich[0].classList.toggle("scrollSwich");
});

nItem.forEach(function (btn) {
  btn.addEventListener("click", function () {
    ham.classList.toggle("active");
    nav.classList.toggle("active");
    scrollSwich[0].classList.remove("scrollSwich");
  });
});

//background1

document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".bg_1");

  function createFeatherElement(featherDelay) {
    const featherElm = document.createElement("img");
    const pattern = Math.floor(Math.random() * 2) + 1;
    const imgData = Math.floor(Math.random() * 3) + 1;
    featherElm.src = `img/hane${imgData}.webp`;
    featherElm.classList.add("feather");
    const size = Math.random() * 15 + 30; // 30から45のランダムなサイズ
    featherElm.style.width = `${size}px`;
    featherElm.style.left = `${Math.random() * 100}%`;
    featherElm.style.animation = `fallfeather${pattern} 13s linear infinite ${featherDelay}s`;
    return featherElm;
  }

  let fDelayTime = 0;
  const featherSheets = 12;
  const featherEven = Math.floor(featherSheets * 0.5);
  for (let i = 1; i <= featherSheets; i++) {
    if (i === featherEven * 0.5) {
      fDelayTime = 1;
    }
    const featherElm = createFeatherElement(fDelayTime);
    container.appendChild(featherElm);
    fDelayTime += Math.random() * 0.7 + 1.8; // 1.8から2.5のランダムな遅延
  }

  const background2 = document.querySelectorAll(".bg_2");
  const feather = document.querySelectorAll(".feather");
  const objects = document.querySelectorAll(".first_view");

  //スクロール感知で実行
  const scrollEvent = function (entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        container.classList.remove("scOn");
        entry.target.classList.remove("scOn");
        background2.forEach((bgWind) => {
          bgWind.style.opacity = "0";
          bgWind.pause();
        });

        feather.forEach((stop) => (stop.style.animationPlayState = "running"));
      } else {
        container.classList.add("scOn");
        entry.target.classList.add("scOn");

        background2.forEach((bgWind) => {
          bgWind.style.opacity = "1";
          bgWind.play();
        });
        feather.forEach((stop) => (stop.style.animationPlayState = "paused"));
      }
    });
  };

  // オプション
  const options = {
    root: null,
    rootMargin: "40px 5px  40px 5px",
    threshold: 0.9,
  };

  // IntersectionObserverインスタンス化
  const scrollEv = new IntersectionObserver(scrollEvent, options);

  // 監視を開始
  objects.forEach((object) => {
    scrollEv.observe(object);
  });

  const objects2 = document.querySelectorAll(
    "#about , .works_container , .animationSwich"
  );

  //スクロール感知で実行
  const scrollEvent2 = function (entries) {
    entries.forEach((entry) => {
      let action = entry.target.dataset.action;
      if (entry.isIntersecting) {
        if (action === "lottie") {
          entry.target.play();
        } else {
          entry.target.classList.add("scOn"); //スクロール感知で「displayed」のクラス名を付与
        }
      } else {
        if (action === "lottie") {
          entry.target.pause();
        } else {
          entry.target.classList.remove("scOn"); //スクロール感知で「displayed」のクラス名を削除
        }
      }
    });
  };

  // オプション
  const options2 = {
    root: null,
    rootMargin: "0px",
    threshold: 0.3,
  };

  // IntersectionObserverインスタンス化
  const scrollEv2 = new IntersectionObserver(scrollEvent2, options2);

  // 監視を開始
  objects2.forEach((object) => {
    scrollEv2.observe(object);
  });
});
