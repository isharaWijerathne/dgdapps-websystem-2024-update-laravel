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
    <p class=" m-3 text-blue-600 text-2xl  font-bold">Edit News</p>
  </div>

    <form action="{{ route("edit-news-post") }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="grid grid-cols-4 m-3 gap-2 bg-slate-100 rounded-md p-2">

          <!--Start News ID -->
        <div>
            <label for="">News Id</label>
        </div>
        <div class="col-span-3">
            <div class="max-w-lx space-y-3">
                <input name="news_id" type="text" readonly="true" value="{{ $news->news_id }}" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
            </div>
        </div>
        <!--End News ID -->


        <!--Start News Header -->
        <div>
            <label for="">News Header</label>
        </div>
        <div class="col-span-3">
            <div class="max-w-lx space-y-3">
                <input name="header" value="{{ $news->header }}" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
            </div>
        </div>
        <!--End News Header -->
        


        

        <!--Start News Header URL -->
        <div>
            <label for="">Header URL</label>
        </div>
        <div class="col-span-3">
            <div class="max-w-lx space-y-3">
                <input name="header_url"  value="{{$news->header_url}}" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
            </div>
        </div>
        <!--End News Header URL -->


        <!--Start News Card URL -->
        <div>
          <label for="">News Card Header</label>
        </div>
        <div class="col-span-3">
          <div class="max-w-lx space-y-3">
              <input name="news_card_header"  value="{{ $news->news_card_header }}" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
          </div>
        </div>
        <!--End News Card URL -->





        <!--Start News Body -->
        <div>
            <label for="">News Body</label>
        </div>
        <div class="col-span-3">
            <div class="max-w-lx space-y-3 p-2 bg-white rounded ">
                <div class="" id="editor">
                  {!! $news->body !!}
                </div>
                <input class=" w-[450px]" name="body"  type="hidden"  id="body"  placeholder="News Header"/>
            </div>
        </div>
        <!--End News Body -->



        <!--Start News Picture -->
        <div>
            <label for="">News Picture</label>
        </div>
        <div class="col-span-3">
          <div class="max-w-lx space-y-3">
            <input type="file"  name="imgs[]" multiple class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"/>
          </div>
        </div>
        <!--End News Picture -->
        

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
                          @foreach ($pics as $pic)
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $pic->news_imgs_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                <img class="w-32 h-auto border rounded" src="{{ asset('storage/uploads/news_imgs/'.$pic->news_id.'/' . $pic->img_location) }}" alt="{{ $pic->news_imgs_id }}" />
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                              {{ $pic->is_active == true ? "Active" : "Deactive" }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                              <div>
                                <form  method="post" action="{{ route("news-img-change-status") }}">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $pic->news_imgs_id }}" />
                                  <button type="submit"  class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 focus:outline-none focus:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400 dark:focus:text-yellow-400">Change status</button>

                                </form>
                              </div>
                              
                              <div>

                                <form  method="POST"  action="{{ route("news-img-delete") }}" >
                                  @method("DELETE")
                                  @csrf

                                    <input type="hidden" name="news_imgs_id" value="{{ $pic->news_imgs_id }}" />
                                    <input type="hidden" name="news_id" value="{{ $pic->news_id }}" />
                                    <input type="hidden" name="img_location" value="{{ $pic->img_location }}" />
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
            <button type="submit" class="bg-sky-500 rounded-lg text-white mt-2 p-2" href="http://" target="_blank" rel="noopener noreferrer">Update News</button>
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