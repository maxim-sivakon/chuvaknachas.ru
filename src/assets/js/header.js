//  header up
window.addEventListener('scroll', function () {
    if (window.innerWidth >= 1024) {
        let header = document.getElementById('header');
        if (window.pageYOffset > 0) {
            header.classList.add('-top-11');
        } else {
            header.classList.remove('-top-11');
        }
    }
});

// page up
document.addEventListener('readystatechange', function () {
    if (document.readyState === "complete") {
        let pageTop = document.getElementById('page-top');
        pageTop.onclick = function () {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    }
});

// show scroll top
window.addEventListener('scroll', function () {
    let pageTop = document.getElementById('page-top');
    if (window.pageYOffset > 0) {
        pageTop.classList.add('!block');
    } else {
        pageTop.classList.remove('!block');
    }
});

// search line
document.addEventListener('readystatechange', function () {
    if (document.readyState === "complete") {
        var controlSearchMb = document.getElementById("control-search-mb");
        var controlSearchPc = document.getElementById("control-search-pc");
        var btnSearchActionClose = document.getElementById("btn-search-action-close");
        var mainSearch = document.getElementById("main-search");
        var mainSearchBlur = document.querySelector('#main-search > .body-blur');

        controlSearchMb.onclick = function () {
            mainSearch.style.display = 'block';
        }
        controlSearchPc.onclick = function () {
            mainSearch.style.display = 'block';
        }
        btnSearchActionClose.onclick = function () {
            mainSearch.style.display = 'none';
        }
        mainSearchBlur.onclick = function () {
            mainSearch.style.display = 'none';
        }
    }
});

// mobile menu
document.addEventListener('readystatechange', function () {
    if (document.readyState === "complete") {
        var mainMobileMenuOpen = document.getElementById("main-mobile-menu-open");
        var mobileMenuClose = document.getElementById("mobile-menu-close");
        var mainMobileMenuBar = document.getElementById("main-mobile-menu-bar");
        var mainMobileMenuBarBlur = document.getElementById("main-mobile-menu-bar-blur");

        mainMobileMenuOpen.onclick = function () {
            mainMobileMenuBar.style.display = 'block';
        }
        mobileMenuClose.onclick = function () {
            mainMobileMenuBar.style.display = 'none';
        }
        mainMobileMenuBarBlur.onclick = function () {
            mainMobileMenuBar.style.display = 'none';
        }
    }
});

// show mobile menu level
document.addEventListener('click', function () {
    if (document.readyState === "complete") {
        let menuMobileLevel = document.getElementById("menu-mobile-level");
        menuMobileLevel.onclick = function () {
            menuMobileLevel.classList.toggle('active-level-menu');
        }
    }
});