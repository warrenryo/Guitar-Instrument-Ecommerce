<div>
<div class="text-gray-900 p-6">
    <input type="text" id="searchInput" class="rounded-md border-gray-300 text-sm" placeholder="Search Order...">
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
                    @foreach($orders as $order)
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
                                        <option value="Order Placed">Order Placed</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Shipped">Shipped</option>
                                        <option value="Delivered">Delivered</option>
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
