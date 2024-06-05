document.addEventListener('DOMContentLoaded', function () {
  console.log('contact-form.js loaded');

  document
    .getElementById('contact-form')
    .addEventListener('submit', function (event) {
      event.preventDefault();

      let loader = document.querySelector('.loader');
      loader.style.display = 'block';
      let btn = document.querySelector('button[type="submit"]');
      btn.disabled = true;
      let formData = new FormData();
      formData.append('action', 'send_contact_email');
      formData.append('firstName', document.getElementById('firstName').value);
      formData.append('lastName', document.getElementById('lastName').value);
      formData.append('email', document.getElementById('email').value);
      formData.append('company', document.getElementById('company').value);
      formData.append('telephone', document.getElementById('telephone').value);
      formData.append('country', document.getElementById('country').value);
      formData.append(
        'investorType',
        document.getElementById('investor-type').value
      );
      formData.append('message', document.getElementById('message').value);

      let xhr = new XMLHttpRequest();
      xhr.open('POST', ajax_object.ajax_url, true);
      xhr.onload = function () {
        loader.style.display = 'none';
        if (xhr.status >= 200 && xhr.status < 400) {
          let response = JSON.parse(xhr.responseText);
          if (response.success) {
            document.getElementById('form-response').innerHTML =
              '<p>' + response.data + '</p>';
            document.getElementById('contact-form').reset();
          } else {
            document.getElementById('form-response').innerHTML =
              '<p>' + response.data + '</p>';
          }
        } else {
          console.log(xhr.responseText);
          btn.disabled = false;
          document.getElementById('form-response').innerHTML =
            '<p>There was an error sending your message. Please try again later.</p>';
        }
      };
      xhr.onerror = function () {
        console.log(xhr.responseText);
        document.getElementById('form-response').innerHTML =
          '<p>There was an error sending your message. Please try again later.</p>';
      };
      xhr.send(formData);
    });
});
