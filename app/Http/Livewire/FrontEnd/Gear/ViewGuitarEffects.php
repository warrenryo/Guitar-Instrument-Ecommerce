<?php

namespace App\Http\Livewire\FrontEnd\Gear;

use Livewire\Component;
use App\Models\GuitarEffects;

class ViewGuitarEffects extends Component
{
    private $guitarEffectsProd;
    public $availability, $availability2, $priceSort, $guitarEffectsCategory;

    public function mount($guitarEffectsProd, $guitarEffectsCategory)
    {
        $this->guitarEffectsProd = $guitarEffectsProd;
        $this->guitarEffectsCategory = $guitarEffectsCategory;
    }
    protected $queryString = [
        'priceSort' => ['except' => '', 'as' => 'price'],
        'availability' => ['except' => '', 'as' => 'filter.availability.i'],
        'availability2' => ['except' => '', 'as' => 'filter.availability.o']
    ];
    public function render()
    {
        $this->guitarEffectsProd = GuitarEffects::where('guitarEffectsCategory', $this->guitarEffectsCategory->guitarEffectsCategory_name)
                                    ->when($this->priceSort, function($q){
                                        $q->when($this->priceSort == 'price_asc', function($q2){
                                            $q2->orderBy('sale_price', 'asc');
                                        });
                                        $q->when($this->priceSort == 'price_desc', function($q2){
                                            $q2->orderBy('sale_price', 'desc');
                                        });
                                        $q->when($this->priceSort == 'featured', function($q2){
                                            return $q2;
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
                                    ->where('status','1')
                                    ->paginate(15);
        return view('livewire.front-end.gear.view-guitar-effects', [
            'guitarEffectsProd' => $this->guitarEffectsProd
        ]);
    }
}
