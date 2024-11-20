<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DGD Apps</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Preline-->
        @vite("node_modules/preline/dist/preline.js")


        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet"/>
       
    </head>
    <body>
        <!-- Public Heaer Start -->
        <x-public.main-header />
        <!-- Public Heaer End -->
        

        <!-- First add cart Start -->
        <div class="main__holder lg:grid lg:grid-cols-2 bg-emerald-50 lg:p-16 ">
            <div class="lg:flex lg:justify-center max-lg:justify-start  h-full max-lg:bg-emerald-50 ">
                 <div class="content-center max-lg:grid max-lg:grid-cols-1 max-lg:justify-items-center max-lg:p-16 ">
                     <h2 class="text-[40px]">Great <span class="text__pink__double">Product</span>  is</h2>
                     <h1 class="text__for__main"> <span class="text__for__main__bolt">built by great  </span><span class="text__pink__double">teams</span> </h1>
                     <p>We help build and manage a team of world-class developers</p>
                     <p>to bring your vision to life</p>
                     <button class="bg-emerald-500 hover:bg-emerald-300 mt-5 p-2 rounded text-white">Let's get started!</button>
                 </div>
            </div>
            <div class="flex justify-center h-full">
                 <div class="content-center">
                     <img class=" wall__img h-auto h-max-[500px]  max-lg:hidden " src="{{ Vite::asset('resources/img/wall_img.jpg') }}" alt="dgd apps"/>
                 </div>
            </div>
        </div>
        <!-- First add cart End -->



        <!-- Service Cart Start-->
       <div>
            <div class="w-full h-[500px-] border p-4">
                <div>
                    <p class="text-center my-7 font-extrabold text-[30px] text-green-500 ">Here’s What We Provide to Support Your Goals</p>
                </div>

                <div class="grid grid-cols-2 max-lg:grid-cols-1 w-auto gap-4 p-5 justify-items-center ">

                    <div class="w-[400px] h-auto rounded-xl bg-white  border-[1px] border-red-400">
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-1">
                                <img class="w-[50px]" src="{{ Vite::asset('resources/img/web-app.png') }}" alt="webApp">
                            </div>
                        </div>
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-1">
                                <span class="text__pink__double text-[25px] font-extrabold text-center">Web Design and Development</span> 
                            </div>
                        </div>
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-4">
                                <p class="text-justify p-1  font-txtmain ">We create dynamic, user-friendly websites tailored to your business needs. Our services include responsive design, SEO optimization, and cutting-edge technologies to ensure high performance and engagement. Whether you're starting fresh or enhancing an existing site, we bring your vision to life.</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-[400px] h-auto rounded-xl bg-white  border-[1px] border-yellow-400">
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-1">
                                <img class="w-[50px]" src="{{ Vite::asset('resources/img/mobile-app.png') }}" alt="mobileApp">
                            </div>
                        </div>
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-1">
                                <span class="text__pink__double text-[25px] font-extrabold text-center">Mobile Application Development</span> 
                            </div>
                        </div>
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-4">
                                <p class="text-justify p-1 font-txtmain ">Transform your ideas into powerful mobile applications. Our expert team designs and develops feature-rich apps for iOS and Android, ensuring seamless user experiences and reliable performance. From concept to deployment, we deliver apps that meet your goals and exceed expectations.</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-[400px] h-auto rounded-xl bg-white  border-[1px] border-cyan-400">
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-1">
                                <img class="w-[50px]" src="{{ Vite::asset('resources/img/desktop-app.png') }}" alt="desktopApp">
                            </div>
                        </div>
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-1">
                                <span class="text__pink__double text-[25px] font-extrabold text-center">Desktop Application Development</span> 
                            </div>
                        </div>
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-4">
                                <p class="text-justify p-1 font-txtmain ">Empower your business with robust desktop applications. We specialize in creating scalable, secure, and efficient software solutions tailored to your requirements. Our team ensures that your app integrates seamlessly with existing systems, boosting productivity and streamlining workflows.</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-[400px] h-auto rounded-xl bg-white  border-[1px] border-green-400">
                        <div class="w-[400px]rounded-x flex justify-center"> 
                            <div class="col-span-3 p-1">
                                <img class="w-[50px]" src="{{ Vite::asset('resources/img/uxui.png') }}" alt="uxui">
                            </div>
                        </div>
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-1">
                                <span class="text__pink__double text-[25px] font-extrabold text-center">UX and UI Design</span> 
                            </div>
                        </div>
                        <div class="w-[400px] rounded-x flex justify-center"> 
                            <div class="col-span-3 p-4">
                                <p class="text-justify p-1 font-txtmain ">Deliver exceptional user experiences with our UX/UI design expertise. We focus on intuitive interfaces, modern aesthetics, and user-centered design principles to create products that engage and delight. Enhance usability and elevate your brand with designs that resonate with your audience.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Service Cart Start-->


        <!-- Feedback Container Start -->
        <div class="p-2 m-2 ">

            <!-- Text container-->
            <div>
                <p class="text-center mt-7 font-extrabold text-[25px] text-green-500 ">Why customers love</p>
                <p class="text-center mb-7 font-extrabold text-[30px] text-green-500 ">working with us</p>

            </div>

            <!-- Grid Container -->
            <div class=" lg:grid lg:grid-cols-2 bg-green-50 max-lg:p-3 ">
                <div>
                    <img class=" feedback__img h-auto h-max-[500px]  max-lg:hidden " src="{{ Vite::asset('resources/img/cus_feedback.jpg') }}" alt="dgd apps"/>

                </div>
                <div class="grid grid-cols-3 justify-items-center   content-center ">
                    <!--left btn -->
                    <div class="flex">
                        <button class="">
                            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="20" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                        </button>
                    </div>

                    <!--commnet-->
                    <div>
                        <p class="text-center text-violet-500 font-extrabold ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati, accusamus laboriosam sapiente consectetur voluptatem ut animi cupiditate harum magnam aspernatur deleniti enim! Consequuntur nesciunt debitis obcaecati. Esse ipsa quasi fugiat.</p>

                        <p class=" mt-8 text-center font-extrabold">Ishara wijetathe</p>
                        <p class="text-center font-extrabold">Software enginerr</p>
                    </div>
                    
                    <!--right btn -->
                    <div class="flex">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="20" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <!-- Feedback Container End -->

        <!--our stack -->
        <div>
            
            <!--header -->
            <div>
                <p class="text-center mt-7 font-extrabold text-[25px] text-green-500 ">Our</p>
                <p class="text-center mb-7 font-extrabold text-[30px] text-green-500 ">Tech Stack</p>
            </div>

            <!-- tab -->
            <div class="overflow-hidden my-16">
                <div class="border-b border-gray-200 dark:border-neutral-700">
                    <nav class="-mb-0.5 flex justify-center gap-x-6" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                      <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-emerald-600 hs-tab-active:text-emerald-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-emerald-600 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-emerald-500 active" id="horizontal-alignment-item-1" aria-selected="true" data-hs-tab="#horizontal-alignment-1" aria-controls="horizontal-alignment-1" role="tab">
                        Backend
                      </button>
                      <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-emerald-600 hs-tab-active:text-emerald-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-emerald-600 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-emerald-500" id="horizontal-alignment-item-2" aria-selected="false" data-hs-tab="#horizontal-alignment-2" aria-controls="horizontal-alignment-2" role="tab">
                        Frontend
                      </button>
                      <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-emerald-600 hs-tab-active:text-emerald-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-emerald-600 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-emerald-500" id="horizontal-alignment-item-3" aria-selected="false" data-hs-tab="#horizontal-alignment-3" aria-controls="horizontal-alignment-3" role="tab">
                        Databases
                      </button>
                      <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-emerald-600 hs-tab-active:text-emerald-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-emerald-600 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-emerald-500" id="horizontal-alignment-item-4" aria-selected="false" data-hs-tab="#horizontal-alignment-4" aria-controls="horizontal-alignment-4" role="tab">
                        Other
                      </button>
                    </nav>
                </div>
                  
                  <div class="mt-3">
                    <div id="horizontal-alignment-1" role="tabpanel" aria-labelledby="horizontal-alignment-item-1">
                        <div class="flex justify-center">
                            <img class="w-32 h-auto" src="https://www.svgrepo.com/download/303360/nodejs-logo.svg" alt="...">
                            <img class="w-32 h-auto" src="https://ih1.redbubble.net/image.366684650.5673/aps,840x830,small,transparent-pad,1000x1000,f8f8f8.u2.jpg" alt="...">
                            <img class="w-32 h-auto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJIZSV6WytXnbqL37Z7iDhoi8kwsxPd28QQw&s" alt="...">
                            <img class="w-32 h-auto" src="https://www.etatvasoft.com/public/images/express-main-logo-hexa.svg" alt="...">
                            <img class="w-32 h-auto" src="https://javapro.io/wp-content/uploads/2024/04/SpringBoot-Logo-qu.png" alt="...">
                        </div>
                    </div>
                    <div id="horizontal-alignment-2" class="hidden" role="tabpanel" aria-labelledby="horizontal-alignment-item-2">
                        <div class="flex justify-center">
                            <img class="w-32 h-auto" src="https://static-00.iconduck.com/assets.00/react-icon-512x512-u6e60ayf.png" alt="...">
                            <img class="w-32 h-auto" src="https://dwglogo.com/wp-content/uploads/2017/03/AngularJS_logo_004.svg" alt="...">
                            <img class="w-32 h-auto" src="https://media.licdn.com/dms/image/D4D12AQHYf8u60bN13w/article-cover_image-shrink_720_1280/0/1704213633923?e=2147483647&v=beta&t=4iWTLpC0faZoBeNZxeA-kAbwmjX25LFIGQSY1uvSvxw" alt="...">
                            

                        </div>
                    </div>
                    <div id="horizontal-alignment-3" class="hidden" role="tabpanel" aria-labelledby="horizontal-alignment-item-3">
                        <div class="flex justify-center">
                            <img class="w-32 h-auto" src="https://cdn-icons-png.flaticon.com/512/5968/5968554.png" alt="...">
                            <img class="w-32 h-auto" src="https://www.svgrepo.com/show/303251/mysql-logo.svg" alt="...">
                            <img class="w-32 h-auto" src="https://cdn.iconscout.com/icon/free/png-256/free-mongodb-logo-icon-download-in-svg-png-gif-file-formats--wordmark-programming-langugae-freebies-pack-logos-icons-1175140.png?f=webp" alt="...">
                        </div>
                    </div>
                    <div id="horizontal-alignment-4" class="hidden" role="tabpanel" aria-labelledby="horizontal-alignment-item-4">
                        <div class="flex justify-center">
                            <img class="w-32 h-auto" src="https://static-00.iconduck.com/assets.00/sdk-react-native-icon-512x490-ynyk8t4w.png" alt="...">
                            <img class="w-32 h-auto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWOYMtSMKxVApuqB5E7IjY9KuS15wUF4jtYg&s" alt="...">
                            <img class="w-32 h-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Android_Studio_icon_%282023%29.svg/2048px-Android_Studio_icon_%282023%29.svg.png" alt="...">
                            <img class="w-32 h-auto" src="https://devblogs.microsoft.com/dotnet/wp-content/uploads/sites/10/2021/10/shadow.png" alt="...">
                        </div>
                    </div>
                  </div>
                </div>
        </div>


        <!-- Hier cart Start-->
            <div class="my-8 p-2">

                  <!-- Text container-->
                <div>
                    <p class="text-center mt-7 font-extrabold text-[25px] text-green-500 ">How development</p>
                    <p class="text-center mb-7 font-extrabold text-[30px] text-green-500 ">through Alkaline works</p>
                </div>

                <div class="flex justify-center">
                    <div class="mx-32">
                        <img src="{{ Vite::asset('resources/img/work_plan.png') }}" alt="work_plane"/>
                    </div>
                </div>

            </div>

        <!-- Hier cart End -->

        <!-- Fotter Start -->
            <x-public.main-fotter />
        <!-- Fotter End -->

    </body>
</html>
