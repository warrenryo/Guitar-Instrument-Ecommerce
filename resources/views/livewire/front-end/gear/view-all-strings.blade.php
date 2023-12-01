<div>
<div class="w-full flex mt-6 justify-between">
        <div class="mx-6">
            <span>Filter:</span>
            <button id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox" class="text-black bg-white font-medium rounded-sm text-sm px-5 ml-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                <span>
                    @if($availability === 'instock')
                        <label class="block px-4 py-2 cursor-pointer dark:hover:bg-gray-600 dark:hover:text-white text-sm" >
                            In Stock
                        </label>
                        @else
                        <label class="block px-4 py-2 cursor-pointer dark:hover:bg-gray-600 dark:hover:text-white text-sm" >
                            Availability
                        </label>
                    @endif
                </span>
                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownDefaultCheckbox" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-md shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCheckboxButton">
                    <li>
                        <div class="flex items-center">
                            <input id="instock" type="checkbox" wire:model="availability" value="instock" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="instock" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">In Stock</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="checkbox-item-2" type="checkbox" wire:model="availability2" value="outofstock" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Out of Stock</label>
                        </div>
                    </li>
                </ul>
            </div> 
        </div>
        <div class="mx-6">
            <span class="relative text-sm">Sort By:</span>
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black bg-white px-2 ml-2 font-medium rounded-sm text-sm text-center inline-flex items-center" type="button">
                <span class="">
                        
                    @if($priceSort === 'price_asc') 
                        <label class="block px-4 py-2 cursor-pointer dark:hover:bg-gray-600 dark:hover:text-white text-sm" >
                            Price, low to high
                        </label>
                        @elseif($priceSort === 'featured')
                        <label class="block px-4 py-2 cursor-pointer dark:hover:bg-gray-600 dark:hover:text-white text-sm" >
                            Featured
                        </label>
                        @elseif($priceSort === 'price_desc')
                        <label class="block px-4 py-2 cursor-pointer dark:hover:bg-gray-600 dark:hover:text-white text-sm" >
                            Price, high to low
                        </label>
                        @else
                        <label class="block px-4 py-2 cursor-pointer dark:hover:bg-gray-600 dark:hover:text-white text-sm" >
                            Featured
                        </label>
                    @endif
                </span> 
                <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-md shadow w-44 dark:bg-gray-700">
                <div class="py-2">
                    <div class="">
                        <input class="hidden" id="featured" wire:model="priceSort" type="radio" value="featured" name="price">
                        <label class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-sm" for="featured">
                            Featured
                        </label>
                    </div>
                    <div class="">
                        <input class="hidden" id="low-to-high" wire:model="priceSort" type="radio" name="price" value="price_asc">
                        <label class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-sm" for="low-to-high">
                            Price, low to high
                        </label>
                    </div>  
                    <div class="">
                        <input class="hidden" id="high-to-low" wire:model="priceSort" type="radio" name="price" value="price_desc">
                        <label class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-sm" for="high-to-low">
                            Price, high to low
                        </label>
                    </div>  
                </div>
            </div>
        </div>
    </div>
<div class="mx-auto mb-10 grid max-w-[141vh] lg:max-w-full xl:max-w-full  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 1366:grid-cols-5">
        @forelse($strings as $gearProduct)
        <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="{{ url('strings/'.$gearProduct->slug) }}">
                <div class="relative flex items-center justify-center overflow-hidden mt-2">
                    <div>
                        <img src="{{ asset($gearProduct->stringImages[0]->images) }}" alt="Hotel Photo" class="h-[300px] rounded-xl" />
                        @if($gearProduct->quantity > 0 && $gearProduct->quantity <= 5)
                            <span class="absolute bottom-0 p-2 bg-yellow-500 rounded-xl px-4 py-0 text-sm text-white">{{$gearProduct->quantity}} Item Left</span>
                            @elseif($gearProduct->quantity == 0)
                            <span class="absolute bottom-0 p-2 bg-gray-900 rounded-xl px-4 py-0 text-sm text-white">Out Of Stock</span>
                            @else
                            <span class="absolute bottom-0 p-2 bg-green-500 rounded-xl px-4 py-0 text-sm text-white">In Stock</span>
                        @endif
                    </div>
                </div>

                <div class="mt-1 p-2">
                        <h2 class="text-sm tracking-tight text-gray-900 dark:text-white h-[80px]"><span class="text-sm">{{$gearProduct->brand}}</span> {{$gearProduct->string_name}} <span>{{$gearProduct->stringCategory}}</span></h2>

                    <div class="mt-3 flex items-end justify-between">
                    @if($gearProduct->sale_price < $gearProduct->orig_price)
                    <p class="text-md text-red-500"><span class="bg-red-500 py-0 px-2 rounded-sm text-white ">Sale!</span> <i class="fa-solid fa-peso-sign"></i> {{number_format($gearProduct->sale_price)}} <span class="text-gray-400 text-sm italic ml-2 line-through"><i class="fa-solid fa-peso-sign"></i>{{number_format($gearProduct->orig_price)}}</span></p>
                        @else
                        <p class="text-md text-blue-500"><i class="fa-solid fa-peso-sign"></i> {{number_format($gearProduct->orig_price)}}</p>
                    @endif
                    </div>
                </div>
            </a>
        </article>
        @empty
            <div class="text-sm">
                No Instruments Found
            </div>
        @endforelse
    </div>
    <div class="pb-10">
    {{$strings->links()}}
    </div>
</div>
