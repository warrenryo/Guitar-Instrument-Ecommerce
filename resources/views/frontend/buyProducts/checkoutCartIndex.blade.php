<title>Check Out - Cart</title>
<x-app-layout>
@include('frontend.frontEndNavbar')
<div class="flex">
        <h1 class="p-2 mt-16 text-2xl sm:ml-[30px] 2xl:ml-[110px] 3xl:ml-[250px]"><span></span></h1>
        
    </div>
<div class="p-4 flex items-center justify-center">
<form action="{{ url('orders') }}" method="POST" id="formRequest">
    @csrf
<div class="sm:block xl:flex">

        <div class="block">
            @include('frontend.buyProducts.billInfo.contact')
            @include('frontend.buyProducts.billInfo.paymentMethod')
            @include('frontend.buyProducts.billInfo.billingAddress')
            <button type="submit" class="bg-blue-700 text-white p-4 mt-6 float-right rounded-sm">Complete Order</button>
        </div>
        <input type="hidden" name="status" value="Pending">
    
    <div class="block xl:ml-10 sm:ml-0 w-[60vh] sm:pt-20 xl:pt-0 sm:mb-20 xl:mb-0">
    @forelse($wishlist as $cart)
            @if($cart->product)
            <div class="flex bg-white mt-6 p-6 shadow-md rounded-md">
                <div class="mr-6">
                    <img src="{{ asset($cart->product->productImages[0]->images) }}"  class="w-[10vh]" alt="">
                </div>
                <div class="block w-[65vh]">
                    <div class="flex justify-between">
                    <h1 class="text-xl font-semi-bold">{{$cart->product->product_name}} {{$cart->product->category->name}} - {{$cart->product->color}}</h1>
                        <div class="flex">
                            <h1 class="text-sm text-gray-500">Qty: </h1>
                            <p class="text-sm text-gray-500 ml-2"> {{$cart->quantity}}</p>
                        </div>                                          
                    </div>
                    @if($cart->product->sale_price < $cart->product->original_price)
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->product->sale_price)}}</span></p>
                    @else
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->product->original_price)}}</span> </p>
                    @endif
                    <h1 class="text-sm text-gray-500">{{$cart->product->brand}} </h1>
                
                </div>
                <div class="mt-4 ml-6 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-10">
                <div class="flex items-center space-x-4">
                    <div class="w-[8vh] ml-6">
                        @if($cart->product->sale_price < $cart->product->original_price)
                        <p class="hidden">{{ $cartSalePrice = $cart->product->sale_price * $cart->quantity}}</p>
                        <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                        @php  $totalPrice += $cart->product->sale_price * $cart->quantity @endphp
                        @else
                        <p class="hidden">{{ $cartOrigPrice = $cart->product->original_price * $cart->quantity}}</p>
                        <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item-total">{{number_format($cartOrigPrice)}}</span></p>
                        @php  $totalPrice += $cart->product->original_price * $cart->quantity @endphp
                        @endif
                    </div>
                </div>
                </div>
            </div>
            @endif
            @if($cart->accessory)
            <div class="flex bg-white mt-6 p-6 shadow-md rounded-md">
                <div class="mr-6">
                    <img src="{{ asset($cart->accessory->acessoryImages[0]->images) }}"  class="w-[10vh]" alt="">
                </div>
                <div class="block w-[50vh]">
                    <div class="flex justify-between">
                    <h1 class="text-xl font-semi-bold">{{$cart->accessory->accessory_name}} {{$cart->accessory->gearCategory->accessory_category_name}}</h1>
                        <div class="flex">
                            <h1 class="text-sm text-gray-500">Qty: </h1>
                            <p class="text-sm text-gray-500 ml-2"> {{$cart->quantity}}</p>
                        </div>                                          
                    </div>    
                    @if($cart->accessory->sale_price < $cart->accessory->original_price)
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->accessory->sale_price)}}</span></p>
                    @else
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->accessory->orig_price)}}</span> </p>
                    @endif
                    <h1 class="text-sm text-gray-500">{{$cart->accessory->brand}} </h1>
                
                </div>
                <div class="mt-4 ml-6 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-10">
                <div class="flex items-center space-x-4">
                    <div class="w-[8vh] ml-6">
                        @if($cart->accessory->sale_price < $cart->accessory->orig_price)
                        <p class="hidden">{{ $cartSalePrice = $cart->accessory->sale_price * $cart->quantity}}</p>
                        <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                        @php  $totalPrice2 += $cart->accessory->sale_price * $cart->quantity @endphp
                        @else
                        <p class="hidden">{{ $cartOrigPrice = $cart->accessory->orig_price * $cart->quantity}}</p>
                        <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item">{{number_format($cartOrigPrice)}}</span></p>
                        @php  $totalPrice2 += $cart->accessory->orig_price * $cart->quantity @endphp
                        @endif
                    </div>
                </div>
                </div>
                
            </div>
            @endif
            @if($cart->strings) 
            <div class="flex bg-white mt-6 p-6 shadow-md rounded-md">
                <div class="mr-6">
                    <img src="{{ asset($cart->strings->stringImages[0]->images) }}"  class="w-[10vh]" alt="">
                </div>
                <div class="block w-[50vh]">
                    <div class="flex justify-between">
                    <h1 class="text-xl font-semi-bold">{{$cart->strings->string_name}} {{$cart->strings->stringCategory}}</h1>
                        <div class="flex">
                            <h1 class="text-sm text-gray-500">Qty: </h1>
                            <p class="text-sm text-gray-500 ml-2"> {{$cart->quantity}}</p>
                        </div>                                          
                    </div>    
                    @if($cart->strings->sale_price < $cart->strings->orig_price)
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->strings->sale_price)}}</span></p>
                    @else
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->strings->orig_price)}}</span> </p>
                    @endif
                    <h1 class="text-sm text-gray-500">{{$cart->strings->brand}} </h1>
                    <h1 class="text-sm text-gray-500">{{$cart->size}}</h1>  
                    </div>
                <div class="mt-4 ml-6 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-10">
                <div class="flex items-center space-x-4">
                    <div class="w-[8vh] ml-6">
                        @if($cart->strings->sale_price < $cart->strings->orig_price)
                        <p class="hidden">{{ $cartSalePrice = $cart->strings->sale_price * $cart->quantity}}</p>
                        <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                        @php  $totalPrice2 += $cart->strings->sale_price * $cart->quantity @endphp
                        @else
                        <p class="hidden">{{ $cartOrigPrice = $cart->strings->orig_price * $cart->quantity}}</p>
                        <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item">{{number_format($cartOrigPrice)}}</span></p>
                        @php  $totalPrice2 += $cart->strings->orig_price * $cart->quantity @endphp
                        @endif
                    </div>       
                </div>
                </div>
                
            </div>
            @endif
            @if($cart->guitarEffects) 
            <div class="flex bg-white mt-6 p-6 shadow-md rounded-md">
                <div class="mr-6">
                    <img src="{{ asset($cart->guitarEffects->guitarEffectsImages[0]->images) }}"  class="w-[10vh]" alt="">
                </div>
                <div class="block w-[50vh]">
                    <div class="flex justify-between">
                    <h1 class="text-xl font-semi-bold">{{$cart->guitarEffects->guitar_effects_name}} {{$cart->guitarEffects->guitarEffectsCategory}}</h1>
                        <div class="flex">
                            <h1 class="text-sm text-gray-500">Qty: </h1>
                            <p class="text-sm text-gray-500 ml-2"> {{$cart->quantity}}</p>
                        </div>                                          
                    </div>    
                    @if($cart->guitarEffects->sale_price < $cart->guitarEffects->orig_price)
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->guitarEffects->sale_price)}}</span></p>
                    @else
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->guitarEffects->orig_price)}}</span> </p>
                    @endif
                    <h1 class="text-sm text-gray-500">{{$cart->guitarEffects->brand}} </h1>
                    <h1 class="text-sm text-gray-500">{{$cart->size}}</h1>  
                    </div>
                <div class="mt-4 ml-6 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-10">
                <div class="flex items-center space-x-4">
                    <div class="w-[8vh] ml-6">
                        @if($cart->guitarEffects->sale_price < $cart->guitarEffects->orig_price)
                        <p class="hidden">{{ $cartSalePrice = $cart->guitarEffects->sale_price * $cart->quantity}}</p>
                        <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                        @php  $totalPrice2 += $cart->guitarEffects->sale_price * $cart->quantity @endphp
                        @else
                        <p class="hidden">{{ $cartOrigPrice = $cart->guitarEffects->orig_price * $cart->quantity}}</p>
                        <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item">{{number_format($cartOrigPrice)}}</span></p>
                        @php  $totalPrice2 += $cart->guitarEffects->orig_price * $cart->quantity @endphp
                        @endif
                    </div>       
                </div>
                </div>
                
            </div>
            @endif
            @empty
            <div class="text-center text-2xl ">
                <h1>Your Cart is empty</h1>
            </div>
            @endforelse
            @php
                $grandTotal = $totalPrice += $totalPrice2
            @endphp
        <div class="mt-10 ">
            <div class="flex">
                <h2 class="mt-2">SubTotal</h2>
                <div class="mt-2 flex-grow text-right ">
                    {{number_format($grandTotal)}}
                </div>
            </div>
            <div class="flex">
                <h2 class="mt-2">Pick Up</h2>
                <h2 class="mt-2 flex-grow text-right">Free</h2>
            </div> 
            <div class="flex">
                <h2 class="mt-2 font-bold">Total</h2>
                <div id="h1Element" class="mt-2 flex-grow text-right font-bold">
                    {{number_format($grandTotal)}}
                </div>
            </div>
        </div>

</form>
       
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