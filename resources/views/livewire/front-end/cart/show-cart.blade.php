<div>
    <div class="sm:block lg:flex">
        <div class="block items-center justify-center h-full">
            @forelse($wishlist as $cart)
            <form action="{{ url('checkout/cart/'.$cart->user_id) }}" method="POST" >
                @csrf
            @if($cart->product)
            <div class="flex bg-white mt-6 p-6 sm:mr-0 lg:mr-6 shadow-md rounded-md">
                <div class="mr-6">
                    <img src="{{ asset($cart->product->productImages[0]->images) }}"  class="w-[10vh]" alt="">
                </div>
                <div class="block lg:w-[50vh] sm:w-[22vh]">
                    <h1 class="text-xl font-semi-bold">{{$cart->product->product_name}} {{$cart->product->category->name}} - {{$cart->product->color}}</h1>
                    @if($cart->product->sale_price < $cart->product->original_price)
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->product->sale_price)}}</span></p>
                    @else
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->product->original_price)}}</span> </p>
                    @endif
                    <h1 class="text-sm text-gray-500">{{$cart->product->brand}} </h1>
                
                </div>
                <div class="mt-4 ml-6 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-10">
                    <div class="flex items-center">
                        <div class="custom-number-input h-10 w-32">
                            <div class="flex items-center h-10 w-full rounded-lg relative bg-transparent mt-1">
                                <h1 data-action="decrement" wire:click="decrementQuantity({{$cart->id}})" class=" text-center bg-gray-100 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                <span class="m-auto text-2xl font-thin">−</span>
                                </h1>
                                <input type="number" id="quantityInput"  value="{{$cart->quantity}}" class="outline-none  border-white focus:outline-none text-center w-full bg-gray-100 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity" ></input>
                                <h1 data-action="increment" wire:click="incrementQuantity({{$cart->id}})" class="bg-gray-100 text-center text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                <div class="flex items-center space-x-4">
                    <div>
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
                   
                
                        <button type="button" value="{{$cart->id}}" onclick="deleteCart(this)" data-modal-target="deleteCart" data-modal-toggle="deleteCart" class="text-red-700"><i class="fa-solid fa-trash"></i></button>
                    
        
                </div>
                </div>
            </div>
            @endif
            @if($cart->accessory) 
            <div class="flex bg-white mt-6 p-6 sm:mr-0 lg:mr-6 shadow-md rounded-md">
                <div class="mr-6">
                    <img src="{{ asset($cart->accessory->acessoryImages[0]->images) }}"  class="w-[10vh]" alt="">
                </div>
                <div class="block lg:w-[50vh] sm:w-[22vh]">
                    <h1 class="text-xl font-semi-bold">{{$cart->accessory->accessory_name}} {{$cart->accessory->gearCategory->accessory_category_name}}</h1>
                    @if($cart->accessory->sale_price < $cart->accessory->original_price)
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->accessory->sale_price)}}</span></p>
                    @else
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->accessory->orig_price)}}</span> </p>
                    @endif
                    <h1 class="text-sm text-gray-500">{{$cart->accessory->brand}} </h1>
                
                </div>
                <div class="mt-4 ml-6 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-10">
                    <div class="flex items-center">
                        <div class="custom-number-input h-10 w-32">
                            <div class="flex items-center h-10 w-full rounded-lg relative bg-transparent mt-1">
                                <h1 data-action="decrement" wire:click="decrementQuantity({{$cart->id}})" class=" text-center bg-gray-100 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                <span class="m-auto text-2xl font-thin">−</span>
                                </h1>
                                <input type="number" id="quantityInput"  value="{{$cart->quantity}}" class="outline-none  border-white focus:outline-none text-center w-full bg-gray-100 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity" ></input>
                                <h1 data-action="increment" wire:click="incrementQuantity({{$cart->id}})" class="bg-gray-100 text-center text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                <div class="flex items-center space-x-4">
                    @if($cart->accessory->sale_price < $cart->accessory->orig_price)
                    <p class="hidden">{{ $cartSalePrice = $cart->accessory->sale_price * $cart->quantity}}</p>
                    <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                    @php  $totalPrice2 += $cart->accessory->sale_price * $cart->quantity @endphp
                    @else
                    <p class="hidden">{{ $cartOrigPrice = $cart->accessory->orig_price * $cart->quantity}}</p>
                    <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item">{{number_format($cartOrigPrice)}}</span></p>
                    @php  $totalPrice2 += $cart->accessory->orig_price * $cart->quantity @endphp
                    @endif
                    
                      <button type="button" value="{{$cart->id}}" onclick="deleteCart(this)" data-modal-target="deleteCart" data-modal-toggle="deleteCart" class="text-red-700"><i class="fa-solid fa-trash"></i></button>
         
                </div>
                </div>
                
            </div>
            @endif
            @if($cart->strings) 
            <div class="flex bg-white mt-6 p-6 sm:mr-0 lg:mr-6 shadow-md rounded-md">
                <div class="mr-6">
                    <img src="{{ asset($cart->strings->stringImages[0]->images) }}"  class="w-[10vh]" alt="">
                </div>
                <div class="block lg:w-[50vh] sm:w-[22vh]">
                    <h1 class="text-xl font-semi-bold">{{$cart->strings->string_name}} {{$cart->strings->stringCategory}}</h1>
                    @if($cart->strings->sale_price < $cart->strings->orig_price)
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->strings->sale_price)}}</span></p>
                    @else
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->strings->orig_price)}}</span> </p>
                    @endif
                    <h1 class="text-sm text-gray-500">{{$cart->strings->brand}} </h1>
                    <h1 class="text-sm text-gray-500">{{$cart->size}}</h1>
                
                </div>
                <div class="mt-4 ml-6 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-10">
                    <div class="flex items-center">
                        <div class="custom-number-input h-10 w-32">
                            <div class="flex items-center h-10 w-full rounded-lg relative bg-transparent mt-1">
                                <h1 data-action="decrement" wire:click="decrementQuantity({{$cart->id}})" class=" text-center bg-gray-100 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                <span class="m-auto text-2xl font-thin">−</span>
                                </h1>
                                <input type="number" id="quantityInput"  value="{{$cart->quantity}}" class="outline-none  border-white focus:outline-none text-center w-full bg-gray-100 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity" ></input>
                                <h1 data-action="increment" wire:click="incrementQuantity({{$cart->id}})" class="bg-gray-100 text-center text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                <div class="flex items-center space-x-4">
                    @if($cart->strings->sale_price < $cart->strings->orig_price)
                    <p class="hidden">{{ $cartSalePrice = $cart->strings->sale_price * $cart->quantity}}</p>
                    <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                    @php  $totalPrice2 += $cart->strings->sale_price * $cart->quantity @endphp
                    @else
                    <p class="hidden">{{ $cartOrigPrice = $cart->strings->orig_price * $cart->quantity}}</p>
                    <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item">{{number_format($cartOrigPrice)}}</span></p>
                    @php  $totalPrice2 += $cart->strings->orig_price * $cart->quantity @endphp
                    @endif
                    
                      <button type="button" value="{{$cart->id}}" onclick="deleteCart(this)" data-modal-target="deleteCart" data-modal-toggle="deleteCart" class="text-red-700"><i class="fa-solid fa-trash"></i></button>
         
                </div>
                </div>
                
            </div>
            @endif
            @if($cart->guitarEffects) 
            <div class="flex bg-white mt-6 p-6 sm:mr-0 lg:mr-6 shadow-md rounded-md">
                <div class="mr-6">
                    <img src="{{ asset($cart->guitarEffects->guitarEffectsImages[0]->images) }}"  class="w-[10vh]" alt="">
                </div>
                <div class="block lg:w-[50vh] sm:w-[22vh]">
                    <h1 class="text-xl font-semi-bold">{{$cart->guitarEffects->guitar_effects_name}} {{$cart->guitarEffects->guitarEffectsCategory}}</h1>
                    @if($cart->guitarEffects->sale_price < $cart->guitarEffects->orig_price)
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->guitarEffects->sale_price)}}</span></p>
                    @else
                    <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($cart->guitarEffects->orig_price)}}</span> </p>
                    @endif
                    <h1 class="text-sm text-gray-500">{{$cart->guitarEffects->brand}} </h1>
                    <h1 class="text-sm text-gray-500">{{$cart->size}}</h1>
                
                </div>
                <div class="mt-4 ml-6 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-10">
                    <div class="flex items-center">
                        <div class="custom-number-input h-10 w-32">
                            <div class="flex items-center h-10 w-full rounded-lg relative bg-transparent mt-1">
                                <h1 data-action="decrement" wire:click="decrementQuantity({{$cart->id}})" class=" text-center bg-gray-100 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                <span class="m-auto text-2xl font-thin">−</span>
                                </h1>
                                <input type="number" id="quantityInput"  value="{{$cart->quantity}}" class="outline-none  border-white focus:outline-none text-center w-full bg-gray-100 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity" ></input>
                                <h1 data-action="increment" wire:click="incrementQuantity({{$cart->id}})" class="bg-gray-100 text-center text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                <div class="flex items-center space-x-4">
                    @if($cart->guitarEffects->sale_price < $cart->guitarEffects->orig_price)
                    <p class="hidden">{{ $cartSalePrice = $cart->guitarEffects->sale_price * $cart->quantity}}</p>
                    <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                    @php  $totalPrice2 += $cart->guitarEffects->sale_price * $cart->quantity @endphp
                    @else
                    <p class="hidden">{{ $cartOrigPrice = $cart->guitarEffects->orig_price * $cart->quantity}}</p>
                    <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item">{{number_format($cartOrigPrice)}}</span></p>
                    @php  $totalPrice2 += $cart->guitarEffects->orig_price * $cart->quantity @endphp
                    @endif
                    
                      <button type="button" value="{{$cart->id}}" onclick="deleteCart(this)" data-modal-target="deleteCart" data-modal-toggle="deleteCart" class="text-red-700"><i class="fa-solid fa-trash"></i></button>
         
                </div>
                </div>
                
            </div>
            @endif
            @empty
            <div class="text-center text-2xl ">
                <h1>Your Cart is empty</h1>
            </div>
            @endforelse
            
        </div>
        @if($wishlist->isEmpty())

        @else
        <div class="h-full bg-white p-6 mt-6 xl:w-[40vh] sm:w-full rounded-xl">
            <div class="flex justify-between pb-4">
                <p>Subtotal</p>
                <p class="hidden">{{ $grandTotal = $totalPrice += $totalPrice2}}</p>
                <p class=""><i class="fa-solid fa-peso-sign"></i> {{ number_format($grandTotal)}}</p>
            </div>
            <div class="flex justify-between">
                <p>Shipping Fee</p>
                <p>...</p>
            </div>
            <hr class="my-4" />
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">Total</h1>
                <p class="text-xl font-bold"><i class="fa-solid fa-peso-sign"></i> {{number_format($grandTotal)}}</p>
            </div>
            <div class="flex items-center justify-center mt-10">
                <button class="bg-blue-700 p-6 w-full py-2 rounded-md text-white text-center">Checkout</button>
            </div>
        </div>
        @endif
        
    </div>
    </form>
</div>
