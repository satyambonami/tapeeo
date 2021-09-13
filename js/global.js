"use strict";

const animationText = document.querySelector(".animationText");
const animationLine = document.querySelector(".animationLine");
const cardFlipperDiv = document.querySelector(".card_flipper_inner");
const screen = document.querySelector(".screen");

const sliderAn = document.querySelector(".owl-carousel");
const animationTextDiv = document.querySelector(".animationText_div");
const firstPayment = document.querySelectorAll(".first_payment");
const payment = document.querySelectorAll(".payment");

const cardFr = document.querySelectorAll(".cardFr");
const cardDiv = document.querySelectorAll(".card_div");
const imgDivContent = document.querySelector(".imgDivContent");

const showBeforeStart = document.querySelector(".showBeforeStart");
const showHideContentDiv = document.querySelectorAll(".showHideContentDiv");

// animation js
(function() {
    var ml4 = {};
    ml4.opacityIn = [0, 1];
    ml4.scaleIn = [0.2, 1];
    ml4.scaleOut = 3;
    ml4.durationIn = 350;
    ml4.durationOut = 350;
    ml4.delay = 350;

    anime
        .timeline({ loop: true })
        .add({
            targets: ".ml4 .letters-1",
            opacity: ml4.opacityIn,
            scale: ml4.scaleIn,
            duration: ml4.durationIn,
        })
        .add({
            targets: ".ml4 .letters-1",
            opacity: 0,
            scale: ml4.scaleOut,
            duration: ml4.durationOut,
            easing: "easeInExpo",
            delay: ml4.delay,
        })
        .add({
            targets: ".ml4 .letters-2",
            opacity: ml4.opacityIn,
            scale: ml4.scaleIn,
            duration: ml4.durationIn,
        })
        .add({
            targets: ".ml4 .letters-2",
            opacity: 0,
            scale: ml4.scaleOut,
            duration: ml4.durationOut,
            easing: "easeInExpo",
            delay: ml4.delay,
        })
        .add({
            targets: ".ml4 .letters-3",
            opacity: ml4.opacityIn,
            scale: ml4.scaleIn,
            duration: ml4.durationIn,
        })
        .add({
            targets: ".ml4 .letters-3",
            opacity: 0,
            scale: ml4.scaleOut,
            duration: ml4.durationOut,
            easing: "easeInExpo",
            delay: ml4.delay,
        })
        .add({
            targets: ".ml4",
            opacity: 0,
            duration: 100,
            delay: 100,
        });
})();

const documentDiv = document.body;
documentDiv.style.overflow = "hidden";

setTimeout(() => {
    showBeforeStart.remove();
    documentDiv.style.overflowY = "scroll";
}, 3000);

// ✓ -  add and remove
// ✓ - if the usr clike first button so add the active class
// ✓ - if the usr click anothe button remove class from first and add it second button

function selectItem() {
    removeClass();
    hideDiv();
    // adding the class
    this.classList.add("active_div");

    const showDiv = document.querySelector(`.showHideContentDiv-${this.id}`);
    showDiv.classList.remove("showAndHide");
}

// removing classes from svg
function removeClass() {
    cardDiv.forEach((item) => {
        item.classList.remove("active_div");
    });
}

function hideDiv() {
    showHideContentDiv.forEach((el) => {
        el.classList.add("showAndHide");
    });
}

// avtive_card
cardDiv.forEach((item) => {
    item.addEventListener("click", selectItem);
});

let animationTextArray = ["Add you", "pay you", "Book with you", "Add your Event", "View a link", "Get your link"];

// ✓ - flip the card
let cardFlipAnimation = false;

let changeTimer = 0;
let animationLineCounter = 260;
const lineWidth = 260;
animationText.textContent = animationTextArray[changeTimer];
animationLine.style.width = String(lineWidth) + "px";

const animationTimer = setInterval(() => {
    animationLineCounter--;
    if (animationLineCounter === 0) {
        animationLineCounter = 260;
    }

    // ✓ - animate the slider width
    // ✓ - add smooth animation
    animationLine.style.width = String(animationLineCounter) + "px";
    if (animationLineCounter <= 255) {
        animationText.style.opacity = ".4";
    }
    if (animationLineCounter <= 245) {
        animationText.style.opacity = ".8";
    }
    if (animationLineCounter <= 240) {
        animationText.style.opacity = "1";
    }

    // ✓ - when the slider width = 0, change the animation textContent
    if (animationLineCounter === 260) {
        changeTimer++;
        let currentNumber = (changeTimer + 1) % animationTextArray.length;
        animationText.textContent = animationTextArray[currentNumber];
        animationText.style.opacity = "0";
    }
}, 10);

// ✓ - image slider
$(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 2000,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 1,
        },
    },
});

const owl = $(".owl-carousel");
owl.owlCarousel();

// ✓ - change the animation line width
const animationTextStyle = getComputedStyle(animationText);
let animtionTextWidth = animationTextStyle.width;

// Listen to owl events:
owl.on("changed.owl.carousel", function(event) {
    // console.log(event.item.index);
    changeTimer++;
    let currentNumber = (changeTimer + 1) % animationTextArray.length;
    animationText.textContent = animationTextArray[currentNumber];

    // cahgnet
    animationLine.style.width = animtionTextWidth.width;
    //   clearInterval(animationTimer);
});

// 1 - add classes when user click the active payment div
// 2 - if the user the click in next payment button the prve button active class remove

// not complete
const paymentActive = function(e) {
    firstPayment.forEach((item) => {
        item.addEventListener("click", function(e) {
            e.currentTarget.classList.add("active_card");
        });
    });
};

paymentActive();