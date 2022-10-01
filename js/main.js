/* Хранение переменных */
let menu = document.querySelector('.menu');
let blackoutCanvas = document.querySelector('.blackout-canvas');
let menuButton = document.querySelector('.header-container-nav__button');

/* Открытие/закрытие главного навигационного меню */
menuButton.addEventListener('click', function(){
	if (this.classList.toggle('is-active')) {
		menu.classList.add('menu__is-opened');
		this.style.transform = "rotate(180deg)";
		this.innerHTML = '<i class="fa-solid fa-xmark"></i>';
		document.body.classList.add('body__no-scroll');
	} else {
		menu.classList.remove('menu__is-opened');
		this.style.transform = "rotate(360deg)";
		this.innerHTML = '<i class="fa-solid fa-bars"></i>';
		document.body.classList.remove('body__no-scroll');
	}
})

/* Открытие/закрытие items меню еды */
const menuItem = document.querySelectorAll('.menu-range-item');

for(item of menuItem) {
	item.addEventListener('click', function() {
		this.classList.toggle('menu-item__is-active');
	})
}

/* Открытие/закрытие items фотографий */
const photosItem = document.querySelectorAll('.photos-box__item');

for(item of photosItem) {
	item.addEventListener('click', function(){
		if (this.classList.contains('photos-box__item__is-active')) {
		} else {
			for(el of photosItem) {
				el.classList.remove('photos-box__item__is-active');
			}
			this.classList.add('photos-box__item__is-active');
		}
	})
}

