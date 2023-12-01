@include('layouts.sidebar')
<x-app-layout>
@include('admin.includes.navbar')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(session('error'))
                    <h1>{{ session('error') }}</h1>
                @endif
                {{ __('Admin Edit Product') }}
            </h2>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Modal body -->
                <form action="{{ url('admin/updateAccessory/'.$accessory->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-6 space-y-6">
                        <div class="tab-trigger">
                            <ul class="bg-gray-600 rounded-md">
                                <li class=" inline-block border-x-0 border-b-2 border-t-0 border-transparent px-12 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-white hover:text-gray-800 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent duration-300 cursor-pointer rounded-md ml-24">DETAILS</li>
            
                                <li class=" inline-block border-x-0 border-b-2 border-t-0 border-transparent px-12 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-white hover:text-gray-800 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent duration-300 cursor-pointer rounded-md ml-24">SEO Tags</li>
                
                                <li class=" inline-block border-x-0 border-b-2 border-t-0 border-transparent px-12 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-white hover:text-gray-800 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent duration-300 cursor-pointer rounded-md ml-24">PRICING</li>
                                
                                <li class=" inline-block border-x-0 border-b-2 border-t-0 border-transparent px-12 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-white hover:text-gray-800 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent duration-300 cursor-pointer rounded-md ml-24">Product Images</li>
                            </ul>
                        </div>
                        <div class="relative bottom-[10px]">
                            <!--HOME-->
                            <div class="tab-content-box text-md text-white p-6">
                                <div class="flex">
                                    <div class="mb-6 mr-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                                        <input type="text" value="{{$accessory->accessory_name}}" name="accessory_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Product Name" required>
                                    </div>
                                    <div class="mb-6">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Slug</label>
                                        <input type="text" value="{{$accessory->slug}}" name="slug" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Slug" required>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="mb-6 mr-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                        <select id="countries" name="gearCategory_id" class="bg-gray-50 w-[350px] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                                        <option selected disabled>Select Categories</option>
                                            @foreach($gearCategory as $gCategory)
                                            <option value="{{$gCategory->id}}" {{ $gCategory->id == $accessory->gearCategory_id ? 'selected':'' }}>{{$gCategory->accessory_category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-6">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product Brand</label>
                                        <select name="brand" class="bg-gray-50 border border-gray-300 w-[350px] text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                                            <option selected disabled>Select Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->brand_name}}" {{$brand->brand_name == $accessory->brand ? 'selected':''}}>{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Small Description</label>
                                    <div class="mt-2">
                                        <textarea id="about" name="small_description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6 bg-gray-50" placeholder="Enter Product Desription">{{$accessory->small_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                    <div class="mt-2">
                                        <textarea id="about" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6 bg-gray-50" placeholder="Enter Product Desription">{{$accessory->description}}</textarea>
                                    </div>
                                </div>
                                <div class="ml-[913px] mt-6">
                                    <label class="text-sm font-medium text-gray-800">Proceed to SEO TAGS <i class="fa-solid fa-angle-right ml-2"></i></label>
                                </div>
                            </div>
                            <!--SEO TAGS-->
                            <div class="tab-content-box hidden text-md p-6">
                                <div class="flex">
                                    <div class="mb-6 mr-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Meta Title</label>
                                        <input type="text" value="{{$accessory->meta_title}}" name="meta_title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Meta Title" required>
                                    </div>
                                    <div class="mb-6 mr-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Meta Keyword</label>
                                        <input type="text" value="{{$accessory->meta_keyword}}" name="meta_keyword" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Meta Keyword" required>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Meta Description</label>
                                    <div class="mt-2">
                                        <textarea id="about" name="meta_description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6 bg-gray-50" placeholder="Enter Meta Desription">{{$accessory->meta_description}}</textarea>
                                    </div>
                                    <div class="ml-[940px] mt-6">
                                        <label class="text-sm font-medium text-gray-800">Proceed to PRICE <i class="fa-solid fa-angle-right ml-2"></i></label>
                                    </div>
                                </div> 
                            </div>
                            <!--PRICE DETAILS-->
                            <div class="tab-content-box hidden text-md p-6">
                                <div class="flex">
                                    <div class="mb-6 mr-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Original Price</label>
                                        <input type="text" value="{{$accessory->orig_price}}" name="orig_price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Original Price" required>
                                    </div>
                                    <div class="mb-6 mr-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Sale Price</label>
                                        <input type="text" value="{{$accessory->sale_price}}" name="sale_price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Sale Price" required>
                                    </div>
                                </div>
                                <div class="mb-6 mr-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Quantity</label>
                                    <input type="number" value="{{$accessory->quantity}}" name="quantity" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Quantity" required>
                                </div>
                                <div class="mt-6 space-y-6">
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="status" name="trending" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" {{$accessory->trending == '1' ? 'checked':''}} >
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="status" class="font-medium text-gray-800">Trending</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 space-y-6">
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="status"  name="status" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" {{$accessory->status =='1' ? 'checked':''}}>
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="status" class="font-medium text-gray-800">Status</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-[850px] mt-6">
                                    <label class="text-sm font-medium text-gray-800">Proceed to PRODUCT IMAGES <i class="fa-solid fa-angle-right ml-2"></i></label>
                                </div>
                            </div>
                            <!--IMAGES-->
                            <div class="tab-content-box hidden text-md p-6">
                                    <div class="mt-6">
                                        <label class="block mb-2 text-sm font-medium text-gray-800 " for="user_avatar">Upload Image</label>
                                        <input multiple name="image[]" class="customFile block w-[700px] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2" aria-describedby="user_avatar_help" id="user_avatar" type="file">   
                                    
                                    </div>
                                    <div class="flex mt-4">
                                        @if($accessory->acessoryImages)
                                        @foreach($accessory->acessoryImages as $key => $image)
                                        <div class="row">
                                            <img src="{{ asset($image->images) }}" style="width: 100px; height: 100px;" class="p-4" alt="Img">
                                            <a @if($key === 0) href="javascript:void(0);" class="bg-black text-white text-sm rounded-xl px-2 ml-4" @else href="{{ url('admin/delete-img/'.$image->id.'/delete') }}" @endif class="bg-red-600 text-white text-sm rounded-xl px-2 ml-4">Remove</a>
                                        </div>
                                        @endforeach
                                               
                                            
                                        @else
                                            <h1 class="text-gray-800 px-2 py-2 ">No Image Uploaded</h1>
                                        @endif
                                    </div>
                            </div>          
                        </div>
                        
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="defaultModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                        <a href="{{ url('admin/accessory') }}" data-modal-hide="defaultModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(document).on('click', '#addProducts', function(){
                $('#addProductModal').fadeIn();
            })
            
            $(document).on('click', '#cancel', function(){
                $('#addProductModal').fadeOut();
            })

            $(document).on('click', '#xbtn', function(){
                $('#addProductModal').fadeOut();
            })

            $('.tab-trigger ul li').click(function(event){
                index = $(this).index();
                $('.tab-content-box').hide();
                $('.tab-content-box').eq(index).fadeIn();
            })
        })
    </script>
</x-app-layout>