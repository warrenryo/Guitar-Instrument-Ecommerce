<title>Check Out - {{$guitarEffectsProducts->guitar_effects_name}}</title>
<x-app-layout>
@include('frontend.frontEndNavbar')
<div class="flex">
        <h1 class="p-2 mt-16 text-2xl sm:ml-[30px] 2xl:ml-[110px] 3xl:ml-[250px]"><span></span></h1>
        
    </div>
<div class="p-4 flex items-center justify-center">

<div class="flex">
<form action="{{ url('orders') }}" method="POST">
    @csrf
        <div class="block">
            @include('frontend.buyProducts.billInfo.contact')
            @include('frontend.buyProducts.billInfo.paymentMethod')
            @include('frontend.buyProducts.billInfo.billingAddress')
            <input type="hidden" name="productId" value="{{$guitarEffectsProducts->id}}">
            <input type="hidden" name="productCategory" value="{{$guitarEffectsProducts->guitarEffectsCategory}}">
            <input type="hidden" name="productBrand" value="{{$guitarEffectsProducts->brand}}">
            <input type="hidden" name="productColor" value="">
            <input type="hidden" name="productName" value="{{$guitarEffectsProducts->guitar_effects_name}}">
            <input type="hidden" name="productTotalPrice" id="inputField">
            <input type="hidden" name="status" value="Pending">
        </div>
        <button type="submit" class="bg-blue-700 text-white p-4 mt-6 float-right rounded-sm">Complete Order</button>
    </form>
    <div class="block ml-10 w-[50vh]">
        <img src="{{ asset($guitarEffectsProducts->guitarEffectsImages[0]->images) }}" alt="" class="h-auto w-auto">
        <h1 class="text-2xl tracking-tight text-gray-900 dark:text-white mt-10 "><span class="text-2xxl">{{$guitarEffectsProducts->brand}}</span> {{$guitarEffectsProducts->guitar_effects_name}} <span>{{$guitarEffectsProducts->guitarEffectsCategory}}</span></h1>
        <div class="mt-10 ">
            <div class="flex">
                <h2 class="mt-2">SubTotal</h2>
                <div class="mt-2 flex-grow text-right ">
                    @if($guitarEffectsProducts->sale_price < $guitarEffectsProducts->orig_price)
                    <h1 >{{$guitarEffectsProducts->sale_price}}</h1>
                        @else
                        <h1><i class="fa-solid fa-peso-sign"></i> {{$guitarEffectsProducts->orig_price}}</h1>
                    @endif
                </div>
            </div>
            <div class="flex">
                <h2 class="mt-2">Pick Up</h2>
                <h2 class="mt-2 flex-grow text-right">Free</h2>
            </div> 
            <div class="flex">
                <h2 class="mt-2 font-bold">Total</h2>
                <div id="h1Element" class="mt-2 flex-grow text-right font-bold">
                    @if($guitarEffectsProducts->sale_price < $guitarEffectsProducts->orig_price)
                    <h1>{{$guitarEffectsProducts->sale_price}}</h1>
                        @else
                        <h1><i class="fa-solid fa-peso-sign"></i> {{$guitarEffectsProducts->orig_price}}</h1>
                    @endif
                </div>
            </div>
        </div>
</div>
    
    </div>
    
  

    <script>
        const h1Element = document.getElementById('h1Element');
        const input = document.getElementById('inputField');

        input.value = h1Element.innerText;

    </script>

</div>
@include('frontend.frontEndFooter')
</x-app-layout>