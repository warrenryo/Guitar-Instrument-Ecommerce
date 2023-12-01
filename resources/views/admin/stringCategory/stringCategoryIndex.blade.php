@include('layouts.sidebar')
<x-app-layout>
@include('admin.includes.navbar')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(session('error'))
                    <h1>{{ session('error') }}</h1>
                @endif
                {{ __('Admin String Category List') }}
            </h2>
        </div>
    </header>

    @include('admin.stringCategory.stringCategoryModal')
    <div class="py-12 sm:ml-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="float-right ">
                    <button data-modal-target="addStrings" data-modal-toggle="addStrings" class="bg-blue-700 p-2.5 text-sm text-white rounded-lg text-center hover:bg-blue-800"><i class="fa-solid fa-plus"></i> Add Strings</button>
                </div>
                <div>
                    <livewire:admin.gear-category.view-string-category />
                </div>  
            </div>
        </div>
    </div>
    <script>
        function deleteStringCatBtn(buttonId)
        {
            var valueOfInput = document.getElementById('delete_id');

            var valueOfCancelButton = buttonId.value;

            valueOfInput.value = valueOfCancelButton;
           
        }
    </script>

</x-app-layout>