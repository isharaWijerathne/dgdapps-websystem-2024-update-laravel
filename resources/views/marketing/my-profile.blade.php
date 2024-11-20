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
    <x-marketing.marketing-header />
  <div class=" ">
    <p class=" m-3 text-blue-600 text-2xl  font-bold">My Profile</p>
  </div>

  <div class="grid grid-cols-2 m-10 gap-2 xl:mx-80 lg:mx-36  bg-slate-100 rounded-md p-2">

   <!--Start Marketing Picture -->
    <div class="">
      <!--Admin Picture Empty -->
    </div>
    <div class="flex justify-end ">
       <div class="max-w-lx">
            <!--Admin Picture  -->
            <img class="w-56 h-auto rounded-[100%] border-4 border-indigo-400 " src="https://pics.craiyon.com/2023-11-26/oMNPpACzTtO5OVERUZwh3Q.webp" alt="...">
       </div>
    </div>
    <!--End Marketing Picture  -->



    <!--Start First Name -->
    <div>
        <p class=" font-semibold ">First Name</p>
    </div>
    <div class="flex justify-end ">
        <div class="max-w-lx space-y-3">
            <p>Damindu Ishara</p>
        </div>
    </div>
    <!--End  First Name -->

    <!--Start Last Name -->
     <div>
        <p class=" font-semibold ">Last Name</p>
    </div>
    <div class="flex justify-end ">
        <div class="max-w-lx space-y-3">
            <p>Wijerathne</p>
        </div>
    </div>
    <!--End  Last Name -->


     <!--Start Email -->
     <div>
        <p class=" font-semibold ">Email</p>
    </div>
    <div class=" flex justify-end">
        <div class="max-w-lx space-y-3">
            <p>test@test.com</p>
        </div>
    </div>
    <!--End  Email -->


     <!--Start Account Status -->
     <div>
        <p class=" font-semibold ">Account Status</p>
    </div>
    <div class="flex justify-end ">
        <div class="max-w-lx space-y-3">
            <p>Active</p>
        </div>
    </div>
    <!--End  Account Status --> 

 
    

    <!-- Btn -->
    <div class="pt-5 pb-5">
        <a href="{{ route("marketing-password-change") }}" class="bg-blue-500 rounded-lg text-white p-2">Change Password</a>
    </div>
    <div class="p-1">
       
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