<title>Check Out - {{$buyOneProduct->product_name}}</title>
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
            <input type="text" class="hidden" name="product_slug" value="{{$buyOneProduct->slug}}">
            <input type="text" class="hidden" name="status" value="Pending">
        </div>
        <button type="submit" class="bg-blue-700 text-white p-4 mt-6 float-right rounded-sm">Complete Order</button>
    </form>
    <div class="block ml-10 w-[50vh] sm:pt-20 xl:pt-0 sm:mb-20 xl:mb-0">
        <img src="{{ asset($buyOneProduct->productImages[0]->images) }}" alt="" class="w-[50vh] h-[75vh]">
        <h1 class="text-2xl tracking-tight text-gray-900 dark:text-white mt-10 "><span class="text-2xxl">{{$buyOneProduct->brand}}</span> {{$buyOneProduct->product_name}} <span>{{$buyOneProduct->category->name}}</span> - <span>{{$buyOneProduct->color}}</span></h1>
        <div class="mt-10 ">
            <div class="flex">
                <h1 class="">Quantity</h1>
                <p class="flex-grow text-right">{{$quantity}}</p>
            </div>
            <div class="flex">
                <h2 class="mt-2">SubTotal</h2>
                <div class="mt-2 flex-grow text-right ">
                    @if($buyOneProduct->sale_price < $buyOneProduct->original_price)
                    <h1 >{{number_format($buyOneProduct->sale_price)}}</h1>
                        @else
                        <h1><i class="fa-solid fa-peso-sign"></i> {{number_format($buyOneProduct->original_price)}}</h1>
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
                    @if($buyOneProduct->sale_price < $buyOneProduct->original_price)
                    @php  $total += $buyOneProduct->sale_price * $quantity @endphp
                    <h1>{{number_format($total)}}</h1>
                        @else
                        @php $total += $buyOneProduct->original_price * $quantity @endphp
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