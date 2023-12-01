<div>

<!-- Main modal -->
<div id="approveModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Approve all Status
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="approveModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ url('admin/approve-all') }}" method="POST">
                @csrf
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Do you want to approve all pending status?
                    </p>
                    <input type="hidden" name="status" value="Order Placed">
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="approveModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="text-gray-900 p-6">
    <div class="flex justify-between">   
        <form action="" method="GET">
            <input type="search" id="" value="{{ Request::get('search')}}" name="search" class="rounded-md border-gray-300 text-sm" placeholder="Search Order...">
        </form>
        <!-- Modal toggle -->
        <button data-modal-target="approveModal" data-modal-toggle="approveModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        <i class="fa-solid fa-check"></i> Approve All
        </button>
    </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left text-gray-500 " id="dataTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tracking Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer's Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer's Phone Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer's Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer's Billing Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Delivery Method
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Payment Method
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ordered Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingOrders as $order)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{$order->id}}
                        </td>
                        <td class="px-6 py-4 uppercase text-sm">
                            {{$order->tracking_number}}
                        </td>    
                        <td class="px-6 py-4 uppercase text-sm">
                            {{$order->firstName}} {{$order->lastName}}
                        </td>     
                        <td class="px-6 py-4 uppercase text-sm">
                            {{$order->phoneNumber}}
                        </td> 
                        <td class="px-6 py-4 ">
                            <i class="fa-solid fa-envelope"></i> {{$order->contactInfo}}
                        </td> 
                        <td class="px-6 py-4 uppercase text-sm">
                            {{$order->company}} {{$order->address}} {{$order->apartment}} {{$order->postalCode}} {{$order->city}}
                        </td> 
                        <td class="px-6 py-4 uppercase text-sm">
                            @if($order->delivery_method == 'ship')
                                <p><i class="fa-solid fa-truck-fast"></i> SHIP</p>
                                @else
                                <p><i class="fa-solid fa-store"></i> PICK UP</p>
                            @endif
                        </td>
                        <td class="px-6 py-4 uppercase text-sm">
                            {{$order->payment_method}}
                        </td> 
                        <td class="px-6 py-4 uppercase text-sm">
                            {{$order->created_at->format('d-m-y H:i:s')}}
                        </td>
                        <td class="px-6 py-4 uppercase text-sm">
                            <form action="{{url('admin/status/'.$order->id)}}" method="POST">
                                @csrf
                                <div class="flex">
                                    <select id="countries" name="status" class="bg-gray-50 w-[15vh] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected value="{{$order->status}}">{{$order->status}}</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Order Placed">Approve</option> 
                                    </select>
                                    <button type="submit" class="p-2 bg-blue-700 ml-2 text-white rounded-sm hover:bg-blue-800"><i class="fa-solid fa-check"></i></button>
                                </div>
                            </form>  
                        </td>

                        <td class="px-6 py-4 flex items-center justify-center h-[20vh]">
                            <a href="{{ url('admin/view-orders/'.$order->id) }}" class="bg-white p-2 rounded-md text-blue-700 hover:bg-gray-50 px-4 "><i class="fa-solid fa-eye"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
     
        </div> 
    </div>
    <script>
        const searchInput = document.getElementById('searchInput');
        const dataTable = document.getElementById('dataTable');
        const tableRows = dataTable.getElementsByTagName('tr');

        searchInput.addEventListener('keyup', function() {
            const searchValue = searchInput.value.toLowerCase();

            for (let i = 1; i < tableRows.length; i++) {
            const rowData = tableRows[i].innerText.toLowerCase();

            if (rowData.includes(searchValue)) {
                tableRows[i].style.display = '';
            } else {
                tableRows[i].style.display = 'none';
            }
            }
        });
    </script>
</div>
