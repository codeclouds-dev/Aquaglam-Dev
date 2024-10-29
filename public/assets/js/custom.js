window.addEventListener('scroll', function () {
    const navbar = document.getElementById('main-nav');
    const logoFix = document.getElementById('logo-fix');
    const logoNav = document.getElementById('logoNav');
    const searchFix = document.getElementById('searchFix');

    // Determine the threshold based on screen width
    const threshold = window.innerWidth < 550 ? 30 : 100;

    if (window.pageYOffset > threshold) {
        navbar.classList.add('fixed');
        logoNav.classList.add('fixed');
        logoFix.style.display = "block";
        searchFix.style.display = "block";
    } else {
        navbar.classList.remove('fixed');
        logoNav.classList.remove('fixed');
        logoFix.style.display = "none";
        searchFix.style.display = "none";
    }
});





//Search Bar

const search = document.querySelector(".search-wrapper");
const input = search.querySelector("input");

search.addEventListener("mouseenter", () => {
    if (!input.matches(":focus")) {
        search.classList.add("active");
    }
});

search.addEventListener("mouseleave", () => {
    if (!input.matches(":focus") && !input.value.trim()) {
        search.classList.remove("active");
    }
});