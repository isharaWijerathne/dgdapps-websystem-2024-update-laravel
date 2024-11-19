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
    <p class=" m-3 text-blue-600 text-2xl  font-bold">Edit Careers Post</p>
  </div>

  <div class="grid grid-cols-4 m-3 gap-2 bg-slate-100 rounded-md p-2">

      <!--Start Careers ID -->
    <div>
        <label for="">Careers Id</label>
    </div>
    <div class="col-span-3">
        <div class="max-w-lx space-y-3">
            <input type="text" readonly="true" value="PACK-00002" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
        </div>
    </div>
    <!--End Careers ID -->


    <!--Start Careers Header -->
    <div>
        <label for="">Careers Header</label>
    </div>
    <div class="col-span-3">
        <div class="max-w-lx space-y-3">
            <input type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
        </div>
    </div>
    <!--End Careers Header -->
    


    

    <!--Start Careers URL -->
    <div>
        <label for="">Careers URL</label>
    </div>
    <div class="col-span-3">
        <div class="max-w-lx space-y-3">
            <input type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
        </div>
    </div>
    <!--End Careers URL -->




    <!--Start Careers Body -->
    <div>
        <label for="">Careers Body</label>
    </div>
    <div class="col-span-3">
        <div class="max-w-lx space-y-3 p-2 bg-white rounded ">
            <div class="" id="editor">
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br /></p>
            </div>
            <input class=" w-[450px]" name="news_body"  type="hidden"  id="news_body_input"  placeholder="News Header"/>
        </div>
    </div>
    <!--End Careers Body -->



    <!-- Btn -->
    <div>
    </div>
    <div class="col-span-3 p-1">
        <button class="bg-red-500 rounded-lg text-white mt-2 p-2" href="http://" target="_blank" rel="noopener noreferrer">Clear</button>
        <button type="submit" class="bg-sky-500 rounded-lg text-white mt-2 p-2" href="http://" target="_blank" rel="noopener noreferrer">Update Careers</button>
    </div>
    


  </div>
  

  <!-- RictText script-->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  @vite('resources/js/RichText.js')  

  <!-- dropZone for input file -->
  @vite('node_modules/lodash/lodash.min.js')  
  @vite('node_modules/dropzone/dist/dropzone-min.js')  


</body>
</html>