<style>
    #radio_1:checked + label {
	border-color: #3F83F8;
    border-radius: 10px;
	box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    #radio_2:checked + label {
	border-color: #3F83F8;
    border-radius: 10px;
	box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
</style>
<div>
    <div class="mb-4">
        <h3 class="font-semibold text-gray-900 dark:text-white">Contact</h3>
    </div>
    @auth
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email or Mobile Number</label>
        <input type="text" id="email" value="{{auth()->user()->email}}" name="contactInfo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter Email or Mobile Number" required>
        <input type="text" class="hidden" value="{{auth()->user()->id}}" name="user_id">
    </div>
    @else
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email or Mobile Number</label>
        <input type="text" id="email" name="contactInfo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Enter Email or Mobile Number" required>
    </div>
    @endauth
</div>

<div class="mb-6">
    <div class="mb-4">
        <h3 class="font-semibold text-gray-900 dark:text-white">Delivery Method</h3>
    </div>
    <p id="error" class="hidden text-sm text-red-600">*Please select Delivery Method</p>
    <div class="w-[29vh] ">
        <div class="py-2">
            <input class="hidden" id="radio_1" type="radio" value="Pick Up" name="delivery_method" >
            <label class="flex p-2 text-sm bg-white rounded-lg border border-gray-400 cursor-pointer" for="radio_1">
            <i class="fa-solid fa-store mr-2"></i> Pick Up
            </label>
        </div>
        <div class="py-2">
            <input class="hidden" id="radio_2" type="radio" value="Ship" name="delivery_method" >
            <label class="flex p-2 bg-white text-sm rounded-lg border border-gray-400 cursor-pointer" for="radio_2">
            <i class="fa-solid fa-truck-fast mr-2"></i> Ship
            </label>     
        </div>
    </div>
 
</div>
<script>
    document.getElementById('formRequest').addEventListener('submit',function(event){
        const error = document.getElementById('error');
        const radio1 = document.getElementById('radio_1');
        const radio2 = document.getElementById('radio_2');

        if(!radio1.checked && !radio2.checked){
            error.classList.remove('hidden');
            event.preventDefault();
        }else{
            error.classList.add('hidden');
        }
    })
  


</script>