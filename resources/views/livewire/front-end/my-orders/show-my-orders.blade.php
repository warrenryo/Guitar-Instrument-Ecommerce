<div>
    @if($orders->isEmpty())
    <h1 class="flex items-center justify-center text-lg text-semibold">Your Orders is Empty</h1>

    @else
    <div class="xl:hidden">
        @foreach($orders as $order)
            <div class="block">
                <div class="p-4 bg-white shadow-md my-6 border rounded-lg">
                    <div class="flex p-2">
                        <p class="text-sm font-semibold">ID:</p>
                        <p class="text-sm ml-2">{{$order->id}}</p>
                    </div>
                    <div class="flex p-2">
                        <p class="text-sm font-semibold">Tracking Number:</p>
                        <p class="text-sm ml-2">{{$order->tracking_number}}</p>
                    </div>
                    <div class="flex p-2">
                        <p class="text-sm font-semibold">Name:</p>
                        <p class="text-sm ml-2">{{$order->firstName}} {{$order->lastName}}</p>
                    </div>
                    <div class="flex p-2">
                        <p class="text-sm font-semibold">Phone Number:</p>
                        <p class="text-sm ml-2">{{$order->phoneNumber}}</p>
                    </div>
                    <div class="flex p-2">
                        <p class="text-sm font-semibold">Email:</p>
                        <p class="text-sm ml-2">{{$order->contactInfo}}</p>
                    </div>
                    <div class="flex p-2">
                        <p class="text-sm font-semibold">Billing Address:</p>
                        <p class="text-sm ml-2">{{$order->company}} {{$order->address}} {{$order->apartment}} {{$order->postalCode}} {{$order->city}}</p>
                    </div>
                    <div class="flex p-2">
                        <p class="text-sm font-semibold">Order Info:</p>
                        <p class="text-sm ml-2">{{$order->delivery_method}} {{$order->payment_method}}</p>
                    </div>
                    <div class="flex p-2">
                        <p class="text-sm font-semibold">Order Date:</p>
                        <p class="text-sm ml-2">{{$order->created_at->format('d-m-y H:i:s')}}</p>
                    </div>
                    <div class="flex p-2">
                        <p class="text-sm font-semibold">Order Date:</p>
                        <p class="text-sm ml-2"> @if($order->status == 'Pending')
                                <p class="bg-red-600 p-1 text-center text-sm rounded-md text-white">Pending</p>
                                @else
                                <p class="bg-blue-600 p-1 text-center text-sm rounded-md text-white">{{$order->status}}</p>
                            @endif</p>
                    </div>
                    <div class="flex p-2">
                        <p class="text-sm font-semibold">Action:</p>
                        <td class="px-6 py-4 flex items-center justify-center h-[20vh]">
                            <a href="{{ url('view-myOrders/'.$order->id) }}" class="text-white ml-2 p-1 rounded-md text-sm bg-blue-700 hover:bg-blue-800"><i class="fa-solid fa-eye"></i> View Order</a>
                        </td>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-4">
            {{$orders->links()}}
        </div> 
    </div>
    <div class="sm:hidden xl:block text-gray-900 p-6">
    <input type="text" id="searchInput" class="rounded-md border-gray-300 text-sm" placeholder="Search Orders...">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
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
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Billing Address
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
                            @if($order->status == 'Pending')
                                <p class="bg-red-600 p-2 text-center rounded-md text-white">Pending</p>
                                @else
                                <p class="bg-blue-700 text-center rounded-md p-2 text-white">{{$order->status}}</p>
                            @endif
                        </td>

                        <td class="px-6 py-4 flex items-center justify-center h-[20vh]">
                            <a href="{{ url('view-myOrders/'.$order->id) }}" class="bg-white p-2 rounded-md text-blue-700 hover:bg-gray-50 px-4 "><i class="fa-solid fa-eye"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif
        <div class="mt-4">
            {{$orders->links()}}
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
