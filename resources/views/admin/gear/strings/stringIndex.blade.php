@include('layouts.sidebar')
<x-app-layout>
@include('admin.includes.navbar')
<header class="bg-white shadow sm:ml-14">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(session('error'))
                    <h1>{{ session('error') }}</h1>
                @endif
                {{ __('Admin Accessory Products') }}
            </h2>
        </div>
    </header>

    @include('admin.gear.strings.stringModal')
    <div class="py-16 sm:ml-14">
        <div class="max-w-[150vh] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6">
                    <button id="addAccessory" data-modal-target="addString" data-modal-toggle="addString"  class="text-white bg-blue-700 p-2 rounded-md text-sm float-right hover:bg-blue-800"><i class="fa-solid fa-plus"></i> Add String</button>
                </div>
                <div class="relative bottom-4 px-6 text-gray-900">
                    <livewire:admin.string.view-string />
                </div>
            </div>
        </div>
    </div>
    <script>
         $('.tab-trigger ul li').click(function(event){
                index = $(this).index();
                $('.tab-content-box').hide();
                $('.tab-content-box').eq(index).fadeIn();
            })

            $(document).ready(function(){
                $(document).on('click', '#deleteAccessoryBtn', function(){
                    var acc_id = $(this).val();
                    $('#delete_id').val(acc_id);
                })
            })
        function deleteString(id)
        {
            var valueOfInput = document.getElementById('delete_id');
            
            var valueOfData = id.value;

            valueOfInput.value = valueOfData;

        }
    </script>
</x-app-layout>