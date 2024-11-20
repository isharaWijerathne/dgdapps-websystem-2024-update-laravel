<div class="flex justify-between p-6 bg-white shadow-lg h-[80px]">
    <a href="{{ URL::to('/') }}">
        <p class=" text-white p-1 font-extrabold text-[20px] bg-green-400 ">DGD apps.</p>
    </a>
    <div>
        <li class="flex gap-28 ">
            <a  href="{{ URL::to('/') }}" class=" max-lg:hidden main__header__item">Home</a>
            <a  href="{{ route("packages") }}"  class=" max-lg:hidden main__header__item">Packages</a>
            <a  href="{{ route("news") }}" class=" max-lg:hidden main__header__item">News</a>
            <a  class=" max-lg:hidden main__header__item">D Studio</a>
            <a   href="{{ route("careers") }}"  class=" max-lg:hidden main__header__item">Careers</a>
        </li>
    </div>
    <div>
        <a href="{{ route("contact-us") }}" class=" max-lg:hidden p-1 bg-green-400 text-white  font-semibold rounded-[15px] mx-3 shadow-lg hover:bg-white hover:text-green-400">Contact Us</a>
        <button id="btn__nav__size" class="lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="28" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#000000" d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
        </button>
    </div>
</div>


<div id="mini__nav" class="lg:hidden hidden z-10">
    <div>
        <li class="gap-28">
            <div class="p-5 bg-slate-50 hover:bg-slate-100">
                <a href="{{ URL::to('/') }}" class="lg:hidden main__header__item">Home</a>
            </div>

            <div class="p-5 bg-slate-50 hover:bg-slate-100">
                <a   href="{{ route("packages") }}" class="lg:hidden main__header__item">Packages</a>
            </div>

            <div class="p-5 bg-slate-50 hover:bg-slate-100">
                <a   href="{{ route("news") }}" class="lg:hidden main__header__item">News</a>
            </div>

            <div class="p-5 bg-slate-50 hover:bg-slate-100">
                <a  class="lg:hidden main__header__item">D Studio</a>
            </div>
            <div class="p-5 bg-slate-50 hover:bg-slate-100">
                <a  href="{{ route("careers") }}" class="lg:hidden main__header__item">Careers</a>
            </div>

            <div class="p-5 bg-slate-50 hover:bg-slate-100">
                <a href="{{ route("contact-us") }}" class="lg:hidden main__header__item">Contact Us</a>
            </div>
        </li>
    </div>
</div>

@vite("resources/js/mininav.js")