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
    <p class=" m-3 text-blue-600 text-2xl  font-bold">Marketing Manager Activity</p>
  </div>

  <div class="grid grid-cols-4 m-3 gap-2 bg-slate-100 rounded-md p-2">

      <!--Start Packege ID -->
    <div>
        <label for="">Marketing Manager ID</label>
    </div>
    <div class="col-span-3">
        <div class="max-w-lx space-y-3">
            <input type="text"  value="PACK-00002" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
        </div>
    </div>
    <!--End Packege ID -->


    <div>
    </div>
    <div class="col-span-3 p-1">
        <button class="bg-red-500 rounded-lg text-white mt-2 p-2" href="http://" target="_blank" rel="noopener noreferrer">Clear</button>
        <button type="submit" class="bg-sky-500 rounded-lg text-white mt-2 p-2" href="http://" target="_blank" rel="noopener noreferrer">Track Marketing Manager</button>
    </div>
    
    

  


    
     <!-- Show Marketing Reply -->
    <div>
    </div>
    <div class="col-span-3 p-1">

        <!-- Table -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                  <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead>
                      <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Customer Contact Id</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Customer Name</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Email</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Contact Number</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Is Replied</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Marketing Manager</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Marketing Answer</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">CUS-001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">Roshan Ranawana</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">test@admin.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">071-111-111-1-11</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">True</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">MAK-0002</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                          successfuly customer aggreied
                        </td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

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