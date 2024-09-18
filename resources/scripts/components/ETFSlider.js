export default class ETFSlider {
  constructor() {
    let elem = document.querySelector('.hero-etf-slider');
    if (!elem) return;
    this.elem = elem;
    this.slides = elem.querySelectorAll('.hero-etf-slider-slide');
    this.scrollbar = elem.querySelector('.etf-slider-scrollbar > .bar');
    this.interval = null;
    this.timeout = null;
    this.index = 0;
    this.init();
  }

  init() {
    this.elem
      .querySelector('.etf-slider-arrow.up')
      .addEventListener('click', () => {
        this.prev();
      });
    this.elem
      .querySelector('.etf-slider-arrow.down')
      .addEventListener('click', () => {
        this.next();
      });
    this.scrollbar.style.height = `${(100 / this.slides.length).toFixed(2)}%`;
    this.move(0);
    this.play();
    this.elem.addEventListener('mouseenter', () => {
      this.pause();
    });
    this.elem.addEventListener('mouseleave', () => {
      if (this.timeout) clearTimeout(this.timeout);
      this.timeout = setTimeout(() => {
        this.play();
      }, 5000);
    });
  }

  move(index) {
    if (index < 0) {
      index = this.slides.length - 1;
    } else if (index >= this.slides.length) {
      index = 0;
    }
    this.slides[this.index].classList.remove('active');
    this.index = index;
    this.slides[this.index].classList.add('active');
    this.updateScrollBar();
  }
  next() {
    this.pause();
    this.move(this.index + 1);
  }

  prev() {
    this.pause();
    this.move(this.index - 1);
  }

  play() {
    this.interval = setInterval(() => {
      this.next();
    }, 5000);
  }

  pause() {
    clearInterval(this.interval);
  }

  updateScrollBar() {
    this.scrollbar.style.transform = `translateY(${this.index * 100}%)`;
  }
}
