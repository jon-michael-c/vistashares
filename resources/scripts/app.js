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
  if (document.getElementById('contact-form')) {
    function selectCountry(country) {
      document.getElementById('country').value = country;
    }

    let countriesData = countries.data;
    // Move US to the top of the list
    let us = countriesData.find(
      (country) => country.country === 'United States'
    );
    countriesData = countriesData.filter(
      (country) => country.country !== 'United States'
    );
    countriesData.unshift(us);

    const countrySelect = document.querySelector('.dropdown.country');

    function insertCountries(dropdown) {
      for (let i = 0; i < countriesData.length; i++) {
        let dropDownItem = document.createElement('div');
        dropDownItem.classList.add('dropdown-item');
        dropDownItem.textContent = countriesData[i].country;
        dropDownItem.addEventListener('click', function () {
          selectCountry(countriesData[i].country);
        });

        dropdown.querySelector('.dropdown-content').appendChild(dropDownItem);
      }
    }

    insertCountries(countrySelect);

    countrySelect.addEventListener('click', function () {
      countrySelect.classList.toggle('open');
    });

    document.addEventListener('click', function (event) {
      const dropdowns = document.querySelectorAll('.dropdown');
      const target = event.target;
      let isDropdown = false;
      dropdowns.forEach(function (dropdown) {
        if (dropdown.contains(target)) {
          isDropdown = true;
        } else {
          dropdown.classList.remove('open');
        }
      });
      if (!isDropdown) {
        dropdowns.forEach(function (dropdown) {
          dropdown.classList.remove('open');
        });
      }
    });
  }
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
