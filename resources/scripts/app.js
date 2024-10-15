import domReady from '@roots/sage/client/dom-ready';
import Navbar from './components/Navbar';
import ETFSlider from './components/ETFSlider';
import ProcessSlider from './components/ProcessSlider';
import './contact-form';
import countries from './countries.json';
import './highchart.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  const SiteNav = new Navbar('.navbar');
  window.etfslider = new ETFSlider();
  window.processslider = new ProcessSlider();
  const faqItems = document.querySelectorAll('.faq-item');
  console.log(faqItems);

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

  const newsletterBtn = document.querySelector('.newsletter-btn');
  const newsletterForm = document.querySelector('.newsletter-form');

  newsletterBtn.addEventListener('click', function () {
    newsletterBtn.classList.toggle('active');
    newsletterForm.classList.toggle('open');
  });

  // If the user clicks outside the form, close it
  document.addEventListener('click', function (event) {
    if (
      !newsletterForm.contains(event.target) &&
      !newsletterBtn.contains(event.target)
    ) {
      newsletterBtn.classList.remove('active');
      newsletterForm.classList.remove('open');
    }
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
