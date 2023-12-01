<title>{{$stringProduct->brand}} {{$stringProduct->string_name}}</title>
<x-app-layout>
    @include('frontend.frontEndNavbar')
    
<div class="p-4 flex justify-center mb-20 ">
    <div class="grid gap-4 w-[50vh] mt-8 640:h-[50%]">
        @if($stringProduct->stringImages)
        <div>
            <img class="h-auto max-w-full rounded-lg" src="{{asset($stringProduct->stringImages[0]->images)}}" alt="">
        </div>
       
        <div class="grid grid-cols-2 gap-4">
            @foreach($stringProduct->stringImages as $index => $image)
                @if($index === 0)
                    @continue
                @endif
                <img class="h-auto max-w-full rounded-lg" src="{{asset($image->images)}}" onclick="toggleSizeImage(this)" alt="">
            @endforeach
        </div>
        @endif
    </div>

    <div class=" p-6 block w-[55vh]">
            <h1 class="text-2xl tracking-tight text-gray-900 dark:text-white "><span class="text-2xxl">{{$stringProduct->brand}}</span> {{$stringProduct->string_name}} <span>{{$stringProduct->stringCategory}}</span></h1>

        <div class="mt-4 flex items-end justify-between">
            @if($stringProduct->sale_price < $stringProduct->orig_price)
            <p class="text-md text-red-500"><span class="bg-red-500 py-0 px-2 rounded-sm text-white ">Sale!</span> <i class="fa-solid fa-peso-sign"></i> {{$stringProduct->sale_price}} <span class="text-gray-400 text-sm italic ml-2 line-through"><i class="fa-solid fa-peso-sign"></i>{{$stringProduct->orig_price}}</span></p>
                @else
                <p class="text-md text-blue-500"><i class="fa-solid fa-peso-sign"></i> {{$stringProduct->orig_price}}</p>
            @endif
      
          
        </div>
        <div class="mt-6">
        @if($stringProduct->quantity > 0 && $stringProduct->quantity <= 5)
                <span class="absolute  p-4 bg-yellow-500 rounded-xl px-4 py-0 text-sm text-white">{{$stringProduct->quantity}} Item Left</span>
                @elseif($stringProduct->quantity == 0)
                <span class="absolute p-4 bg-gray-900 rounded-xl px-4 py-0 text-sm text-white">Out Of Stock</span>
                @else
                <span class="absolute  p-4 bg-green-500 rounded-xl px-4 py-0 text-sm text-white">In Stock</span>
            @endif
        </div>
        <div class="mt-20">
                @if($stringProduct->quantity == 0)
                    <h2>No Stock at the moment</h2>
                @endif
        </div>
   
        <!--BUY NOW-->
        <div class="mt-8 block">
           
            @if($stringProduct->quantity == 0)
            <div class="sm:flex">
                <a href="{{ url('wishlist/'.$stringProduct->id) }}" class="border-2 p-[14.4px] px-10 border-black disabled">Add to Cart</a>
                <a href="{{ url('buyNow/'.$stringProduct->slug) }}" class="bg-blue-700 p-4 text-white px-10 disabled" >Buy it Now</a>
            </div>
            @else
            <form action="{{url('cart/'.$stringProduct->slug)}}" method="POST">
                @csrf
                     <!--SIZES-->
                @if($stringProduct->stringGauge)
                <p id="error" class="hidden text-red-500 text-sm py-2">*Please select String Gauge</p>
                    <h1 class="text-gray-500">Available Gauge:</h1>
                    <div class="mt-2">
                        @forelse($stringProduct->stringGauge as $gauge) 
                            @if(!is_null($gauge->string_gauge))        
                            <div class="flex items-center mb-4">
                                <input id="size" type="radio" required value="{{$gauge->string_gauge}}" name="size" class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-300">{{$gauge->string_gauge}}</label>
                            </div>
                            @endif 
                        @empty
                        
                        @endforelse
                    </div>
                @endif
                <!--SIZES-->
                <label for="" class="text-sm text-gray-500">Quantity</label>
                <div class="mt-2">
                    <input type="number" min="1" value="1" name="quantity" id="inputNumber" class="bg-gray-50 text-center w-20 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                <div class="flex mt-4">
                <button type="submit" class="border-2 my-2 lg:px-10 sm:px-6 border-black mr-4">Add to Cart</button>
                </form>
                <form action="{{ url('oneProduct-checkout/strings/'.$stringProduct->slug) }}" method="GET" id="form2">
                    @csrf
                    <input type="text" id="size2" class="hidden" name="stringSize">
                    <input type="text" id="quantity2" name="quantity" value="1" class="hidden">
                <button  class="bg-blue-700 lg:p-4 sm:p-2 relative top-2 text-white lg:px-10 sm:px-6" >Buy it Now</button>
                </form>
                
                </div>      
            @endif
        </div>
        <!--SMALL DESCRIPTION-->
        <div class="mt-10 text-gray-500">
            <h1 class="whitespace-pre-line">{{$stringProduct->small_description}}</h1>
        </div>
        <div class="mt-10 text-gray-500">
            <h1 class="whitespace-pre-line">{{$stringProduct->description}}</h1>
        </div>
    </div>
</div>
<div class="">
    <div class="flex p-2 mt-24 sm:ml-[15px] 1366:ml-[20px] 2xl:ml-[115px] 3xl:ml-[290px]">
        <h1 class="text-2xl">You may also like</h1>
    </div>
    @include('frontend.similarProducts.similarProductsIndex')
</div>
@include('frontend.frontEndFooter')

<script>
    function toggleSizeImage(image)
    {
        image.classList.toggle('large-image');
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
<script>
    //if the input has been foreached
 document.addEventListener('DOMContentLoaded', function() {
    const radioButtons = document.querySelectorAll('input[name="size"]');
    const displaySelectedGauge = document.getElementById('size2');
    const error = document.getElementById('error');
    
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('change', function() {
            if (this.checked) {
                displaySelectedGauge.value = this.value;
            }
        });
    });

    const form = document.getElementById('form2');
    form.addEventListener('submit', function(event){
        if(!displaySelectedGauge.value)
        {
            error.classList.remove('hidden');

            setTimeout(() => {
                error.classList.add('hidden');
            }, 5000);
            event.preventDefault(); 
        }
    })
});



</script>
<script>
  function decrement(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value--;
    if(value < 1)
    {
        value = 1;
    }
    target.value = value;
  }

  function increment(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value++;
    if(value > 10)
    {
        value = 10;
    }
    target.value = value;
  }

  const decrementButtons = document.querySelectorAll(
    `button[data-action="decrement"]`
  );

  const incrementButtons = document.querySelectorAll(
    `button[data-action="increment"]`
  );

  decrementButtons.forEach(btn => {
    btn.addEventListener("click", decrement);
  });

  incrementButtons.forEach(btn => {
    btn.addEventListener("click", increment);
  });

</script>

</x-app-layout>