class Product {
    constructor(productPrice, productPic, ProductName) {
        this.pic = productPic;
        this.price = productPrice;
        this.name = ProductName;
        this.el = document.querySelector('.catalog');
        this.pagBlock = document.querySelector('.number');
    };
    renderCatalogItem() {

        let item = document.createElement('div');
        item.classList.add('catalog-item');

        item.innerHTML = `
            
            <div class="catalog-item-pic" style="background: url(/image/${this.pic}) center center / contain no-repeat"></div>

            <div class="catalog-item-name">${this.name}</div>
            <div class="catalog-item-price">${this.price} руб.</div>
        `;

        this.el.appendChild(item);

    };
    clearCatalog() {
        this.el.innerHTML = '';
    };
    preloaderOn() {
        this.el.innerHTML = `<div class="preloader"></div>`;
    };
    preloaderOff() {
        this.clearCatalog();
    };
    renderPagination(allBlocks, currentPage) {

        // 1. Номер активного кубика
        // 2. Общее количество кубиков
        // pagination [
        //     'active' : 1,
        //     'allBlocks' : 4
        // ]

        for (let i = 1; i <= allBlocks; i++) {

            let item = document.createElement('div'); // создаем элемент
            item.classList.add('number-item'); // добавляем ему класс
            if (i == currentPage) item.classList.add('active'); // добавлем active для второго блока

            item.addEventListener('click', () => {
                // 1. Узнаем значение селекта
                let allSelectsAndValues = document.querySelectorAll('select');
                // ?category=1&size=M&price=1000-3000
                let catValue = `?category=${allSelectsAndValues[0].value}&size=${allSelectsAndValues[1].value}&price=${allSelectsAndValues[2].value}`;

                this.renderCatalog(catValue, i);
            });

            item.innerHTML = i; // вставляем внутрь цифру

            this.pagBlock.appendChild(item); // выводим блок на страницу внутрь блока .number
        }
    };
    renderCatalog(category, currentPage) {

        console.log(currentPage);
        let cat = (category !== '') ? category : '?category=1';
        currentPage = `&curPage=${currentPage || 1}`;

        // let cat;
        // if (category !== '') {
        //     cat = category;
        // } else {
        //     cat = '?category=1';
        // }

        // создаем запрос отпраавляем
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/catalogHandler.php${cat}${currentPage}`);
        xhr.send();

        this.clearCatalog();
        this.preloaderOn();
        //console.dir(xhr);

        // проверяем, пришли ли данные с сервера
        xhr.addEventListener('load', () => {

            this.preloaderOff();
            let data = JSON.parse(xhr.responseText);

            console.log(data.pagination.allPages);
            // data.pagination.allPages
            // data.pagination.currentPage

            data.catalogItems.forEach((value, index) => {

                let catalogItem = new Product(value.price, value.image, value.title);
                catalogItem.renderCatalogItem();

            });

            this.renderPagination(data.pagination.allPages, data.pagination.currentPage);
        });
    }
}


let cat = window.location.search;
// ?category=1


let newCatalog = new Product();
newCatalog.renderCatalog(cat);


let catSelect = document.querySelectorAll('select');

catSelect.forEach(function(value, index) {

    value.addEventListener('change', function() {
        // 1. Узнаем значение селекта
        let allSelectsAndValues = document.querySelectorAll('select');
        // ?category=1&size=M&price=1000-3000
        let catValue = `?category=${allSelectsAndValues[0].value}&size=${allSelectsAndValues[1].value}&price=${allSelectsAndValues[2].value}
        `;
        // 2. Рендерим каталог заново
        newCatalog.renderCatalog(catValue);
    })

})