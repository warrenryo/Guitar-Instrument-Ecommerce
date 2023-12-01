@include('layouts.sidebar')
<x-app-layout>
@include('admin.includes.navbar')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(session('error'))
                    <h1>{{ session('error') }}</h1>
                @endif
                {{ __('Admin Category List') }}
            </h2>
        </div>
    </header>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="float-right ">
                    <a href="{{ URL::to('admin/category') }}" class="bg-blue-700 p-2.5 text-sm text-white rounded-lg text-center hover:bg-blue-800"><i class="fa-solid fa-plus"></i> Add Category</a>
                </div>
                <div>
                    <livewire:admin.category.category-table />
                </div>  
            </div>
        </div>
    </div>

</x-app-layout>