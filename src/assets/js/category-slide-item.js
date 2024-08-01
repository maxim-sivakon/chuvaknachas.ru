document.addEventListener('readystatechange', function () {
    if (document.readyState === "complete") {
        document.querySelectorAll('.category-slide-item').forEach(el =>
            el.addEventListener('click', function (elo) {
                var item = document.getElementsByClassName('category-slide-item-menu');
                var itemMenu = document.getElementsByClassName('category-slide-item');
                for (var i = 0; i < item.length; i++) {
                    if (item[i].getAttribute('data-id') === this.getAttribute('data-id')) {
                        item[i].classList.add('active');
                        itemMenu[i].classList.add('active');
                    } else {
                        item[i].classList.remove('active');
                        itemMenu[i].classList.remove('active');
                    }
                }
            })
        );
    }
});
