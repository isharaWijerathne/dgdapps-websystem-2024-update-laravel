<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
    @vite("node_modules/preline/dist/preline.js")

    <!--Import Rich Text -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
</head>
<body>
    <x-admin.admin-header />
  <div class=" ">
    <p class=" m-3 text-blue-600 text-2xl  font-bold">Create News</p>
  </div>

    <!--Validatoer-->
      <div class=" m-2">
          
        @if(session('success'))
            <div class=" session__message space-y-5">
                <div class="bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4 dark:bg-teal-800/30" role="alert" tabindex="-1" aria-labelledby="hs-bordered-success-style-label">
                <div class="flex">
                    <div class="shrink-0">
                    <!-- Icon -->
                    <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-400">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </span>
                    <!-- End Icon -->
                    </div>
                    <div class="ms-3">
                    <h3 id="hs-bordered-success-style-label" class="text-gray-800 font-semibold dark:text-white">
                        Successfully updated.
                    </h3>
                    <p class="text-sm text-gray-700 dark:text-neutral-400">
                        {{ session('success') }}
                    </p>
                    </div>
                </div>
            </div> 
        @endif

        @if(session('error'))
            <div class=" session__message bg-red-50 border-s-4 border-red-500 p-4 dark:bg-red-800/30" role="alert" tabindex="-1" aria-labelledby="hs-bordered-red-style-label">
                <div class="flex">
                <div class="shrink-0">
                    <!-- Icon -->
                    <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-400">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                    </span>
                    <!-- End Icon -->
                </div>
                    <div class="ms-3">
                    <h3 id="hs-bordered-red-style-label" class="text-gray-800 font-semibold dark:text-white">
                        Error!
                    </h3>
                    <p class="text-sm text-gray-700 dark:text-neutral-400">
                        {{ session('error') }}
                    </p>
                    </div>
                    </div>
                </div>
            </div>
        @endif

        <script>
            const errDiv = document.getElementsByClassName("session__message");
            if(errDiv.length != 0){
                let hiddenInterval = setInterval(() =>{
                errDiv[0].classList.add("hidden");
                clearInterval(hiddenInterval);
                },8000)
            }
        </script>

      </div>

      <form action="{{ route("create-news") }}" method="post" enctype="multipart/form-data" >
        <div class="grid grid-cols-4 m-3 gap-2 bg-slate-100 rounded-md p-2">

            @csrf
            <!--Start News Header -->
            <div>
                <label for="">News Header</label>
            </div>
            <div class="col-span-3">
                <div class="max-w-lx space-y-3">
                    <input name="header" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
                </div>
            </div>
            <!--End News Header -->

              <!--Start News Card Header -->
              <div>
              <label for="">News Card Header</label>
              </div>
              <div class="col-span-3">
                  <div class="max-w-lx space-y-3">
                      <input name="card_header" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
                  </div>
              </div>
              <!--End News Card Header -->



            <!--Start News URL -->
            <div>
                <label for="">News URL</label>
            </div>
            <div class="col-span-3">
                <div class="max-w-lx space-y-3">
                    <input name="news_url" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
                </div>
            </div>
            <!--End News URL -->


        


            <!--Start News Body -->
            <div>
                <label for="">News Body</label>
            </div>
            <div class="col-span-3">
                <div class="max-w-lx space-y-3 p-2 bg-white rounded ">
                    <div class="" id="editor">
                        <p>Hello World!</p>
                        <p>Some initial <strong>bold</strong> text</p>
                        <p><br /></p>
                    </div>
                    <input class=" w-[450px]" name="body"  type="hidden"  id="body"  placeholder="News Header"/>
                </div>
            </div>
            <!--End News Body -->


            <!--Start News Picture  -->
            <div>
                <label for="">News Picture</label>
            </div>
            <div class="col-span-3">
              <div class="max-w-lx space-y-3">
                <input type="file"  name="imgs[]" multiple class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
              </div>
            </div>
            <!--End News Picture -->
            

            <!-- Btn -->
            <div>
            </div>
            <div class="col-span-3 p-1">
                <button class="bg-red-500 rounded-lg text-white mt-2 p-2" href="http://" target="_blank" rel="noopener noreferrer">Clear</button>
                <button type="submit" class="bg-blue-500 rounded-lg text-white mt-2 p-2" href="http://" target="_blank" rel="noopener noreferrer">Create News</button>
            </div>
        


        </div>
      </form> 
  

  <!-- RictText script-->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  @vite('resources/js/RichText.js')  

  <!-- dropZone for input file -->
  @vite('node_modules/lodash/lodash.min.js')  
  @vite('node_modules/dropzone/dist/dropzone-min.js')  


</body>
</html>