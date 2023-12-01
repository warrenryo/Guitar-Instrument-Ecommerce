@include('layouts.sidebar')
<x-app-layout>
@include('admin.includes.navbar')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(session('error'))
                    <h1>{{ session('error') }}</h1>
                @endif
                {{ __('Admin Slider') }}
            </h2>
        </div>
    </header>
        
    @include('admin.slider.sliderModal')

    <div class="py-12 sm:ml-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <button type="button" id="addSlider" class="text-white bg-blue-700 rounded-md px-2 py-2 text-sm float-right"><i class="fa-solid fa-plus"></i> Add Slider</button>
                </div>
                <livewire:admin.slider.slider-index />
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', '#addSlider', function(){
                $('#addSliderModal').fadeIn();
            })

            $(document).on('click', '#xbtn', function(){
                $('#addSliderModal').fadeOut();
            })
            
            $(document).on('click', '#cancel', function(){
                $('#addSliderModal').fadeOut();
            })

            //SLIDER DELETE MODAL
            $(document).on('click', '.delbtn', function(){
                var slider = $(this).val();
                $('#deleteModal').fadeIn();
                $('#delete_id').val(slider);
            })
            $(document).on('click', '#cancel', function(){
                $('#deleteModal').fadeOut();
            })
            
        })
    </script>
    
</x-app-layout>