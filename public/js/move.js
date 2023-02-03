gsap.registerPlugin(Flip);

const links = document.querySelectorAll(".nav-item .nav-link");
const activeNav = document.querySelector(".active-nav");

links.forEach((link) => {
  link.addEventListener("mousemove", () => {
    // move the line
    const state = Flip.getState(activeNav);
    link.appendChild(activeNav);
    Flip.from(state, {
      duration: 1,
      absolute: true,
      ease: "elastic.out(1,0.5)",
    });
  });
});

const links1 = document.querySelectorAll(".nav-item1 .nav-link1");
const activeNav1 = document.querySelector(".active-nav1");

links1.forEach((link) => {
  link.addEventListener("mousemove", () => {
    // move the line
    const state = Flip.getState(activeNav1);
    link.appendChild(activeNav1);
    Flip.from(state, {
      duration: 1,
      absolute: true,
      ease: "elastic.out(1,0.5)",
    });
  });
});



// area move
const areas = document.querySelectorAll(".area");
const moveHr = document.querySelector(".move-hr");
const elm = document.querySelector("#elm");
const suggestion = document.querySelector(".suggestion");
const boxUse = document.querySelector(".box-use");
const toUse = document.querySelector(".to-use");
const toUse1 = document.querySelector(".to-use1");

areas.forEach((area, index) => {
  area.addEventListener("click", () => {
    const state = Flip.getState(areas);
    moveHr.classList.add("hide");
    elm.classList.add("hide");
    suggestion.classList.add("hide");
    boxUse.classList.add("hide");
    toUse.classList.add("hide");
    toUse1.classList.add("hide");

    const isAreaActive = area.classList.contains("active");
    areas.forEach((otherArea, otherIdx) => {
      otherArea.classList.remove("active");
      otherArea.classList.remove("is-inactive");
      if(!isAreaActive && index !== otherIdx) {
        otherArea.classList.add("is-inactive");
      }
    });
    if(!isAreaActive) area.classList.add("active");
    
    Flip.from(state, {
      duration: 1,
      ease: "expo.out",
      absolute: true,
    });
    
    if(!area.classList.contains("active" == true)) {
      const timer = setInterval(function() {
        moveHr.classList.remove("hide");
        elm.classList.remove("hide");
        suggestion.classList.remove("hide");
        boxUse.classList.remove("hide");
        toUse.classList.remove("hide");
        toUse1.classList.remove("hide");
        clearInterval(timer);
      },10000);
      
    }
  });
});