<div>
@if($searchProducts->isEmpty())
    <h1 class="block items-center justify-center text-lg text-semibold mb-[42vh] mt-[20vh]">No Product found</h1>
    @else
    <div class="mx-auto mb-10 grid max-w-[139vh] lg:max-w-full xl:max-w-full grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 1366:grid-cols-5">
        @foreach($searchProducts as $product)
        <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            @if($product instanceof \App\Models\Product)
            <a href="{{ url('products/'.$product->slug) }}">
                <div class="relative flex items-center justify-center overflow-hidden mt-2">
                    <div>
                        <img src="{{ asset($product->productImages[0]->images) }}" alt="Hotel Photo" class="h-[300px] rounded-xl" />
                        @if($product->quantity > 0 && $product->quantity <= 5)
                            <span class="absolute bottom-0 p-2 bg-yellow-500 rounded-xl px-4 py-0 text-sm text-white">{{$product->quantity}} Item Left</span>
                            @elseif($product->quantity == 0)
                            <span class="absolute bottom-0 p-2 bg-gray-900 rounded-xl px-4 py-0 text-sm text-white">Out Of Stock</span>
                            @else
                            <span class="absolute bottom-0 p-2 bg-green-500 rounded-xl px-4 py-0 text-sm text-white">In Stock</span>
                        @endif
                    </div>
                </div>

                <div class="mt-1 p-2">
                        <h2 class="text-sm tracking-tight text-gray-900 dark:text-white h-[80px]"><span class="text-sm">{{$product->brand}}</span> {{$product->product_name}} <span>{{$product->category->name}}</span> - <span>{{$product->color}}</span></h2>

                    <div class="mt-3 flex items-end justify-between">
                    @if($product->sale_price < $product->original_price)
                    <p class="text-md text-red-500"><span class="bg-red-500 py-0 px-2 rounded-sm text-white ">Sale!</span> <i class="fa-solid fa-peso-sign"></i> {{number_format($product->sale_price)}} <span class="text-gray-400 text-sm italic ml-2 line-through"><i class="fa-solid fa-peso-sign"></i>{{number_format($product->original_price)}}</span></p>
                        @else
                        <p class="text-md text-blue-500"><i class="fa-solid fa-peso-sign"></i> {{number_format($product->original_price)}}</p>
                    @endif
                    </div>
                </div>
            </a>
            @elseif($product instanceof \App\Models\Gear)
                <a href="{{ url('accessories/'.$product->slug) }}">
                    <div class="relative flex items-center justify-center overflow-hidden mt-2">
                        <div>
                            <img src="{{ asset($product->acessoryImages[0]->images) }}" alt="Hotel Photo" class="h-[300px] rounded-xl" />
                            @if($product->quantity > 0 && $product->quantity <= 5)
                                <span class="absolute bottom-0 p-2 bg-yellow-500 rounded-xl px-4 py-0 text-sm text-white">{{$product->quantity}} Item Left</span>
                                @elseif($product->quantity == 0)
                                <span class="absolute bottom-0 p-2 bg-gray-900 rounded-xl px-4 py-0 text-sm text-white">Out Of Stock</span>
                                @else
                                <span class="absolute bottom-0 p-2 bg-green-500 rounded-xl px-4 py-0 text-sm text-white">In Stock</span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-1 p-2">
                            <h2 class="text-sm tracking-tight text-gray-900 dark:text-white h-[80px]"><span class="text-sm">{{$product->brand}}</span> {{$product->accessory_name}} <span>{{$product->gearCategory->accessory_category_name}}</span></h2>

                        <div class="mt-3 flex items-end justify-between">
                        @if($product->sale_price < $product->orig_price)
                        <p class="text-md text-red-500"><span class="bg-red-500 py-0 px-2 rounded-sm text-white ">Sale!</span> <i class="fa-solid fa-peso-sign"></i> {{number_format($product->sale_price)}} <span class="text-gray-400 text-sm italic ml-2 line-through"><i class="fa-solid fa-peso-sign"></i>{{number_format($product->orig_price)}}</span></p>
                            @else
                            <p class="text-md text-blue-500"><i class="fa-solid fa-peso-sign"></i> {{number_format($product->orig_price)}}</p>
                        @endif
                        </div>
                    </div>
                </a>
            @elseif($product instanceof \App\Models\Strings)
            <a href="{{ url('strings/'.$product->slug) }}">
                    <div class="relative flex items-center justify-center overflow-hidden mt-2">
                        <div>
                            <img src="{{ asset($product->stringImages[0]->images) }}" alt="Hotel Photo" class="h-[300px] rounded-xl" />
                            @if($product->quantity > 0 && $product->quantity <= 5)
                                <span class="absolute bottom-0 p-2 bg-yellow-500 rounded-xl px-4 py-0 text-sm text-white">{{$product->quantity}} Item Left</span>
                                @elseif($product->quantity == 0)
                                <span class="absolute bottom-0 p-2 bg-gray-900 rounded-xl px-4 py-0 text-sm text-white">Out Of Stock</span>
                                @else
                                <span class="absolute bottom-0 p-2 bg-green-500 rounded-xl px-4 py-0 text-sm text-white">In Stock</span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-1 p-2">
                            <h2 class="text-sm tracking-tight text-gray-900 dark:text-white h-[80px]"><span class="text-sm">{{$product->brand}}</span> {{$product->string_name}} <span>{{$product->stringCategory}}</span></h2>

                        <div class="mt-3 flex items-end justify-between">
                        @if($product->sale_price < $product->orig_price)
                        <p class="text-md text-red-500"><span class="bg-red-500 py-0 px-2 rounded-sm text-white ">Sale!</span> <i class="fa-solid fa-peso-sign"></i> {{number_format($product->sale_price)}} <span class="text-gray-400 text-sm italic ml-2 line-through"><i class="fa-solid fa-peso-sign"></i>{{number_format($product->orig_price)}}</span></p>
                            @else
                            <p class="text-md text-blue-500"><i class="fa-solid fa-peso-sign"></i> {{number_format($product->orig_price)}}</p>
                        @endif
                        </div>
                    </div>
                </a>
                @elseif($product instanceof \App\Models\GuitarEffects)
                <a href="{{ url('guitar-effects/'.$product->slug) }}">
                        <div class="relative flex items-center justify-center overflow-hidden mt-2">
                            <div>
                                <img src="{{ asset($product->guitarEffectsImages[0]->images) }}" alt="Hotel Photo" class="h-[300px] rounded-xl" />
                                @if($product->quantity > 0 && $product->quantity <= 5)
                                    <span class="absolute bottom-0 p-2 bg-yellow-500 rounded-xl px-4 py-0 text-sm text-white">{{$product->quantity}} Item Left</span>
                                    @elseif($product->quantity == 0)
                                    <span class="absolute bottom-0 p-2 bg-gray-900 rounded-xl px-4 py-0 text-sm text-white">Out Of Stock</span>
                                    @else
                                    <span class="absolute bottom-0 p-2 bg-green-500 rounded-xl px-4 py-0 text-sm text-white">In Stock</span>
                                @endif
                            </div>
                        </div>

                        <div class="mt-1 p-2">
                                <h2 class="text-sm tracking-tight text-gray-900 dark:text-white h-[80px]"><span class="text-sm">{{$product->brand}}</span> {{$product->guitar_effects_name}}</h2>

                            <div class="mt-3 flex items-end justify-between">
                            @if($product->sale_price < $product->orig_price)
                            <p class="text-md text-red-500"><span class="bg-red-500 py-0 px-2 rounded-sm text-white ">Sale!</span> <i class="fa-solid fa-peso-sign"></i> {{number_format($product->sale_price)}} <span class="text-gray-400 text-sm italic ml-2 line-through"><i class="fa-solid fa-peso-sign"></i>{{number_format($product->orig_price)}}</span></p>
                                @else
                                <p class="text-md text-blue-500"><i class="fa-solid fa-peso-sign"></i> {{number_format($product->orig_price)}}</p>
                            @endif
                            </div>
                        </div>
                    </a>

            @endif
        </article>
        @endforeach
    </div>
    @endif
    <div class="pb-10">
        {{$searchProducts->links()}}
    </div>
</div>
