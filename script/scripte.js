console.log("coucou")
let currentSlide = 0;
const totalSlides = 3;

function updateSlideImages() {
    const slide1Index = (currentSlide - 1 + totalSlides) % totalSlides;
    const slide2Index = currentSlide;
    const slide3Index = (currentSlide + 1) % totalSlides;

    document.getElementById('slide1').src = `images/imgcar${slide1Index + 1}.png`;
    document.getElementById('slide2').src = `images/imgcar${slide2Index + 1}.png`;
    document.getElementById('slide3').src = `images/imgcar${slide3Index + 1}.png`;
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlideImages();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateSlideImages();
}

// Initialisation
updateSlideImages();

// header
function toggleMenu() {
    var ulHeader = document.querySelector('.ul-header');
    ulHeader.classList.toggle('show');
}
