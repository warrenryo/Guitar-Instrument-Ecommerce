<title>Track Order - Sekai Music</title>
<x-app-layout>
    @include('frontend.frontEndNavbar')
    
    <div class="w-full h-[70vh] flex items-center justify-center">
        <div class="text-center justify-center bg-white p-10 shadow-md rounded-md">
            <h1 class="font-bold text-2xl mb-6">Track Order</h1> 
            <p>Search your Orders here</p>
            <form action="{{ url('track-order-submit') }}" method="POST">
                @csrf
                <div class="mt-2">
                    <input type="text" name="trackOrder" class="bg-gray-50 border w-[30vh] border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="Enter your Tracking Number" required>
                </div>
                <button type="submit" class="px-10 py-2 bg-blue-700 mt-6  rounded-md hover:bg-blue-800 text-sm text-white">Search</button>
            </form>
        </div>
    </div>
   
<div class="mt-[15vh]">
@include('frontend.frontEndFooter')
</div>



</x-app-layout>