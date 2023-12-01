<title>Result for {{$search}}</title>
<x-app-layout>
@include('frontend.frontEndNavbar')
    <div class="p-2 mt-16 text-2xl sm:ml-[30px] 2xl:ml-[110px] 3xl:ml-[290px]">
        <h1>Result for {{$search}}</h1>
    </div>
<div class="p-4 flex items-center justify-center">
    <livewire:front-end.search.search-products :searchProducts="$searchProducts" />
</div>
<div class="mt-16">
@include('frontend.frontEndFooter')
</div>

</x-app-layout>