<?php

namespace App\Http\Livewire\FrontEnd\Gear;

use Livewire\Component;
use App\Models\GuitarEffects;

class ViewAllGuitarEffects extends Component
{
    private $allGuitarEffects;
    public $availability, $availability2, $priceSort;

    public function mount($allGuitarEffects)
    {
        $this->allGuitarEffects = $allGuitarEffects;
    }
    protected $queryString = [
        'priceSort' => ['except' => '', 'as' => 'price'],
        'availability' => ['except' => '', 'as' => 'filter.availability.i'],
        'availability2' => ['except' => '', 'as' => 'filter.availability.o']
    ];
    public function render()
    {
        $this->allGuitarEffects = GuitarEffects::where('status', '1')
                                ->when($this->priceSort, function($q){
                                    $q->when($this->priceSort == 'price_asc', function($q2){
                                        $q2->orderBy('sale_price', 'ASC');
                                    });
                                    $q->when($this->priceSort == 'price_desc', function($q2){
                                        $q2->orderBy('sale_price', 'DESC');
                                    });
                                })
                                ->when($this->availability, function($q){
                                    $q->when($this->availability == 'instock', function($q2){
                                        $q2->where('quantity', '>', 0);
                                    });
                                })
                                ->when($this->availability2, function($q){
                                    $q->when($this->availability2 == 'outofstock', function($q2){
                                        $q2->where('quantity', '<=', 0);
                                    });
                                })
                                ->paginate(15);
        return view('livewire.front-end.gear.view-all-guitar-effects', [
            'allGuitarEffects' => $this->allGuitarEffects,
        ]);
    }
}
