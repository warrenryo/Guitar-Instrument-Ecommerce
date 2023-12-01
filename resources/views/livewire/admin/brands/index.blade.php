<div>
    @include('livewire.admin.brands.modal-form')
    <div class="p-4">
        <button id="modal" data-modal-target="medium-modal" wire:click="resetInput" data-modal-toggle="medium-modal" class="bg-blue-700 p-2.5 py-2 mr-1 text-sm rounded-md text-white float-right hover:bg-blue-800" type="button" >
        <i class="fa-solid fa-plus mr-1"></i> Add Brands
        </button>
    </div>
    <div class="p-6 text-gray-900">
    <input type="text" id="searchInput" class="rounded-md border-gray-300 text-sm" placeholder="Search Brand...">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-12">
            <table class="w-full text-sm text-left text-gray-500 " id="dataTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Brand Name
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
                    @foreach($brands as $brand)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{$brand->id}}
                        </td>
                        <td class="px-6 py-4">
                            {{$brand->brand_name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$brand->slug}} 
                        </td>
                        <td class="px-6 py-4">
                            {{$brand->status == '1' ? 'Visible':'Hidden'}}
                        </td>
                        <td class="px-6 py-4">
                            <button  wire:click="editBrand({{$brand->id}})" class=" editbtn bg-white p-2 rounded-md text-blue-700 hover:bg-gray-50 px-4 "><i class="fa-solid fa-edit"></i></button>
                            <button type="button" wire:click="deleteBrand({{$brand->id}})" class="delbtn bg-white p-2 rounded-md text-red-600 hover:bg-gray-50 px-4 "><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{$brands->links()}}
        </div> 
    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', '#modal', function(){
                var modal = $('#defaultModal');
                setTimeout(() => {
                    modal.fadeIn();
                }, );
            })

            $(document).on('click', '#cancel', function(){
                setTimeout(() => {
                    $('#defaultModal').fadeOut();
                }, );
            })

            $(document).on('click', '#xbtn', function(){
                setTimeout(() => {
                    $('#defaultModal').fadeOut();
                }, );
            })


            //UPDATE MODAL
            $(document).on('click', '.editbtn', function(){
                setTimeout(() => {
                    $('#updateModal').fadeIn();
                }, );
            })
            $(document).on('click', '#cancel', function(){
                setTimeout(() => {
                    $('#updateModal').fadeOut();
                }, );
            })
            $(document).on('click', '#xbtn', function(){
                setTimeout(() => {
                    $('#updateModal').fadeOut();
                }, );
            })

            //DELETE BTN
            $(document).on('click', '.delbtn', function(){
                $('#deleteModal').fadeIn();
            })
            $(document).on('click', '#cancel', function(){
                $('#deleteModal').fadeOut();
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

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#defaultModal').hide();
            $('#updateModal').hide();
            $('#deleteModal').hide();
        })
    </script>
@endpush
