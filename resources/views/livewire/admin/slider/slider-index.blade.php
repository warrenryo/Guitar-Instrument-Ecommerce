<div>
<div class="text-gray-900 p-6">
<input type="text" id="searchInput" class="rounded-md border-gray-300 text-sm" placeholder="Search Slider...">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
            <table class="w-full text-sm text-left text-gray-500 " id="dataTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slider Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
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
                    @foreach($slider as $slider_item)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{$slider_item->id}}
                        </td>
                        <td class="px-6 py-4">
                            {{$slider_item->title}}
                        </td>
                        <td class="px-6 py-4">
                            @if($slider_item->image == null)
                                <span>No Photo Uploaded</span>
                                @else
                                <img src="{{asset($slider_item->image)}}" style="width: 70px; height: 50px;">
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{$slider_item->description}}
                        </td>
                        <td class="px-6 py-4">
                            @if($slider_item->status == '1')
                                <span class="bg-green-600 p-2 text-white rounded-md hover:bg-green-700">Active</span>
                                @else
                                <span class="bg-red-600 p-2 text-white rounded-md hover:bg-red-700">Inactive</span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4 flex">
                            <a href="{{ url('admin/editSlider/'.$slider_item->id.'/edit') }}" class="bg-white p-2 rounded-md text-blue-700 hover:bg-gray-50 px-4 "><i class="fa-solid fa-edit"></i></a>
                            <button type="button" value="{{$slider_item->id}}" class="delbtn bg-white p-2 rounded-md text-red-600 hover:bg-gray-50 px-4 "><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{$slider->links()}}
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
