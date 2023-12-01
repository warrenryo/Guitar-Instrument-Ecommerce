<div>
<div class="text-gray-900 p-6">
    <input type="text" id="searchInput" class="rounded-md border-gray-300 text-sm" placeholder="Search Category...">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
            <table class="w-full text-sm text-left text-gray-500 " id="dataTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            String Category Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slug
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
                   @foreach($stringCategory as $category)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                          {{$category->id}}
                        </td>
                        <td class="px-6 py-4">
                            {{$category->string_category_name}}
                        </td>
                        <td class="px-6 py-4">
                           {{$category->slug}}
                        </td>
                        <td class="px-6 py-4">
                            @if($category->status == 1)
                                <span class="bg-green-500 text-white rounded-full p-2 py-1 px-6">Active</span>
                                @else
                                <span class="bg-red-500 text-white rounded-full p-2 py-1 px-6">In Active</span>
                            @endif
                        </td>                   
                        <td class="px-6 py-4 flex">
                            <a href="{{ url('admin/editStringCategory/'.$category->id) }}" class="bg-white p-2 rounded-md text-blue-700 hover:bg-gray-50 px-4 "><i class="fa-solid fa-edit"></i></a>
                            <button type="button" value="{{$category->id}}" onclick="deleteStringCatBtn(this)" data-modal-target="deleteStringCategory" data-modal-toggle="deleteStringCategory" class="delbtn bg-white p-2 rounded-md text-red-600 hover:bg-gray-50 px-4 "><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{$stringCategory->links()}}
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
