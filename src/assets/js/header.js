//  header up
window.addEventListener('scroll', function () {
    if (window.innerWidth >= 1024) {
        let header = document.getElementById('header');
        if (window.pageYOffset > 0) {
            header.classList.add('-top-[140px]');
        } else {
            header.classList.remove('-top-[140px]');
        }
    }
});

// mobile menu
document.addEventListener('readystatechange', function () {
    if (document.readyState === "complete") {
        var openMobileMenu = document.getElementById("open-menu");
        var closeMobileMenu = document.getElementById("close-menu");
        var mobileMenu = document.getElementById("mobile-menu");
        let body = document.getElementById('body');
        openMobileMenu.onclick = function () {
            mobileMenu.style.display = 'block';
            body.classList.add('no-scroll');
        }
        closeMobileMenu.onclick = function () {
            mobileMenu.style.display = 'none';
            body.classList.remove('no-scroll');
        }
    }
});

document.addEventListener('readystatechange', function () {
    if (document.readyState === "complete") {
        document.querySelectorAll('.mobile-item-point').forEach(el =>
            el.addEventListener('click', function (elo) {
                var mobileMenu = document.getElementById("mobile-menu");
                let body = document.getElementById('body');
                mobileMenu.style.display = 'none';
                body.classList.remove('no-scroll');
            })
        );
    }
});
