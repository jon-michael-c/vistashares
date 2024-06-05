import domReady from '@roots/sage/client/dom-ready';
import './contact-form';
import countries from './countries.json';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...

  function selectCountry(country) {
    document.getElementById('country').value = country;
  }

  let countriesData = countries.data;
  // Move US to the top of the list
  let us = countriesData.find((country) => country.country === 'United States');
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
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
