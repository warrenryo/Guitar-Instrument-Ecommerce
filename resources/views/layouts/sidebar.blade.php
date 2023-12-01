<aside>
    <div class="relative top-4">
        <button id="toggleButton" class="fixed float-left ml-2"><i class="fa-solid fa-bars text-xl"></i></button>
    </div>
    <div id="sidebar"  class="bg-white w-0 fixed z-40 overflow-y-auto shadow-md overflow-x-hidden h-screen transform ease-in-out duration-300"> 
       
        <div class="overflow-y-auto overflow-x-hidden">
        <div class="flex mx-4 mt-4 justify-between">
            <p class="font-semibold">MENU</p>
            <button id="closeButton" class=""><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="mt-4">
        <ul class="space-y-2 font-medium">
         <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2">
            <a href="{{ URL::to('admin/dashboard') }}" class="flex items-center">
            <i class="fa-solid fa-tv text-[20px] p-[18px]"></i>
            <span class="-mr-1 font-medium">Dashboard</span>
            </a>
        </li>
        <!-- CATEGORY BUTTONS -->
        <div class="" onclick="dropdown()">
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 cursor-pointer flex items-center">
                <i class="fa-solid fa-list text-[22px] p-[20px]"></i>
                <span class="-mr-1 font-medium" >Guitar Category <i class="fa-solid fa-chevron-up ml-[17px] text-sm duration-300" id="arrow"></i></span>
            </li>
        </div>
        
        <div class=" bg-gray-100" id="sub-menu">
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{ URL::to('admin/category') }}" class="flex items-center ml-5">
                <i class="fa-regular fa-plus text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">Add Category</span>
                </a>
            </li>
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{ URL::to('admin/category/viewCategory') }}" class="flex items-center ml-5">
                <i class="fa-solid fa-list text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">View Category</span>
                </a>
            </li>
        </div>
        <!-- CATEGORY BUTTONS -->
        <!-- GEAR CATEGORY BUTTONS -->
        <div class="" onclick="gearCategory()">
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 cursor-pointer flex items-center">
                <i class="fa-solid fa-list text-[22px] p-[20px]"></i>
                <span class="-mr-1 font-medium" >Gear Category <i class="fa-solid fa-chevron-up ml-[27px] text-sm duration-300" id="arrow2"></i></span>
            </li>
        </div>
        
        <div class="bg-gray-100" id="gearCat">
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{ URL::to('admin/gearCategory/accessories') }}" class="flex items-center ml-5">
                <i class="fa-solid fa-list text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">Accessories</span>
                </a>
            </li>
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{ URL::to('admin/stringCategory/strings') }}" class="flex items-center ml-5">
                <i class="fa-solid fa-list text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">Strings</span>
                </a>
            </li>
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{ URL::to('admin/guitarEffectsCategory/guitarEffects') }}" class="flex items-center ml-5">
                <i class="fa-solid fa-list text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">Guitar Effects</span>
                </a>
            </li>
        </div>
        <!-- GEAR CATEGORY BUTTONS -->
        <!-- BRANDS BUTTONS -->
        <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2">
            <a href="{{ URL::to('admin/brands') }}" class="flex items-center">
            <i class="fa-solid fa-list text-[22px] p-[20px]"></i>
            <span class="-mr-1 font-medium">Brands</span>
            </a>
        </li>
        <!-- BRANDS BUTTONS -->
        <!-- PRODUCT BUTTONS-->
        <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2">
            <a href="{{ URL::to('admin/products') }}" class="flex items-center">
            <i class="fa-solid fa-guitar text-[25px] p-[18px]"></i>
            <span class="-mr-1 font-medium">Guitars</span>
            </a>
        </li>
        <!--PRODUCT BUTTONS-->
         <!-- SLIDER BUTTONS-->
         <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2">
            <a href="{{ URL::to('admin/slider') }}" class="flex items-center">
            <i class="fa-brands fa-product-hunt text-[25px] p-[18px]"></i>
            <span class="-mr-1 font-medium">Slider</span>
            </a>
        </li>
        <div class="" onclick="gearProducts()">
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 cursor-pointer flex items-center">
                <i class="fa-solid fa-list text-[22px] p-[20px]"></i>
                <span class="-mr-1 font-medium" >Gear Products <i class="fa-solid fa-chevron-up ml-[30px] text-sm duration-300" id="arrow1"></i></span>
            </li>
        </div>
        
        <div class="bg-gray-100" id="gear">
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{ URL::to('admin/accessory') }}" class="flex items-center ml-5">
                <i class="fa-solid fa-list text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">Accessories</span>
                </a>
            </li>
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{ URL::to('admin/strings') }}" class="flex items-center ml-5">
                <i class="fa-solid fa-list text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">Strings</span>
                </a>
            </li>
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{ URL::to('admin/guitarEffects') }}" class="flex items-center ml-5">
                <i class="fa-solid fa-list text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">Guitar Effects</span>
                </a>
            </li>
        </div>
        <!--ORDER BUTTONS-->
        @php 
            $pendingOrdersCount = App\Models\Orders::where('status', 'Pending')->count();
        @endphp
        <div class="" onclick="orders()">
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 cursor-pointer flex items-center">
                <i class="fa-solid fa-list text-[22px] p-[20px]"></i>
                <span class="-mr-1 font-medium" >Orders <i class="fa-solid fa-chevron-down ml-[84px] text-sm duration-300" id="order1"></i></span>
            </li>
        </div>
        
        <div class="bg-gray-100 hidden" id="orders">
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{ URL::to('admin/today-orders') }}" class="flex items-center ml-5">
                <i class="fa-solid fa-cart-shopping text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">Today's Order</span>
                </a>
            </li>
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{  URL::to('admin/pendingOrders') }}" class="flex items-center ml-5">
                <i class="fa-solid fa-clock text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">Pending Orders @if($pendingOrdersCount) <span class="text-[10px] p-1 relative bottom-2 text-white bg-red-500 rounded-full ">{{$pendingOrdersCount}} </span> @endif</span>
                </a>
            </li>
            <li class="hover:bg-blue-700 hover:text-white rounded-md mb-2 text-sm">
                <a href="{{ URL::to('admin/orderPlaced') }}" class="flex items-center ml-5">
                <i class="fa-solid fa-list text-[15px] p-[18px]"></i>
                <span class="-mr-1 font-medium">Order Placed</span>
                </a>
            </li>
        </ul>
      </div>
        </div>
    </div>
</aside>

<script>
    const sidebar = document.getElementById('sidebar')
    const toggleButton = document.getElementById('toggleButton')
    const closeButton = document.getElementById('closeButton')
    const category = document.getElementById('category')
    

    function componentForCloseButton()
    {
        document.querySelector('#sub-menu').classList.add('hidden');
        document.querySelector('#arrow').classList.add('rotate-180');
        //for gearProducts
        document.querySelector('#gear').classList.add('hidden');
        document.querySelector('#arrow1').classList.add('rotate-180');
        //for gearCategory
        document.querySelector('#gearCat').classList.add('hidden');
        document.querySelector('#arrow2').classList.add('rotate-180');
        //for Orders
        document.querySelector('#orders').classList.add('hidden');
        document.querySelector('#order1').classList.add('rotate-180');

    }

    toggleButton.addEventListener('click', ()=> {

        if(sidebar.classList.contains('w-0')){
            sidebar.classList.remove('w-0')
            sidebar.classList.add('w-64')
            
        }

    })

    closeButton.addEventListener('click', ()=> {
        if(sidebar.classList.contains('w-64'))
        {
            sidebar.classList.remove('w-64')
            sidebar.classList.add('w-0')
            componentForCloseButton()
            
        }
    })

        function dropdown(){
            document.querySelector('#sub-menu').classList.toggle('hidden');
            document.querySelector('#arrow').classList.toggle('rotate-180');
        }
        function gearProducts()
        {
            document.querySelector('#gear').classList.toggle('hidden');
            document.querySelector('#arrow1').classList.toggle('rotate-180');
        }
        function gearCategory()
        {
            document.querySelector('#gearCat').classList.toggle('hidden');
            document.querySelector('#arrow2').classList.toggle('rotate-180');
        }
        function orders()
        {
            document.querySelector('#orders').classList.toggle('hidden');
            document.querySelector('#order1').classList.toggle('rotate-180');
        }
        gearCategory();
        gearProducts();
        dropdown();
</script>
