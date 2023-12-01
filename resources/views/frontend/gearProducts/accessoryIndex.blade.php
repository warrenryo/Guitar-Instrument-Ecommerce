<title>{{$accessoryCategory->accessory_category_name}} - Sekai Music</title>
<x-app-layout>
@include('frontend.frontEndNavbar')
<div class="flex">
        <h1 class="p-2 mt-16 text-2xl sm:ml-[30px] 2xl:ml-[110px] 3xl:ml-[290px]"><span>{{$accessoryCategory->accessory_category_name}}</span></h1>
        
    </div>
<div class="p-4 flex items-center justify-center">
    <livewire:front-end.gear.view-accessory :brands="$brands" :categories="$categories" :accessoryCategory="$accessoryCategory"/>
</div>
<div class="mt-6">
@include('frontend.frontEndFooter')
</div>

</x-app-layout>