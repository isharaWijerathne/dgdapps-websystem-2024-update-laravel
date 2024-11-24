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
    <p class=" m-3 text-blue-600 text-2xl  font-bold">Edit Package</p>
  </div>

  <form action="{{ route("edit-package-post") }}" method="post" enctype="multipart/form-data" >
      <div class="grid grid-cols-4 m-3 gap-2 bg-slate-100 rounded-md p-2">
        @csrf
    
        <!--Start Packege ID -->
        <div>
            <label for="">Package Id</label>
        </div>
        <div class="col-span-3">
            <div class="max-w-lx space-y-3">
                <input name="package_id" type="text" readonly="true" value="{{ $package->package_id }}" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
            </div>
        </div>
        <!--End Packege ID -->


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
                <option value="{{ $package->package_type }}">Current value : {{ $package->package_type }}</option>
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
                <input name="package_url" value="{{ $package->header }}" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
            </div>
        </div>
        <!--End Packege URL -->


        <!--Start Packege Header -->
        <div>
            <label for="">Package Header</label>
        </div>
        <div class="col-span-3">
            <div class="max-w-lx space-y-3">
                <input name="header"  value="{{ $package->header }}" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
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
                    {!! $package->body !!}
                </div>
                <input name="body" class=" w-[450px]" name="body"  type="hidden"  id="body"  placeholder="News Header"/>
            </div>
        </div>
        <!--End Packege Body -->

        <!--Start Card URL  -->
        <div>
            <label for="">Package Card Url</label>
        </div>
        <div class="col-span-3">
            <div class="max-w-lx space-y-3">
                <input name="card_url" value="{{ $package->card_url }}" type="text"  class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
            </div>
        </div>
        <!--End Card URL  -->


        <!--Start Packege Price -->
        <div>
            <label for="">Package Price</label>
        </div>
        <div class="col-span-3">
            <div class="max-w-lx space-y-3">
                <input name="price" value="{{ $package->price }}" type="text" inputmode="decimal" pattern="[0-9]*[.,]?[0-9]*"   min="0" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
            </div>
        </div>
        <!--End Packege Price -->


        <!--Start pic input -->
        <div>
            <label for="">Package Picture</label>
        </div>
        <div class="col-span-3">
          <input type="file"  name="imgs[]" multiple class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>  
        </div>
        <!--End pic input -->
   

        <!-- Show Pic -->
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
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Picture Id</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Img</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Status</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                          </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                          @foreach ($pics as $picsItem)
                          <tr>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $picsItem->package_imgs_id }}</td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                  <img class="w-32 h-auto border rounded" src="{{ asset('storage/uploads/package_imgs/'.$picsItem->package_id.'/' . $picsItem->img_location) }}" alt="{{ $picsItem->package_imgs_id }}">
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                  {{ $picsItem->is_active == true ? "Active" : "Deactive" }}
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                <div>
                                  <form action="{{ route("package-img-change-status") }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $picsItem->package_imgs_id }}" />
                                    <button type="submit"  class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 focus:outline-none focus:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400 dark:focus:text-yellow-400">Change status</button>

                                  </form>
                                </div>
                                
                                <div>

                                  <form action="{{ route("package-img-delete") }}" method="POST" >
                                    @method("DELETE")
                                    @csrf

                                      <input type="hidden" name="package_imgs_id" value="{{ $picsItem->package_imgs_id }}" />
                                      <input type="hidden" name="package_id" value="{{ $picsItem->package_id }}" />
                                      <input type="hidden" name="img_location" value="{{ $picsItem->img_location }}" />
                                    <button type="submit" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>

                                  </form>
                                </div>
                        
                              </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>

        </div>
    


        <!-- Btn -->
        <div>
        </div>
        <div class="col-span-3 p-1">
            <button class="bg-red-500 rounded-lg text-white mt-2 p-2" href="http://" target="_blank" rel="noopener noreferrer">Clear</button>
            <button type="submit" class="bg-sky-500 rounded-lg text-white mt-2 p-2" href="http://" target="_blank" rel="noopener noreferrer">Update Package</button>
    </div>
  </form>


  </div>
  

  <!-- RictText script-->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  @vite('resources/js/RichText.js')  

  <!-- dropZone for input file -->
  @vite('node_modules/lodash/lodash.min.js')  
  @vite('node_modules/dropzone/dist/dropzone-min.js')  


</body>
</html>