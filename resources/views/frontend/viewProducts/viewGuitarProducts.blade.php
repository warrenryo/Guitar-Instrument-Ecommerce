<title>{{$guitarProducts->brand}} {{$guitarProducts->product_name}}</title>
<x-app-layout>
    @include('frontend.frontEndNavbar')
    
<div class="p-4 flex justify-center mb-20 ">
    <div class="grid gap-4 w-[50vh] mt-8 640:h-[50%] ">
        @if($guitarProducts->productImages)
        <div>
            <img class="h-auto max-w-full rounded-lg" src="{{asset($guitarProducts->productImages[0]->images)}}" alt="">
        </div>
        
        <div class="grid grid-cols-2 gap-4">
            @foreach($guitarProducts->productImages as $index => $image)
                @if($index === 0)
                    @continue
                @endif
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="{{asset($image->images)}}" onclick="toggleSizeImage(this)" alt="">
                </div>
            @endforeach
        </div>
        @endif
    </div>

    <div class=" p-6 block w-[55vh]">
            <h1 class="text-2xl tracking-tight text-gray-900 dark:text-white "><span class="text-2xxl">{{$guitarProducts->brand}}</span> {{$guitarProducts->product_name}} <span>{{$guitarProducts->category->name}}</span> - <span>{{$guitarProducts->color}}</span></h1>

        <div class="mt-4 flex items-end justify-between">
            @if($guitarProducts->sale_price < $guitarProducts->original_price)
            <p class="text-md text-red-500"><span class="bg-red-500 py-0 px-2 rounded-sm text-white ">Sale!</span> <i class="fa-solid fa-peso-sign"></i> {{number_format($guitarProducts->sale_price)}} <span class="text-gray-400 text-sm italic ml-2 line-through"><i class="fa-solid fa-peso-sign"></i>{{number_format($guitarProducts->original_price)}}</span></p>
                @else
                <p class="text-md text-blue-500"><i class="fa-solid fa-peso-sign"></i> {{number_format($guitarProducts->original_price)}}</p>
            @endif
      
          
        </div>
        <div class="mt-6">
        @if($guitarProducts->quantity > 0 && $guitarProducts->quantity <= 5)
                <span class="absolute  p-4 bg-yellow-500 rounded-xl px-4 py-0 text-sm text-white">{{$guitarProducts->quantity}} Item Left</span>
                @elseif($guitarProducts->quantity == 0)
                <span class="absolute p-4 bg-gray-900 rounded-xl px-4 py-0 text-sm text-white">Out Of Stock</span>
                @else
                <span class="absolute  p-4 bg-green-500 rounded-xl px-4 py-0 text-sm text-white">In Stock</span>
            @endif
        </div>
        <div class="mt-20">
                @if($guitarProducts->quantity == 0)
                    <h2>No Stock at the moment</h2>
                @endif
        </div>
        <!--BUY NOW-->
        <div class="mt-20 block">
            
            @if($guitarProducts->quantity == 0)
            <div class="sm:flex">
                <a href="{{ url('wishlist/'.$guitarProducts->id) }}" class="border-2 p-[14.4px] px-10 border-black disabled">Add to Cart</a>
                <a href="{{ url('buyNow/'.$guitarProducts->slug) }}" class="bg-blue-700 p-4 text-white px-10 disabled" >Buy it Now</a>
            </div>
    
            @else
            <div class=" mt-6">
                <form action="{{ url('wishlist/'.$guitarProducts->slug) }}" method="POST">
                @csrf 
                <div class="">
                <label for="" class="text-sm text-gray-500">Quantity</label>
                <div class="mt-2">
                    <input type="number" min="1" value="1" name="quantity" id="inputNumber" class="bg-gray-50 text-center w-20 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                </div>   
                <div class="flex mt-4">
                <button type="submit" class="border-2 my-2 lg:px-10 sm:px-6 border-black mr-4">Add to Cart</button>
                </form>
                <form action="{{ url('oneProduct-checkout/guitars/'.$guitarProducts->slug) }}" method="GET">
                    @csrf
                    <input type="text" id="quantity2" name="quantity" value="1" class="hidden">
                <button  class="bg-blue-700 lg:p-4 sm:p-2 relative top-2 text-white lg:px-10 sm:px-6" >Buy it Now</button>
                </form>
                
                </div>        
            </div>        
            @endif
        </div>
        <!--SMALL DESCRIPTION-->
        <div class="">
            <div class="mt-20 text-gray-500">
                <h1 class="whitespace-pre-line">{{$guitarProducts->small_description}}</h1>
            </div>
            
            <div class="mt-20 text-gray-500">
                <h1 class="text-2xl mb-6">Specifications:</h1>
                <h1 class="whitespace-pre-line">{{$guitarProducts->description}}</h1>
            </div>
        </div>
    </div>
</div>
<!--end-->
<div class="">
    <div class="flex p-2 mt-24 sm:ml-[15px] 1366:ml-[20px] 2xl:ml-[115px] 3xl:ml-[290px]">
        <h1 class="text-2xl">You may also like</h1>
    </div>
    @include('frontend.similarProducts.similarProductsIndex')
</div>
<div class="">
@include('frontend.frontEndFooter')
</div>


<script>
    function toggleSizeImage(image)
    {
        image.classList.toggle('large-image')
        document.body.classList.toggle('no-scroll');
    document.documentElement.classList.toggle('no-scroll');
    }

</script>
<script>
  const inputNumber = document.getElementById('inputNumber');
const displayInput = document.getElementById('quantity2');

// Add an event listener to the inputNumber
inputNumber.addEventListener('input', function() {
    const value = inputNumber.value;
    displayInput.value = value; // Display the value in the other input
});
</script>

</x-app-layout>