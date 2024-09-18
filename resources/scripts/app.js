import domReady from '@roots/sage/client/dom-ready';
import Navbar from './components/Navbar';
import ETFSlider from './components/ETFSlider';

/**
 * Application entrypoint
 */
domReady(async () => {
  const SiteNav = new Navbar('.navbar');
  window.Slider = new ETFSlider();
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach((item) => {
    const question = item.querySelector('.faq-q');
    const answer = item.querySelector('.faq-a');

    // Initially, set maxHeight to 0 for all answers and handle padding with CSS
    answer.style.maxHeight = '0px';
    answer.style.overflow = 'hidden';

    question.addEventListener('click', function () {
      if (item.classList.contains('active')) {
        // Collapse the answer if it's already open
        answer.style.maxHeight = '0px';
        item.classList.remove('active');
      } else {
        // Close all other open items
        faqItems.forEach((otherItem) => {
          if (otherItem !== item && otherItem.classList.contains('active')) {
            const otherAnswer = otherItem.querySelector('.faq-a');
            otherAnswer.style.maxHeight = '0px';
            otherItem.classList.remove('active');
          }
        });

        // Expand the clicked item
        item.classList.add('active');

        // Calculate the height of the content inside the answer, including padding
        const fullHeight = answer.scrollHeight + 'px';

        // Apply the calculated height to maxHeight
        answer.style.maxHeight = fullHeight;
      }
    });
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
