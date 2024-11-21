<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Packege List</title>
    @vite('resources/css/app.css')
    @vite("node_modules/preline/dist/preline.js")

    <!--Import Rich Text -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
</head>
<body>
    <x-admin.admin-header />
  <div class=" ">
    <p class=" m-3 text-blue-600 text-2xl  font-bold">Careers List</p>
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




  <div class="m-2 bg-slate-100 p-1 rounded border">
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Id</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Header</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Header Url</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Body</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Seat</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Closing Date</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Status</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                  </tr>
              </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                  @foreach ($careers as $item)
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $item->careers_id}}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $item->header }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $item->header_url }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                        <div>
                          {{!! $item->body !!}}
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $item->seat }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $item->closing_date }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $item->is_active == true ? "Active" : "Deactive" }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                        <div>
                          <form action="{{  route("delete-careers") }}"  method="POST" >
                            <!--CSRF-->
                            @csrf

                            <!--Method-->
                            @method('DELETE')
                              <input type="hidden" name="id" value="{{$item->careers_id}}" />
                              <button type="submit" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                          </form>
                        </div>
                        <div>
                          <a href="{{ route("edit-careers",$item->careers_id) }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-green-800 focus:outline-none focus:text-green-800 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:hover:text-green-400 dark:focus:text-green-400">Edit</a>
                        </div>
                        <div>
                          <form action="{{ route("change-status") }}" method="POST">

                             <!--CSRF-->
                             @csrf

                             <!--Method-->
                             @method('PUT')
                             <input type="hidden" name="id" value="{{$item->careers_id}}" />
                             <button type="submit" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 focus:outline-none focus:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400 dark:focus:text-yellow-400">Change status</button>
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


  <!--pagination -->
  <div class="mx-5 ">
    {{ $careers->links()}}
  </div>
  

  <!-- RictText script-->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  {{-- @vite('resources/js/RichText.js')   --}}

  <!-- dropZone for input file -->
  @vite('node_modules/lodash/lodash.min.js')  
  @vite('node_modules/dropzone/dist/dropzone-min.js')  


</body>
</html>