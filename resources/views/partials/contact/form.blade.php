 <form id="contact-form" class="">
     <div class="grid gap-6 ">
         <div class="form-group col">
             <label for="firstName">First Name *</label>
             <input required type="text" name="firstName" id="firstName" class="form-control">
         </div>
         <div class="form-group col">
             <label for="lastName">Last Name *</label>
             <input required type="text" name="lastName" id="lastName" class="form-control">
         </div>
         <div class="form-group">
             <label for="email">Email Address *</label>
             <input required type="email" name="email" id="email" class="form-control">
         </div>
         <div class="form-group">
             <label for="company">Company Name *</label>
             <input type="text" name="company" id="company" class="form-control" required>
         </div>
         <div class="form-group">
             <label for="telephone">Telephone Number</label>
             <input type="tel" name="telephone" id="telephone" class="form-control">
         </div>
         <div class="form-group">
             <label for="country">State/Region</label>
             <div class="dropdown country">
                 <div class="dropdown-container">
                     <div class="arrow"></div>
                     <input type="text" id="country" name="country" class="form-control  block w-full rounded-md  "
                         placeholder="-- Select --" readonly>
                     <div class="dropdown-content "></div>
                 </div>
             </div>
         </div>
         <div class="form-group ">
             <label for="investor-type">Investor Type *</label>
             <div class="dropdown investor-type">
                 <div class="dropdown-container">
                     <div class="arrow"></div>
                     <input type="text" id="investor-type" name="investor-type" class=" form-control block w-full"
                         placeholder="-- Select --" required readonly />
                     <div class="dropdown-content mt-1 "></div>
                 </div>
             </div>
         </div>
     </div>
     <div class="form-group mt-6">
         <label for="message">Message</label>
         <textarea name="message" id="message" class="form-control w-full min-h-[250px]"></textarea>
     </div>
     <div class="form-group mt-6 flex items-center gap-8">
         <button type="submit" class="btn btn-primary bg-gradient">Submit</button>

         <div class="loader"></div>

         <div id="form-response"></div>
     </div>
     </div>
 </form>
 <script>
     function selectInvestorType(type) {
         let investorInput = document.getElementById('investor-type');
         investorInput.value = type;
         let companyInput = document.getElementById('company');
         let companyLabel = document.querySelector('label[for="company"]');
         if (investorInput.value == 'Individual Investor') {
             companyInput.removeAttribute('required');
             companyLabel.textContent = 'Company Name';
         } else {
             companyInput.setAttribute('required', '');
             companyLabel.textContent = 'Company Name *';
         }
     }

     function insertItems(items, dropdown) {
         items.forEach(item => {
             const dropdownItem = document.createElement('div');
             dropdownItem.classList.add('dropdown-item');
             dropdownItem.textContent = item;
             dropdownItem.addEventListener('click', () => {
                 selectInvestorType(item);
                 dropdown.classList.toggle('open');
                 dropdown.classList.toggle('open');
             });
             dropdown.querySelector('.dropdown-content').appendChild(dropdownItem);
         });
     }

     const investorItems = [
         'Investment Professional',
         'Institutional Investor',
         'Registered Investment Advisor',
         'Financial Advisor',
         'Due Diligence Analyst',
         'Individual Investor',
         'Media'
     ]

     const investorDropdown = document.querySelector('.dropdown.investor-type');
     const investorDropdownContent = investorDropdown.querySelector('.dropdown-content');
     insertItems(investorItems, investorDropdown);


     investorDropdown.addEventListener('click', () => {
         investorDropdown.classList.toggle('open');
     });

     let investorInput = document.getElementById('investor-type');
     let companyInput = document.getElementById('company');
     // Watch for changes in the investor type input
     investorInput.addEventListener('change', () => {
         console.log(investorInput.value);
         // If the investor type is Individual Investor, company input not required
         if (investorInput.value == 'Individual Investor') {
             companyInput.removeAttribute('required');
         } else {
             companyInput.setAttribute('required', '');
         }
     });
 </script>
