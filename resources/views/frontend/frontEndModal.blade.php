
<!--INSTRUMENT MODAL -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Instruments
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 grid grid-cols-3 gap-4">
                @forelse($categories as $category)
                <div class="max-w-sm bg-white border  border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ url('/category/'.$category->slug) }}">
                        <img class="rounded-t-lg" src="{{ asset($category->image) }}" alt="" />
                    </a>
                    <div class="p-5 ">
                        <a href="#">
                            <h5 class="mb-2  text-2xl tracking-tight text-gray-900 dark:text-white p-4">{{$category->name}}</h5>
                        </a>
                    </div>
                </div>
                @empty
                    <div class="text-sm">
                        No Instruments Found
                    </div>
                @endforelse
                
            </div>
            <!-- Modal footer -->
        </div>
    </div>
</div>
<!--INSTRUMENT MODAL -->

<!--BRAND MODAL -->
<div id="brands" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Brands
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="brands">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="mx-auto grid max-w-7xl  grid-cols-1 gap-6 p-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @forelse($brands as $brand)
                <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="{{ url('/brands/'.$brand->brand_name) }}">
                        <div class="mt-1 p-2 ">
                            <h2 class="text-sm h-4 flex items-center justify-center tracking-tight text-gray-900 dark:text-white hover:text-blue-700">{{$brand->brand_name}}</h2>
                        </div>
                    </a>
                </article>
                @empty
                    <div class="text-sm flex items-center justify-center">
                        <h1>No Brand Found</h1>
                    </div>
                @endforelse
            </div>
            <!-- Modal footer -->
        </div>
    </div>
</div>
<!--BRAND MODAL -->

<!--GEAR MODAL -->
<div id="gears" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Gears
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="gears">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <h1 class="flex items-center justify-center mt-4">Accessories:</h1>
            <div class="mx-auto  max-w-7xl  grid-cols-5 gap-6 p-6 sm:grid-cols-5 md:grid-cols-5 lg:grid-cols-5">
                
                @forelse($accessCategories as $gearCategory)
                <article class="rounded-xl bg-white shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="{{ url('/gear/accessory/'.$gearCategory->slug) }}">
                        <div class="mt-1 p-2 ">
                            <h2 class="text-sm h-4 flex items-center justify-center tracking-tight text-gray-900 dark:text-white hover:text-blue-700">{{$gearCategory->accessory_category_name}}</h2>
                        </div>
                    </a>
                </article>
                @empty
                    <div class="text-sm flex items-center justify-center">
                        <h1>No Brand Found</h1>
                    </div>
                @endforelse
                <article class="rounded-xl bg-white shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="{{ url('gear/allAccessory') }}">
                        <div class="mt-1 p-2 ">
                            <h2 class="text-sm flex items-center justify-center tracking-tight text-gray-900 dark:text-white hover:text-blue-700">All Accessories</h2>
                        </div>
                    </a>
                </article>
            </div>

            <!--String Modal -->
            <h1 class="flex items-center justify-center mt-4">Strings:</h1>
            <div class="mx-auto max-w-7xl p-6">
                
                @forelse($stringsCategory as $stringCat)
                <article class="rounded-xl bg-white shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="{{ url('/gear/string/'.$stringCat->slug) }}">
                        <div class="mt-1 p-2 ">
                            <h2 class="text-sm flex items-center justify-center tracking-tight text-gray-900 dark:text-white hover:text-blue-700">{{$stringCat->string_category_name}}</h2>
                        </div>
                    </a>
                </article>
                @empty
                    <div class="text-sm flex items-center justify-center">
                        <h1>No Brand Found</h1>
                    </div>
                @endforelse
                <article class="rounded-xl bg-white shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="{{ url('gear/allStrings') }}">
                        <div class="mt-1 p-2 ">
                            <h2 class="text-sm flex items-center justify-center tracking-tight text-gray-900 dark:text-white hover:text-blue-700">All Strings</h2>
                        </div>
                    </a>
                </article>
            </div>
            <!--Guitar Effects Modal -->
            <h1 class="flex items-center justify-center mt-4">Guitar Effects:</h1>
            <div class="mx-auto max-w-7xl p-6">     
                @forelse($gEffectsCat as $effectsCat)
                <article class="rounded-xl bg-white shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="{{ url('/gear/guitar-effects/'.$effectsCat->slug) }}">
                        <div class="mt-1 p-2 ">
                            <h2 class="text-sm flex items-center justify-center tracking-tight text-gray-900 dark:text-white hover:text-blue-700">{{$effectsCat->guitarEffectsCategory_name}}</h2>
                        </div>
                    </a>
                </article>
                @empty
                    <div class="text-sm flex items-center justify-center">
                        <h1>No Brand Found</h1>
                    </div>
                @endforelse
                <article class="rounded-xl bg-white shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="{{ url('gear/allGuitarEffects') }}">
                        <div class="mt-1 p-2 ">
                            <h2 class="text-sm flex items-center justify-center tracking-tight text-gray-900 dark:text-white hover:text-blue-700">All Guitar Effects</h2>
                        </div>
                    </a>
                </article>
            </div>
            <!-- Modal footer -->
        </div>
    </div>
</div>
<!--GEAR MODAL -->