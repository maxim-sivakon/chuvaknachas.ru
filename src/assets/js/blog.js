document.addEventListener('readystatechange', function () {
    if (document.readyState === "complete") {

        // список разделов блога
        var blogSectionsList = document.getElementById("blog-sections-list");
        if(blogSectionsList !== null){
            blogSectionsList.addEventListener("change", function () {
                var selectedValue = this.value;
                window.location.href = selectedValue;
            });
        }

        // tabs detail blog
        document.querySelectorAll('.detail-blog-tab').forEach(el =>
            el.addEventListener('click', function (elo) {
                var item = document.getElementsByClassName('detail-blog-container');
                var itemMenu = document.getElementsByClassName('detail-blog-tab');
                for (var i = 0; i < itemMenu.length; i++) {
                    if (item[i].getAttribute('data-id') === this.getAttribute('data-id')) {
                        item[i].classList.add('active-tab');
                        itemMenu[i].classList.add('active-tab');
                    } else {
                        item[i].classList.remove('active-tab');
                        itemMenu[i].classList.remove('active-tab');
                    }
                }
            })
        );

    }
});