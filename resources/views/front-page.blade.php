@extends('layouts.app')

@section('content')

@php
$cards = [
    [
        'title' => 'Pending Launch',
        'content' => [
            'Vistashares',
            'Electrification',
            'Supercycle ETF'
        ]
    ],
    [
        'title' => 'Pending Launch',
        'content' => [
            'VistaShares Artificial ',
            'Intelligence',
            'Supercycle ETF'
        ]
    ]
];
/*
VistaShares Artificial Intelligence Supercycle ETF 
*/
@endphp

<section class="hero full-width pt-12">
    <div class="gradient-bg full-width z-0"></div>
    <div class="">
        <h1 class="text-white uppercase max-w-[800px]">The Next Generation of Thematics is <br /> <span
                class="font-outline">on
                the
                Horizon.</span> </h1>
        <div class="md:flex md:pt-12 gap-8 justify-between">
            <p class="md:max-w-[395px]">VistaShares ETFs are true thematics, offering Pure Exposure™  to the economic
                supercycles
                poised to create
                significant
                investment value. Supercycles are long-term trends that disrupt current economic models through
                disruptive
                technological
                advancements shaping our world—including artificial intelligence and electrification.</p>
            <div class="md:max-w-[600px] py-12 md:py-0">
                <div class="flex flex-wrap md:flex-nowrap justify-center w-full gap-8 pb-4">
                    @foreach ($cards as $card)
                        <div
                            class="h-fit border border-indigo p-8 rounded-tl-lg rounded-br-lg w-full max-w-[277px] md:h-[177px]">
                            <h5 class="text-indigo">{{ $card['title']}}</h5>
                            @foreach ($card['content'] as $line)
                                <p>{{$line}}</p>
                            @endforeach
                        </div>
                    @endforeach 
        </div>
                <span class="text-indigo text-[14px] font-Grotesk">More information on the ETFs, including how to
                    invest, coming
                    soon.</span>
            </div>
        </div>
        <hr class="border-indigo my-12  md:my-24">
</section>
<section class="grid gap-3 md:gap-6 my-6">
    <div class="grid gap-3 md:gap-6 ">
        <h2>Invest confidently in the disruptors on the horizon of innovation.</h2>
        <h4 class="text-indigo font-bold uppercase">Connect with VistaShares and join us at the forefront.</h4>
        <p>Email us directly at <a class="underline hover:text-indigo" href="mailto:info@vistashares.com">info@VistaShares.com</a> or contact us through the form below.</p>

           
    </div>
    <div class="form-container bg-indigoLight text-midnight p-10 rounded-tr-lg rounded-bl-lg md:px-16">
        <form action="" class="">
            <div class="grid gap-6 md:grid-cols-2 md:gap-x-10">
                <div class="form-group col">
                    <label for="name">First Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group col">
                    <label for="name">Last Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="company">Company Name</label>
                    <input type="text" name="company" id="company" class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">Telephone Number</label>
                    <input type="tel" name="telephone" id="telephone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="country">Country/Region</label>
                    <div class="dropdown country">
                        <div class="dropdown-container">
                        <div class="arrow"></div>
                        <input type="text" id="country" name="country"
                            class="text-white form-control  block w-full rounded-md  "
                            readonly>
                        <div class="dropdown-content mt-1 rounded-md border "></div>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="investor-type">Investor Type</label>
                    <div class="dropdown investor-type">
                        <div class="dropdown-container">
                        <div class="arrow"></div>
                        <input type="text" id="investor-type" name="investor-type"
                            class="text-white form-control block w-full   "
                            readonly />
                        <div class="dropdown-content mt-1 "></div>
                        </div>
                    </div>
            </div>
           </div> 
            <div class="form-group mt-6">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control w-full min-h-[250px]"></textarea>
            </div>
            <div class="form-group mt-6">
                <button type="submit" class="btn btn-primary bg-gradient">Submit</button>
            </div>
    </div>
    </form>
    <script>
        function selectInvestorType(type) {
            document.getElementById('investor-type').value = type;
        }

        function insertItems (items, dropdown) {
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


    </script>
</section>
@endsection