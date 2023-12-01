<title>Check Out - {{$buyOneString->string_name}}</title>
<x-app-layout>
@include('frontend.frontEndNavbar')
<div class="flex">
        <h1 class="p-2 mt-16 text-2xl sm:ml-[30px] 2xl:ml-[110px] 3xl:ml-[250px]"><span></span></h1>
        
    </div>
<div class="p-4 flex items-center justify-center">

<div class="sm:block xl:flex">
<form action="{{ url('one-order') }}" method="POST" id="formRequest">
    @csrf
        <div class="block">
            @include('frontend.buyProducts.billInfo.contact')
            @include('frontend.buyProducts.billInfo.paymentMethod')
            @include('frontend.buyProducts.billInfo.billingAddress')
            <input type="text" class="hidden" name="quantity" value="{{$quantity}}" >
            <input type="text" class="hidden" name="size" value="{{$stringSize}}" >
            <input type="text" class="hidden" name="product_slug" value="{{$buyOneString->slug}}">
            <input type="text" class="hidden" name="status" value="Pending">
        </div>
        <button type="submit" class="bg-blue-700 text-white p-4 mt-6 float-right rounded-sm">Complete Order</button>
    </form>
    <div class="block ml-10 w-[50vh] sm:pt-20 xl:pt-0 sm:mb-20 xl:mb-0">
        <img src="{{ asset($buyOneString->stringImages[0]->images) }}" alt="" class="w-[50vh] h-[75vh]">
        <h1 class="text-2xl tracking-tight text-gray-900 dark:text-white mt-10 "><span class="text-2xxl">{{$buyOneString->brand}}</span> {{$buyOneString->string_name}} <span>{{$buyOneString->stringCategory}}</span> - <span class="text-gray-500">{{$stringSize}}</span></h1>
        <div class="mt-10 ">
            <div class="flex">
                <h1 class="">Quantity</h1>
                <p class="flex-grow text-right">{{$quantity}}</p>
            </div>
            <div class="flex">
                <h2 class="mt-2">SubTotal</h2>
                <div class="mt-2 flex-grow text-right ">
                    @if($buyOneString->sale_price < $buyOneString->orig_price)
                    <h1 >{{number_format($buyOneString->sale_price)}}</h1>
                        @else
                        <h1><i class="fa-solid fa-peso-sign"></i> {{number_format($buyOneString->orig_price)}}</h1>
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
                    @if($buyOneString->sale_price < $buyOneString->orig_price)
                    <h1>{{number_format($buyOneString->sale_price)}}</h1>
                        @else
                        @php $total += $buyOneString->orig_price * $quantity @endphp
                        <h1><i class="fa-solid fa-peso-sign"></i> {{number_format($total)}}</h1>
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