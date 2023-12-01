<title>{{$brand_id}}</title>
<x-app-layout>
@include('frontend.frontEndNavbar')
    <div class="p-2 mt-16 text-2xl sm:ml-[30px] 2xl:ml-[110px] 3xl:ml-[290px]">
        <h1>Brands / {{$brand_id}}</h1>
    </div>
<div class="p-4 flex items-center justify-center">
    <livewire:front-end.products.view-brands :products="$products" :brands="$brands" :brand_id="$brand_id"/>
</div>
@include('frontend.frontEndFooter')
</x-app-layout>