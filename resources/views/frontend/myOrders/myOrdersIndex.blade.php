<title>Your Orders - Sekai Music</title>
<x-app-layout>
    @include('frontend.frontEndNavbar')
    
    <div class="flex">
        <h1 class="p-2 mt-16 text-2xl sm:ml-[30px] 2xl:ml-[110px] 3xl:ml-[290px]">Your Orders</h1>
    </div>

    <div class="py-12 xl:mx-[21vh]">
        <div class="max-w-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div>
                    <livewire:front-end.my-orders.show-my-orders />
                </div>  
            </div>
        </div>
    </div>

<div class="mt-[15vh]">
@include('frontend.frontEndFooter')
</div>



</x-app-layout>