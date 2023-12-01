<title>Sekai Music</title>


<x-app-layout>
@include('frontend.frontEndNavbar')
<div class="flex p-2 mt-24 sm:ml-[15px] 1366:ml-[20px] 2xl:ml-[115px] 3xl:ml-[290px]">
    <h1 class="text-2xl">Featured Products</h1>
</div>

<div class=" flex items-center justify-center">
    <livewire:front-end.products.view-new-products :newProducts="$newProducts"/>
</div>
<div class="mt-10">
@include('frontend.frontEndFooter')
</div>

</x-app-layout>