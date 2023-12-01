<!-- Main modal -->
<!-- ADD PRODUCT MODAL -->
<div id="addProductModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 hidden right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] bg-gray-700 bg-opacity-50 h-full">
    <div class="flex items-center justify-center 2xl:mx-[34%] xl:mx-[20%] lg:mx-[20%] md:mx-[15%] max-w-2xl h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                    Add Products
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-black" data-modal-hide="defaultModal">
                    <i id="xbtn" class="fa-solid fa-xmark p-1"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            @if($errors->any())
            <div class="text-red-700">
                @foreach($errors->all() as $error)
                    <div class="bg-red-400">{{$error}}</div>
                @endforeach
            </div>

            @endif
            <!-- Modal body -->
            <form action="{{ url('admin/addProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-6 space-y-6">
                    <div class="tab-trigger">
                        <ul class="bg-gray-600">
                            <li class=" inline-block border-x-0 border-b-2 border-t-0 border-transparent px-12 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-white hover:text-gray-800 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent duration-300 cursor-pointer rounded-md ml-4">DETAILS</li>
        
                            <li class=" inline-block border-x-0 border-b-2 border-t-0 border-transparent px-12 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-white hover:text-gray-800 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent duration-300 cursor-pointer rounded-md ml-4">SEO Tags</li>
            
                            <li class=" inline-block border-x-0 border-b-2 border-t-0 border-transparent px-12 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-white hover:text-gray-800 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent duration-300 cursor-pointer rounded-md ml-4">PRICE</li>
                            
                            <li class=" inline-block border-x-0 border-b-2 border-t-0 border-transparent px-12 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-white hover:text-gray-800 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent duration-300 cursor-pointer rounded-md ml-4">Product Images</li>
                        </ul>
                    </div>
                    <div class="relative bottom-[10px]">
                        <!--HOME-->
                        <div class="tab-content-box text-md text-black p-6">
                            <div class="flex">
                                <div class="mb-6 mr-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Product Name</label>
                                    <input type="text" name="product_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Product Name" required>
                                </div>
                                <div class="mb-6">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Slug</label>
                                    <input type="text" name="slug" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Slug" required>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="mb-6 mr-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Category</label>
                                    <select id="countries" name="category_id" class="bg-gray-50 w-[350px] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                                        <option selected disabled>Select Categories</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-6">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Product Brand</label>
                                    <select name="brand" class="bg-gray-50 border border-gray-300 w-[350px] text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                                        <option selected disabled>Select Brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6 mr-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Color</label>
                                    <input type="text" name="color" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Product Name" required>
                                </div>
                            <div class="col-span-full">
                                <label for="about" class="block text-sm text-black font-medium leading-6 text-gray-900">Small Description</label>
                                <div class="mt-2">
                                    <textarea id="about" name="small_description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6 bg-gray-50" placeholder="Enter Product Desription"></textarea>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="about" class="block text-sm text-black font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                    <textarea id="about" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6 bg-gray-50" placeholder="Enter Product Desription"></textarea>
                                </div>
                            </div>
                            <div class="ml-[550px] mt-6">
                                <label class="text-sm font-medium text-black">Proceed to SEO TAGS <i class="fa-solid fa-angle-right ml-2"></i></label>
                            </div>
                        </div>
                        <!--SEO TAGS-->
                        <div class="tab-content-box hidden text-md text-black p-6">
                            <div class="flex">
                                <div class="mb-6 mr-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Meta Title</label>
                                    <input type="text" name="meta_title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Meta Title" required>
                                </div>
                                <div class="mb-6 mr-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Meta Keyword" required>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="about" class="block text-sm text-black font-medium leading-6 text-gray-900">Meta Description</label>
                                <div class="mt-2">
                                    <textarea id="about" name="meta_description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6 bg-gray-50" placeholder="Enter Meta Desription"></textarea>
                                </div>
                                <div class="ml-[585px] mt-6">
                                    <label class="text-sm font-medium text-black">Proceed to PRICE <i class="fa-solid fa-angle-right ml-2"></i></label>
                                </div>
                            </div> 
                        </div>
                        <!--PRICE DETAILS-->
                        <div class="tab-content-box hidden text-md text-black p-6">
                            <div class="flex">
                                <div class="mb-6 mr-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Original Price</label>
                                    <input type="number" name="original_price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Original Price" required>
                                </div>
                                <div class="mb-6 mr-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Sale Price</label>
                                    <input type="number" name="sale_price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Sale Price" required>
                                </div>
                            </div>
                            <div class="mb-6 mr-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Quantity</label>
                                <input type="number" name="quantity" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Quantity" required>
                            </div>
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="status" name="trending" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="status" class="font-medium text-black">Trending</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="status" name="status" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="status" class="font-medium text-black">Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-[500px] mt-6">
                                <label class="text-sm font-medium text-black">Proceed to PRODUCT IMAGES <i class="fa-solid fa-angle-right ml-2"></i></label>
                            </div>
                        </div>
                        <!--IMAGES-->
                        <div class="tab-content-box hidden text-md text-black p-6">
                                <div class="mt-6">
                                    <label class="block mb-2 text-sm font-medium text-black " for="user_avatar">Upload Image</label>
                                    <input multiple name="image[]" class="customFile block w-[700px] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2" aria-describedby="user_avatar_help" id="user_avatar" type="file" required>   
                                </div>
                        </div>          
                    </div>
                    
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="defaultModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    <button data-modal-hide="defaultModal" type="button" id="cancel" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-black dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="deleteModal" tabindex="-1" class="fixed hidden top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] h-full bg-gray-600 bg-opacity-50">
        <div class="flex items-center justify-center h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <form action="{{ url('admin/deleteProduct') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to Delete this Product?</h3>
                        <input type="hidden" name="delete_product" id="delete_id">
                        <button data-modal-hide="popup-modal" type="submit" class="text-black bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" id="cancel" type="button" class=" text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-black dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>