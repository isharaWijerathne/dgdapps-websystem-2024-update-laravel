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
    <p class=" m-3 text-blue-600 text-2xl  font-bold">Create New Package</p>
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


 <form action="{{ route("package-create") }}"   method="POST" enctype="multipart/form-data" >
  <div class="grid grid-cols-4 m-3 gap-2 bg-slate-100 rounded-md p-2">

    <!-- -->
    @csrf

    <!--Start Packege Type -->
     <div class="">
         <label for="">Package Type</label>
     </div>
     <div class="col-span-3">
        <div class="max-w-lx">
              <!-- Select -->
              <select name="package_type" data-hs-select='{
                 "placeholder": "Select option...",
                 "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                 "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                 "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                 "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                 "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                 "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
             }' class="hidden">
                 <option value="">Choose</option>
                 <option value="web" >Web Application</option>
                 <option value="mobile">Mobile Application</option>
                 <option value="desktop" >Desktop Application</option>
                 <option value="pre" >Premade Soulutions</option>
 
             </select>
              <!-- End Select -->
        </div>
     </div>
     <!--End Packege Type -->
 
     <!--Start Packege URL -->
     <div>
         <label for="">Package URL</label>
     </div>
     <div class="col-span-3">
         <div class="max-w-lx space-y-3">
             <input name="package_url" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
         </div>
     </div>
     <!--End Packege URL -->
 
 
     <!--Start Packege Header -->
     <div>
         <label for="">Package Header</label>
     </div>
     <div class="col-span-3">
         <div class="max-w-lx space-y-3">
             <input name="header" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
         </div>
     </div>
     <!--End Packege Header -->


      <!--Start Packege Header -->
      <div>
      <label for="">Card Header</label>
      </div>
      <div class="col-span-3">
          <div class="max-w-lx space-y-3">
              <input name="card_url" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
          </div>
      </div>
      <!--End Packege Header -->
 
 
     <!--Start Packege Body -->
     <div>
         <label for="">Package Body</label>
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
     <!--End Packege Body -->
 
 
     <!--Start Packege Price -->
     <div>
         <label for="">Package Price</label>
     </div>
     <div class="col-span-3">
         <div class="max-w-lx space-y-3">
             <input  name="price" type="text" inputmode="decimal" pattern="[0-9]*[.,]?[0-9]*"   min="0" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
         </div>
     </div>
     <!--End Packege Price -->
 
 
     <!--Start Packege Price -->
     <div>
         <label for="">Package Picture</label>
     </div>
     <div class="col-span-3">
        
         <div class="max-w-lx space-y-3">
           <input type="file"  name="imgs[]" multiple class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
         </div>

     </div>
     <!--End Packege Price -->
     
 
     <!-- Btn -->
     <div>
     </div>
     <div class="col-span-3 p-1">
         <button class="bg-red-500 rounded-lg text-white mt-2 p-2"  rel="noopener noreferrer">Clear</button>
         <button type="submit" class="bg-blue-500 rounded-lg text-white mt-2 p-2"  rel="noopener noreferrer">Create Package</button>
     </div>
     
 
 
  </div>
   
 </form>

  <!-- RictText script-->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  @vite('resources/js/RichText.js')  

  <!-- dropZone for input file -->
  @vite('node_modules/lodash/lodash.min.js')  
  @vite('node_modules/dropzone/dist/dropzone-min.js')  
  @vite('resources/js/fileupload.js')  



</body>
</html>