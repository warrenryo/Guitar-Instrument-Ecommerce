
<x-app-layout>
@include('admin.includes.navbar')
<header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(session('error'))
                    <h1>{{ session('error') }}</h1>
                @endif
                {{ __('Admin Accessory Products') }}
            </h2>
        </div>
    </header>

    @include('admin.gear.guitarEffects.guitarEffectsModal')
    <div class="py-16 ">
        <div class="max-w-[150vh] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6">
                    <button id="addGuitarEffects" data-modal-target="addGuitarEffects" data-modal-toggle="addGuitarEffects"  class="text-white bg-blue-700 p-2 rounded-md text-sm float-right hover:bg-blue-800"><i class="fa-solid fa-plus"></i> Add Guitar Effects</button>
                </div>
                <div class="relative bottom-4 px-6 text-gray-900">
                    <livewire:admin.guitar-effects.view-guitar-effects />
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

        function deleteEffects(id)
        {
            var valueOfInput = document.getElementById('delete_id');

            valueOfBtn = id.value;
            valueOfInput.value = valueOfBtn;
        }
    </script>
</x-app-layout>