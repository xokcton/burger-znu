/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

$(function() {
    // при нажатии на кнопку scrollup
    $(".scrollup").click(function() {
        // переместиться в верхнюю часть страницы
        $("html, body").animate(
            {
                scrollTop: 0
            },
            1000
        );
    });
});
// при прокрутке окна (window)
$(window).scroll(function() {
    // если пользователь прокрутил страницу более чем на 200px
    if ($(this).scrollTop() > 200) {
        // то сделать кнопку scrollup видимой
        $(".scrollup").fadeIn();
    }
    // иначе скрыть кнопку scrollup
    else {
        $(".scrollup").fadeOut();
    }
});

// cart
const BTN = document.getElementById('order__cart__button');
const closee1 = document.getElementById('close__cart__modal__button');
const closee = document.querySelector('.popup__cross');
const popup = document.querySelector('.popup');
const BODY = document.querySelector('body');
const lockPadding = document.querySelectorAll('.lock-padding');

let unlock = true;
const TIMEOUT = 800;

BTN?.addEventListener('click', e => {
    popupOpen(popup);
    e.preventDefault();
});

closee?.addEventListener('click', e => {
    popupClose(closee.closest('.popup'))
    e.preventDefault();
});

closee1?.addEventListener('click', e => {
    popupClose(closee1.closest('.popup'))
    e.preventDefault();
});

function popupOpen(currentPopup) {
    if (currentPopup && unlock) {
        const popupActive = document.querySelector('.popup.open');
        if (popupActive) {
            popupClose(popupActive, false);
        } else {
            bodyLock();
        }
        currentPopup.classList.add('open');
        currentPopup.addEventListener('click', e => {
            if (!e.target.closest('.popup-content')) {
                popupClose(e.target.closest('.popup'));
            }
        });
    }
}

function popupClose(popupActive, doUnlock = true) {
    if (unlock) {
        popupActive?.classList.remove('open');
        if (doUnlock) {
            bodyUnlock();
        }
    }
}

function bodyLock() {
    const lockPaddingValue = window.innerWidth - document.querySelector('.intro').offsetWidth + 'px';
    if (lockPadding.lenght > 0) {
        for (let index = 0; index < lockPadding.length; index++) {
            const element = lockPadding[index];
            element.style.paddingRight = lockPaddingValue;
        }
    }
    BODY.style.paddingRight = lockPaddingValue;
    BODY.classList.add('lock');

    unlock = false;
    setTimeout(() => {
        unlock = true;
    }, TIMEOUT);
}

function bodyUnlock() {
    setTimeout(() => {
        if (lockPadding.lenght > 0) {
            for (let index = 0; index < lockPadding.length; index++) {
                const element = lockPadding[index];
                element.style.paddingRight = '0px';
            }
        }
        BODY.style.paddingRight = '0px';
        BODY.classList.remove('lock');
    }, TIMEOUT);

    unlock = false;
    setTimeout(() => {
        unlock = true;
    }, TIMEOUT);
}

document.addEventListener('keydown', e => {
    if (e.which === 27) {
        const popupActive = document.querySelector('.popup.open');
        popupClose(popupActive);
    }
});

(function () {
    // проверка поддержки
    if (!Element.prototype.closest) {
        Element.prototype.closest = function (css) {
            var node = this;
            while (node) {
                if (node.matches(css)) return node;
                else node = node.parentElement;
            }
            return null;
        };
    }
})();
(function () {
    // проверка поддержки
    if (!Element.prototype.matches) {
        // определить свойство
        Element.prototype.matches = Element.prototype.matchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector;
    }
})();

const formAddToCart = document.querySelector('.add-to-cart');
if (formAddToCart) {
    formAddToCart.addEventListener('submit', function (e) {
        e.preventDefault();
        const data = new FormData(this);
        axios.post('/cart/add', data)
            .then(function (response) {
                changeCart(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

function changeCart(data) {
    document.querySelector('.popup-body').innerHTML = data;
}

if (document.getElementById('number_qty')) {
    document.getElementById('number_qty').addEventListener('input', () => {
        if (document.getElementById('number_qty').value < 1) {
            document.getElementById('number_qty').value = 1;
        }
    });
}

if (document.querySelector('.clear-cart')) {
    document.querySelector('.clear-cart').addEventListener('click', function (e) {
        e.preventDefault();

        axios.post('/cart/clear')
            .then(function (response) {
                changeCart(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

document.querySelector('body').addEventListener('submit', function (e) {
    if (e.target.classList.contains('product-delete')) {
        e.preventDefault();
        const data = new FormData(e.target);

        axios.post('/cart/remove', data)
            .then(function (response) {
                changeCart(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
});
