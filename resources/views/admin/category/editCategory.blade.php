@include('layouts.sidebar')
<x-app-layout>
@include('admin.includes.navbar')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(session('error'))
                    <h1>{{ session('error') }}</h1>
                @endif
                {{ __('Admin Edit Category') }}
            </h2>
        </div>
    </header>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ URL::to('admin/category/viewCategory') }}" class="bg-blue-700 py-2 px-2.5 mx-2 w-[140px] text-center rounded-lg text-white float-right text-sm hover:bg-blue-800 hover:text-white">Category List <i class="fa-solid fa-arrow-right ml-2"></i></a>
                    <h2 class="text-lg px-6 py-2">Add Category</h2>
                </div>
                <div class="p-6 relative bottom-6">
                    <form class="p-6" action="{{ url('admin/editCategory/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex">
                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Category Name</label>
                                <input type="text" id="name" name="name" value="{{$item->name}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Product Name" required>
                            </div>
                            <div class="mb-6  ml-6">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Slug</label>
                                <input type="text" id="password" name="slug" value="{{$item->slug}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Product Type" required>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Category Description</label>
                            <div class="mt-2">
                                <textarea id="about" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6 bg-gray-50" placeholder="Enter Product Desription">{{$item->description}}</textarea>
                            </div>
                        </div>
                        
                       
                        
                        <div class="flex">
                            <div class="mt-6">
                                <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Upload Image</label>
                                <input name="image" class="customFile block w-[350px] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                <img src="{{ asset($item->image) }}" width="100px" height="100px" class="mt-4">
                            </div>
                            <div class="mb-6 mt-6  ml-6">
                                <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 ">Meta Title</label>
                                <input type="text" id="repeat-password" value="{{$item->meta_title}}" name="meta_title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Title" required>
                            </div>
                            <div class="mb-6 mt-6 ml-6">
                                <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 ">Meta Keyword</label>
                                <input type="text" id="repeat-password" name="meta_keyword" value="{{$item->meta_keyword}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[250px] p-2.5" placeholder="Enter Keyword" required>
                            </div>
                        </div>

                        <div class="col-span-full mt-4 mb-6">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Meta Description</label>
                            <div class="mt-2">
                                <textarea id="about" name="meta_description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6 bg-gray-50" placeholder="Enter Meta Desription">{{$item->meta_description}}</textarea>
                            </div>
                        </div>

                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="status" name="status"  type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" {{ $item->status == '1' ? 'checked':'' }} />
                                </div>
                                <div class="text-sm leading-6">
                                    <label for="status" class="font-medium text-gray-900">Category Status</label>
                                </div>
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-6 ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>