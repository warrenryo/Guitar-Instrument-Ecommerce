
<div>
<input type="text" id="searchInput" class="rounded-md border-gray-300 text-sm" placeholder="Search...">
    <div id="popup-modal" tabindex="-1" class="fixed hidden top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] h-full bg-gray-600 bg-opacity-50">
        <div class="flex items-center justify-center h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <form action="{{url('admin/deleteCategory')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this Category?</h3>
                        <input type="hidden" name="delete_category" id="delete_id">
                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal"  type="button" class="closeModal text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-12">
        <table class="w-full text-sm text-left text-gray-500 " id="dataTable">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category Name
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
                @foreach($categories as $item)
                <tr class="bg-white border-b  hover:bg-gray-50 ">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        {{$item->id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->status == '0' ? 'Hidden':'Visible'}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ url('admin/category/'.$item->id.'/edit') }}" class="bg-white p-2 rounded-md text-blue-700 hover:bg-gray-50 px-4 "><i class="fa-solid fa-pen-to-square"></i></a>
                        <button type="button" value="{{$item->id}}" class="delbtn bg-white p-2 rounded-md text-red-600 hover:bg-gray-50 px-4 "><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$categories->links()}}
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click', '.delbtn', function(){
                var val = $(this).val();
                var showModal = $('#popup-modal');
                setTimeout(() => {
                    showModal.fadeIn();
                }, );
                $('#delete_id').val(val);
            })
            $(document).on('click', '.closeModal', function(){
                var modal = $('#popup-modal');
                setTimeout(() => {
                    modal.fadeOut();
                }, );
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
