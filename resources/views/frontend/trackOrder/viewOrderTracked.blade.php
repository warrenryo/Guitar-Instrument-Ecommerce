<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-center p-2 mt-4">
                    <p class="text-[30px]">Sekai Music</p>
                </div>
                
                <div class="p-10 text-gray-900">
                    <div class="flex justify-between mt-4">
                        <div class="block">
                            <h1 class="text-lg font-semibold ">Name: <span class="text-gray-500">{{$trackOrder->firstName}} {{$trackOrder->lastName}}</span></h1>
                        </div> 
                        <div class="block">
                            <p class="text-lg font-semibold">Ordered Date</p>
                            <h1 class="text-sm text-gray-500">{{$trackOrder->created_at->format('d-m-y H:i:s')}}</h1>
                        </div>
                    </div>
                    
                    <div class="w-auto mt-10">
                        <hr class="" />
                    </div>
                    <div class="grid grid-cols-4 gap-10">
                        <div class="block mt-10">
                            <h1 class="text-lg font-semibold ">Tracking Number</h1>
                            <p class="text-gray-500 mt-4 text-sm"># {{$trackOrder->tracking_number}}</p>

                        </div>
                        
                        <div class="block mt-10">
                            <h1 class="text-lg font-semibold ">Contact Info</h1>
                            <p class="text-gray-500 mt-4 text-sm"><i class="fa-solid fa-phone"></i> {{$trackOrder->phoneNumber}}</p>
                            <p class="text-gray-500 mt-4 text-sm"><i class="fa-solid fa-envelope"></i> {{$trackOrder->contactInfo}}</p>
                        </div>
                        <div class="block mt-10">
                            <h1 class="text-lg font-semibold ">Billing Address</h1>
                            <p class="text-gray-500 mt-4 text-sm">  {{$trackOrder->company}} {{$trackOrder->address}} {{$trackOrder->apartment}} {{$trackOrder->postalCode}} {{$trackOrder->city}}</p>
                            
                        </div>
                        <div class="block mt-10">
                            <h1 class="text-lg font-semibold ">Order Information</h1>
                            <p class="text-gray-500 mt-4 text-sm uppercase">{{$trackOrder->payment_method}}</p>
                            @if($trackOrder->delivery_method == 'ship')
                                <p class="text-gray-500 mt-4 text-sm"><i class="fa-solid fa-truck-fast"></i> SHIP</p>
                                @else
                                <p class="text-gray-500 mt-4 text-sm"><i class="fa-solid fa-store"></i> PICK UP</p>
                            @endif
                        </div>
                        
                    </div>
                    <div class="w-auto mt-10">
                        <hr class="" />
                    </div>
                    <div class="sm:block lg:flex">
                        <div class="block">
                        @foreach($trackOrder->cartOrders as $item)
                            @if($item->product)                   
                                <div class="flex bg-white mt-6 p-6 sm:mr-0 lg:mr-6 shadow-md rounded-md">
                                    <div class="mr-6">
                                        <img src="{{ asset($item->product->productImages[0]->images) }}"  class="w-[10vh]" alt="">
                                    </div>
                                    <div class="block lg:w-[60vh] sm:w-full">
                                        <div class="flex justify-between">
                                        <h1 class="text-xl font-semi-bold">{{$item->product->product_name}} {{$item->product->category->name}} - {{$item->product->color}}</h1>
                                            <div class="flex ml-2">
                                                <h1 class="text-sm text-gray-500">Qty: </h1>
                                                <p class="text-sm text-gray-500 ml-2"> {{$item->quantity}}</p>
                                            </div>                                          
                                        </div>
                                        @if($item->product->sale_price < $item->product->original_price)
                                        <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($item->product->sale_price)}}</span></p>
                                        @else
                                        <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($item->product->original_price)}}</span> </p>
                                        @endif
                                        <h1 class="text-sm text-gray-500">{{$item->product->brand}} </h1>
                                    
                                    </div>
                                    <div class="flex items-center space-x-4 w-20 ml-6">
                                        <div>
                                            @if($item->product->sale_price < $item->product->original_price)
                                            <p class="hidden">{{ $cartSalePrice = $item->product->sale_price * $item->quantity}}</p>
                                            <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                                            @php  $totalPrice += $item->product->sale_price * $item->quantity @endphp
                                            @else
                                            <p class="hidden">{{ $cartOrigPrice = $item->product->original_price * $item->quantity}}</p>
                                            <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item-total">{{number_format($cartOrigPrice)}}</span></p>
                                            @php  $totalPrice += $item->product->original_price * $item->quantity @endphp
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                            @endif
                        @endforeach
                        @foreach($trackOrder->cartOrders as $item)
                            @if($item->accessory)                   
                                <div class="flex bg-white mt-6 p-6 sm:mr-0 lg:mr-6 shadow-md rounded-md">
                                    <div class="mr-6">
                                        <img src="{{ asset($item->accessory->acessoryImages[0]->images) }}"  class="w-[10vh]" alt="">
                                    </div>
                                    <div class="block lg:w-[60vh] sm:w-full">
                                        <div class="flex justify-between">
                                        <h1 class="text-xl font-semi-bold">{{$item->accessory->accessory_name}} {{$item->accessory->gearCategory->accessory_category_name}}</h1>
                                            <div class="flex ml-2">
                                                <h1 class="text-sm text-gray-500">Qty: </h1>
                                                <p class="text-sm text-gray-500 ml-2"> {{$item->quantity}}</p>
                                            </div>                                          
                                        </div>   
                                        @if($item->accessory->sale_price < $item->accessory->orig_price)
                                        <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($item->accessory->sale_price)}}</span></p>
                                        @else
                                        <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($item->accessory->orig_price)}}</span> </p>
                                        @endif
                                        <h1 class="text-sm text-gray-500">{{$item->accessory->brand}} </h1>
                                    
                                    </div>
                                    <div class="flex items-center space-x-4 w-20 ml-6">
                                        <div>
                                            @if($item->accessory->sale_price < $item->accessory->orig_price)
                                            <p class="hidden">{{ $cartSalePrice = $item->accessory->sale_price * $item->quantity}}</p>
                                            <p class="text-sm "><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                                            @php  $totalPrice += $item->accessory->sale_price * $item->quantity @endphp
                                            @else
                                            <p class="hidden">{{ $cartOrigPrice = $item->accessory->orig_price * $item->quantity}}</p>
                                            <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item-total">{{number_format($cartOrigPrice)}}</span></p>
                                            @php  $totalPrice += $item->accessory->orig_price * $item->quantity @endphp
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                            @endif
                        @endforeach
                        @foreach($trackOrder->cartOrders as $item)
                            @if($item->strings)                   
                                <div class="flex bg-white mt-6 p-6 sm:mr-0 lg:mr-6 shadow-md rounded-md">
                                    <div class="mr-6">
                                        <img src="{{ asset($item->strings->stringImages[0]->images) }}"  class="w-[10vh]" alt="">
                                    </div>
                                    <div class="block lg:w-[60vh] sm:w-full">
                                        <div class="flex justify-between">
                                            <h1 class="text-xl font-semi-bold">{{$item->strings->string_name}} {{$item->strings->stringCategory}}</h1>
                                            <div class="flex ml-2">
                                                <h1 class="text-sm text-gray-500">Qty: </h1>
                                                <p class="text-sm text-gray-500 ml-2"> {{$item->quantity}}</p>
                                            </div>                                          
                                        </div>     
                                        @if($item->strings->sale_price < $item->strings->original_price)
                                        <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($item->strings->sale_price)}}</span></p>
                                        @else
                                        <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($item->strings->orig_price)}}</span> </p>
                                        @endif
                                        <h1 class="text-sm text-gray-500">{{$item->strings->brand}} </h1>
                                        <h1 class="text-sm text-gray-500">{{$item->size}} </h1>
                                    </div>
                                    <div class="flex items-center space-x-4 w-20 ml-6">
                                        <div>
                                            @if($item->strings->sale_price < $item->strings->orig_price)
                                            <p class="hidden">{{ $cartSalePrice = $item->strings->sale_price * $item->quantity}}</p>
                                            <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                                            @php  $totalPrice += $item->strings->sale_price * $item->quantity @endphp
                                            @else
                                            <p class="hidden">{{ $cartOrigPrice = $item->strings->orig_price * $item->quantity}}</p>
                                            <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item-total">{{number_format($cartOrigPrice)}}</span></p>
                                            @php  $totalPrice += $item->strings->orig_price * $item->quantity @endphp
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                            @endif
                        @endforeach
                        @foreach($trackOrder->cartOrders as $item)
                            @if($item->guitarEffects)                   
                                <div class="flex bg-white mt-6 p-6 sm:mr-0 lg:mr-6 shadow-md rounded-md">
                                    <div class="mr-6">
                                        <img src="{{ asset($item->guitarEffects->guitarEffectsImages[0]->images) }}"  class="w-[10vh]" alt="">
                                    </div>
                                    <div class="block lg:w-[60vh] sm:w-full">
                                        <div class="flex justify-between">
                                            <h1 class="text-xl font-semi-bold">{{$item->guitarEffects->guitar_effects_name}} {{$item->guitarEffects->guitarEffectsCategory}}</h1>
                                            <div class="flex ml-2">
                                                <h1 class="text-sm text-gray-500">Qty: </h1>
                                                <p class="text-sm text-gray-500 ml-2"> {{$item->quantity}}</p>
                                            </div>                                          
                                        </div>     
                                        @if($item->guitarEffects->sale_price < $item->guitarEffects->orig_price)
                                        <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($item->guitarEffects->sale_price)}}</span></p>
                                        @else
                                        <p class="text-sm text-gray-500"><i class="fa-solid fa-peso-sign"></i> <span id="price">{{number_format($item->guitarEffects->orig_price)}}</span> </p>
                                        @endif
                                        <h1 class="text-sm text-gray-500">{{$item->guitarEffects->brand}} </h1>
                                        <h1 class="text-sm text-gray-500">{{$item->size}} </h1>
                                    </div>
                                    <div class="flex items-center space-x-4 w-20 ml-6">
                                        <div>
                                            @if($item->guitarEffects->sale_price < $item->guitarEffects->orig_price)
                                            <p class="hidden">{{ $cartSalePrice = $item->guitarEffects->sale_price * $item->quantity}}</p>
                                            <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="salePrice">{{number_format($cartSalePrice)}}</span></p>
                                            @php  $totalPrice += $item->strings->sale_price * $item->quantity @endphp
                                            @else
                                            <p class="hidden">{{ $cartOrigPrice = $item->guitarEffects->orig_price * $item->quantity}}</p>
                                            <p class="text-sm"><i class="fa-solid fa-peso-sign"></i> <span id="origPrice" class="item-total">{{number_format($cartOrigPrice)}}</span></p>
                                            @php  $totalPrice += $item->guitarEffects->orig_price * $item->quantity @endphp
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                            @endif
                        @endforeach
                        </div>
                        <div class="h-full bg-white shadow-md p-6 mt-6 sm:w-full lg:w-[40vh] rounded-xl">
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
                        </div>           
                    </div>
                    <div class="w-auto mt-10">
                        <hr class="" />
                    </div>
                    <div class="mt-6">
                        <!-- component -->
                        <div class="max-w-xl mx-auto my-4 border-b-2 pb-4">	
                                <div class="flex pb-3">
                                    <div class="flex-1">
                                    </div>

                                    <div class="flex-1">
                                        <div id="status1" class="w-10 h-10 bg-white border-2 border-grey-light mx-auto rounded-full text-lg text-white flex items-center">
                                            <span class="text-gray-400 text-center w-full">1</span>
                                        </div>
                                    </div>


                                    <div class="w-1/6 align-center items-center align-middle content-center flex">
                                        <div class="w-full bg-gray-300  rounded items-center align-middle align-center flex-1">
                                            <div id="processing" class="bg-blue-700 text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 0%"></div>
                                        </div>
                                    </div>
                                
                                    
                                    <div class="flex-1">
                                        <div id="status2" class="w-10 h-10 bg-white border-2 border-grey-light mx-auto rounded-full text-lg text-white flex items-center">
                                            <span class="text-gray-400 text-center w-full">2</span>
                                        </div>
                                    </div>
                                
                                    <div class="w-1/6 align-center items-center align-middle content-center flex">
                                        <div class="w-full bg-gray-300  rounded items-center align-middle align-center flex-1">
                                            <div id="shipped" class="bg-blue-700 text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 0%"></div>
                                        </div>
                                    </div>
                                
                                    <div class="flex-1">
                                        <div id="status3" class="w-10 h-10 bg-white border-2 border-grey-light mx-auto rounded-full text-lg text-white flex items-center">
                                            <span class="text-gray-400 text-center w-full">3</span>
                                        </div>
                                    </div>
                                
                                
                                    <div class="w-1/6 align-center items-center align-middle content-center flex">
                                        <div class="w-full bg-gray-300  rounded items-center align-middle align-center flex-1">
                                            <div id="delivered" class="bg-blue-700 text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 0%"></div>
                                        </div>
                                    </div>


                                    <div class="flex-1">
                                        <div id="status4" class="w-10 h-10 bg-white border-2 border-grey-light mx-auto rounded-full text-lg text-white flex items-center">
                                            <span class="text-gray-400 text-center w-full">4</span>
                                        </div>
                                    </div>
                                
                                
                                    <div class="flex-1">
                                    </div>		
                                </div>
                                
                                <div class="flex text-xs content-center text-center">
                                    <div class="w-1/4">
                                        Order Placed
                                    </div>
                                    
                                    <div class="w-1/4">
                                        Processing
                                    </div>
                                    
                                    <div class="w-1/4">
                                        Shipped
                                    </div>
                                    
                                    <div class="w-1/4">
                                        Delivered
                                    </div>			
                                </div>
                            </div>
                    </div>
                    <div class="py-6 mt-4">
                        <p class="text-gray-500 text-sm">We will send you shipping information on your Email "{{$trackOrder->contactInfo}}" when your items are on the way! We appreciate your business, and hope you enjoy your purchase Thank you!</p>
                    </div>
                    <div class="flex items-center justify-center">
                        <a href="{{ url('/') }}" class="bg-blue-700 text-white p-4">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if($trackOrder->status == 'Order Placed')
            const orderPlaced = document.getElementById('status1');
            orderPlaced.innerHTML = '<span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white"></i></span>';
            orderPlaced.classList.remove('border-grey-light');
            orderPlaced.classList.remove('border-2');
            orderPlaced.classList.remove('bg-white');
            orderPlaced.classList.add('bg-blue-700');
            @elseif($trackOrder->status == 'Processing')
            const orderPlaced = document.getElementById('status1');
            const orderPlaced2 = document.getElementById('status2');
            const processing = document.getElementById('processing');

            orderPlaced.innerHTML = '<span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white"></i></span>';
            orderPlaced.classList.remove('border-grey-light');
            orderPlaced.classList.remove('border-2');
            orderPlaced.classList.remove('bg-white');
            orderPlaced.classList.add('bg-blue-700');
            orderPlaced2.innerHTML = '<span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white"></i></span>';
            orderPlaced2.classList.remove('border-grey-light');
            orderPlaced2.classList.remove('border-2');
            orderPlaced2.classList.remove('bg-white');
            orderPlaced2.classList.add('bg-blue-700');
            processing.style.width = '100%';

            @elseif($trackOrder->status == 'Shipped')
            const orderPlaced = document.getElementById('status1');
            const orderPlaced2 = document.getElementById('status2');
            const orderPlaced3 = document.getElementById('status3');
            const processing = document.getElementById('processing');
            const shipped = document.getElementById('shipped');

            orderPlaced.innerHTML = '<span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white"></i></span>';
            orderPlaced.classList.remove('border-grey-light');
            orderPlaced.classList.remove('border-2');
            orderPlaced.classList.remove('bg-white');
            orderPlaced.classList.add('bg-blue-700');
            orderPlaced2.innerHTML = '<span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white"></i></span>';
            orderPlaced2.classList.remove('border-grey-light');
            orderPlaced2.classList.remove('border-2');
            orderPlaced2.classList.remove('bg-white');
            orderPlaced2.classList.add('bg-blue-700');
            orderPlaced3.innerHTML = '<span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white"></i></span>';
            orderPlaced3.classList.remove('border-grey-light');
            orderPlaced3.classList.remove('border-2');
            orderPlaced3.classList.remove('bg-white');
            orderPlaced3.classList.add('bg-blue-700');
            processing.style.width = '100%';
            shipped.style.width = '100%';
            @elseif($trackOrder->status == 'Delivered')
            const orderPlaced = document.getElementById('status1');
            const orderPlaced2 = document.getElementById('status2');
            const orderPlaced3 = document.getElementById('status3');
            const orderPlaced4 = document.getElementById('status4');
            const processing = document.getElementById('processing');
            const shipped = document.getElementById('shipped');
            const delivered = document.getElementById('delivered');

            orderPlaced.innerHTML = '<span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white"></i></span>';
            orderPlaced.classList.remove('border-grey-light');
            orderPlaced.classList.remove('border-2');
            orderPlaced.classList.remove('bg-white');
            orderPlaced.classList.add('bg-blue-700');
            orderPlaced2.innerHTML = '<span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white"></i></span>';
            orderPlaced2.classList.remove('border-grey-light');
            orderPlaced2.classList.remove('border-2');
            orderPlaced2.classList.remove('bg-white');
            orderPlaced2.classList.add('bg-blue-700');
            orderPlaced3.innerHTML = '<span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white"></i></span>';
            orderPlaced3.classList.remove('border-grey-light');
            orderPlaced3.classList.remove('border-2');
            orderPlaced3.classList.remove('bg-white');
            orderPlaced3.classList.add('bg-blue-700');
            orderPlaced4.innerHTML = '<span class="text-white text-center w-full"><i class="fa fa-check w-full fill-current white"></i></span>';
            orderPlaced4.classList.remove('border-grey-light');
            orderPlaced4.classList.remove('border-2');
            orderPlaced4.classList.remove('bg-white');
            orderPlaced4.classList.add('bg-blue-700');
            processing.style.width = '100%';
            shipped.style.width = '100%';
            delivered.style.width = '100%';
        @endif
    </script>
</x-app-layout>