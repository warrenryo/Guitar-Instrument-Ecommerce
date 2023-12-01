<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class SliderIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $slider = Slider::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.slider.slider-index', compact('slider'));
    }
}
