@include('layouts.sidebar')
<x-app-layout>
@include('admin.includes.navbar')
    <header class="bg-white shadow ">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(session('error'))
                    <h1>{{ session('error') }}</h1>
                @endif
                {{ __('Admin Order Placed') }}
            </h2>
        </div>
    </header>

    <div class="py-12 ">
        <div class="w-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div>
                    <livewire:admin.orders.order-placed/>
                </div>  
            </div>
        </div>
    </div>

</x-app-layout>