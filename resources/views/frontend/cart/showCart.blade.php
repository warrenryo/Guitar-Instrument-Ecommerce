<title>Your Shopping Cart - Sekai Music</title>
<x-app-layout>
    @include('frontend.cart.cartModal')
    @include('frontend.frontEndNavbar')
    
    <div class="flex">
        <h1 class="p-2 mt-16 text-2xl sm:ml-[30px] 2xl:ml-[110px] 3xl:ml-[290px]">Your Cart</h1>
    </div>
   
    <div class="w-full mx-auto mt-6">   
        <div class="p-4 flex items-center justify-center ">
            <livewire:front-end.cart.show-cart />
        </div>
    </div>
    
<div class="mt-[61.8vh]">
@include('frontend.frontEndFooter')
</div>

<script>
    function deleteCart(id)
    {
        var valueOfInput = document.getElementById('delete_id');
        var valueOfData = id.value;

        valueOfInput.value = valueOfData;
    }
</script>

</x-app-layout>