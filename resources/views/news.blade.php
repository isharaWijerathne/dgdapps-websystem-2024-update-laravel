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

        <!-- Package Cart Start-->
        <div class="grid grid-cols-3">
            <x-public.news-cart />
            <x-public.news-cart />
            <x-public.news-cart />
            <x-public.news-cart />
            <x-public.news-cart />
            <x-public.news-cart />
            
        </div>
        <!-- Package Cart End-->
        
    </body>
    
    <footer>
         <!-- Fotter Start -->
         <x-public.main-fotter />
         <!-- Fotter End -->
    </footer>

</html>