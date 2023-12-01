<title>{{$guitarEffectsCategory->guitarEffectsCategory_name}} - Sekai Music</title>
<x-app-layout>
@include('frontend.frontEndNavbar')
<div class="flex">
        <h1 class="p-2 mt-16 text-2xl sm:ml-[30px] 2xl:ml-[110px] 3xl:ml-[290px]"><span>{{$guitarEffectsCategory->guitarEffectsCategory_name}}</span></h1>
        
    </div>
<div class="p-[26px] flex items-center justify-center">
    <livewire:front-end.gear.view-guitar-effects :guitarEffectsProd="$guitarEffectsProd" :guitarEffectsCategory="$guitarEffectsCategory" />
</div>
@include('frontend.frontEndFooter')

</x-app-layout>