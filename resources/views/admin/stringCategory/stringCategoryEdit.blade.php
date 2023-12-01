@include('layouts.sidebar')
<x-app-layout>
@include('admin.includes.navbar')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(session('error'))
                    <h1>{{ session('error') }}</h1>
                @endif
                {{ __('Admin Edit Accessory') }}
            </h2>
        </div>
    </header>

    <div class="py-12 sm:ml-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ URL::to('admin/stringCategory/strings') }}" class="bg-blue-700 py-2 px-2.5 mx-2 w-[200px] text-center rounded-lg text-white float-right text-sm hover:bg-blue-800 hover:text-white">String Category List <i class="fa-solid fa-arrow-right ml-2"></i></a>
                    <h2 class="text-lg px-6 py-2">Edit Accessory</h2>
                </div>
                <div class="p-6 relative bottom-6">
                    <form class="p-6" action="{{ url('admin/updateStringCategory/'.$stringCategory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex">
                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">String Category Name</label>
                                <input type="text" id="name" name="string_category_name" value="{{$stringCategory->string_category_name}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Accessory Name" required>
                            </div>
                            <div class="mb-6  ml-6">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Slug</label>
                                <input type="text" id="password" name="slug" value="{{$stringCategory->slug}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[350px] p-2.5" placeholder="Enter Accessory Slug" required>
                            </div>
                        </div>

                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="status" name="status"  type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" {{$stringCategory->status == '1' ? 'checked':''}} />
                                </div>
                                <div class="text-sm leading-6">
                                    <label for="status" class="font-medium text-gray-900">Accessory Status</label>
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