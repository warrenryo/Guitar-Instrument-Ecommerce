@include('layouts.sidebar')
<x-app-layout>
@include('admin.includes.navbar')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(session('error'))
                    <h1>{{ session('error') }}</h1>
                @endif
                {{ __('Admin Products') }}
            </h2>
        </div>
    </header>
        

@include('admin.products.productModal')
    <div class="py-16">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6">
                    <button id="addProducts" class="text-white bg-blue-700 p-2 rounded-md text-sm float-right hover:bg-blue-800"><i class="fa-solid fa-plus"></i> Add Guitars</button>
                </div>
                <div class="relative mt-4 px-6 text-gray-900">
                    <livewire:admin.products.product-index />
                </div>
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

            $(document).on('click', '#cancel', function(){
                $('#deleteModal').fadeOut();
            })

            $('.tab-trigger ul li').click(function(event){
                index = $(this).index();
                $('.tab-content-box').hide();
                $('.tab-content-box').eq(index).fadeIn();
            })
        })
    </script>
    
</x-app-layout>