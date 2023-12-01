
<div>
<div class="mb-4">
    <h3 class="font-semibold text-gray-900 dark:text-white">Payment Method</h3>
    <p id="helper-radio-text" class="text-sm font-normal text-gray-500 dark:text-gray-300 ">
        All transactions are secure and encrypted.
    </p> 
</div>
<ul class="w-[60vh] text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600" id="swiftpay">
        <div class="block items-center pl-3 py-6">
            <input id="list-radio-license" required type="radio" value="Swift Pay" name="payment_method" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="list-radio-license" class="w-full py-6 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Secure Online Transfer via SwiftPay</label>
            <div class="flex mt-2 ml-8">
                <img src="{{ asset('banklogos/swiftpay.png') }}" alt="" class="w-[50px]">
                <img src="{{ asset('banklogos/bpi.png') }}" alt="" class="w-[50px] ml-2">
                <img src="{{ asset('banklogos/bdo.png') }}" alt="" class="w-[50px] h-[40px] ml-2">
            </div>
        </div>
    </li>
    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600" id="paymongo">
        <div class="block items-center pl-3 py-6">
            <input id="list-radio-id" type="radio" required value="PayMongo" name="payment_method" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="list-radio-id" class="w-full py-6 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Secure Payments via PayMongo</label>
            <div class="flex mt-2 ml-8">
                <img src="{{ asset('banklogos/mastercard.png') }}" alt="" class="w-[45px] h-[40px]">
                <img src="{{ asset('banklogos/visa.png') }}" alt="" class="w-[50px] h-[40px] ml-2">
                <img src="{{ asset('banklogos/gcash.png') }}" alt="" class="w-[70px] h-[40px] ml-2">
                <img src="{{ asset('banklogos/bpi.png') }}" alt="" class="w-[50px] ml-2">
            </div>
        </div>
    </li>
    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
        <div class="block items-center pl-3 py-6">
            <input id="list-radio-millitary" type="radio" required value="Cash on Delivery" name="payment_method" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="list-radio-millitary" class="w-full py-6 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash On Delivery (COD)</label>
            <p id="helper-radio-text" class="text-xs font-normal text-gray-500 dark:text-gray-300 mt-2 ml-8">
                We do not accept COD as Payment Method for International Orders
            </p> 
        </div>
    </li>
    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600" id="bankdeposit">
        <div class="block items-center pl-3 py-6">
            <input id="list-radio-passport" type="radio" required value="Bank Deposit" name="payment_method" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="list-radio-passport" class="w-full py-6 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bank Deposit</label>
        </div>
    </li>
    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600"id="gcash">
        <div class="block items-center pl-3 py-6">
            <input id="list-radio" type="radio" value="GCash" required name="payment_method" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="list-radio" class="w-full py-6 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gcash</label>
            <p id="helper-radio-text" class="text-xs font-normal text-gray-500 dark:text-gray-300 mt-2 ml-8">
                Pay via GCash by sending your payment to our mobile number. Pwede magpadala ng bayad gamit ang inyong GCash mobile number.
            </p> 
        </div>
    </li>
</ul>


</div>
