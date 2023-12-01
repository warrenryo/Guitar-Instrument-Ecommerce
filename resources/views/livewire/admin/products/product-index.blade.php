<div>
<input type="text" id="searchInput" class="rounded-md border-gray-300" placeholder="Search Products...">
<div class="text-gray-900">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left text-gray-500 " id="dataTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Brand
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Original Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sale Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Trending
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
                   @foreach($products as $product)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                           {{$product->id}}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset($product->productImages[0]->images) }}" alt="" class="w-[100px]">
                        </td>
                        <td class="px-6 py-4">
                          {{$product->product_name}}
                        </td>
                        <td class="px-6 py-4">
                           {{$product->category->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$product->brand}}
                        </td>
                        <td class="px-6 py-4">
                            {{$product->color}}
                        </td>
                        <td class="px-6 py-4">
                        <i class="fa-solid fa-peso-sign"></i> {{ number_format($product->original_price)}}
                        </td>
                        <td class="px-6 py-4">
                        <i class="fa-solid fa-peso-sign"></i> {{ number_format($product->sale_price)}}
                        </td>
                        <td class="px-6 py-4">
                         @if($product->quantity > 0 && $product->quantity <= 5)
                            <span class="bg-red-500 text-white rounded-full p-2 py-1 px-6">{{$product->quantity}}</span>
                            @elseif($product->quantity == 0)
                            <span class="bg-black text-white rounded-full p-2 py-1 px-6">{{$product->quantity}}</span>
                            @else
                            <span class="bg-green-500 text-white rounded-full p-2 py-1 px-6">{{$product->quantity}}</span>
                         @endif

                        </td>
                        <td class="px-6 py-4">
                            
                            @if($product->trending == true)
                            <span class="bg-green-500 text-white rounded-full p-2 py-1 px-6">Active</span>
                            @else
                            <span class="bg-red-500 text-white rounded-full p-2 py-1">Not Active</span>
                            @endif
                            
                        </td>
                        <td class="px-6 py-4">
                            
                            @if($product->status == true)
                            <span class="bg-green-500 text-white rounded-full p-2 py-1 px-6">Active</span>
                            @else
                            <span class="bg-red-500 text-white rounded-full p-2 py-1">Not Active</span>
                            @endif
                            
                        </td>
                        <td class="px-6 py-4 flex">
                            <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="bg-white p-2 rounded-md text-blue-700 hover:bg-gray-50 px-4 "><i class="fa-solid fa-edit"></i></a>
                            <button type="button" value="{{$product->id}}" class="delbtn bg-white p-2 rounded-md text-red-600 hover:bg-gray-50 px-4 "><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{$products->links()}}
        </div> 
    </div>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.delbtn', function(){
                var value = $(this).val();

                $(document).on('click', '.delbtn', function(){
                    $('#deleteModal').fadeIn();
                })

                $('#delete_id').val(value);
            })
        })
    </script>
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
