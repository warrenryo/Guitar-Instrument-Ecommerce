<?php

namespace App\Http\Livewire\FrontEnd\Gear;

use App\Models\Gear;
use Livewire\Component;

class ViewAllAccessory extends Component
{
    private $allAccessory;
    public $availability, $availability2, $priceSort;

    public function mount($allAccessory)
    {
        $this->allAccessory = $allAccessory;
    }

    protected $queryString = [
        'priceSort' => ['except' => '', 'as' => 'price'],
        'availability' => ['except' => '', 'as' => 'filter.availability.i'],
        'availability2' => ['except' => '', 'as' => 'filter.availability.o']
    ];

    public function render()
    {
        $this->allAccessory = Gear::where('status', '1')
                                ->when($this->priceSort, function($q){
                                    $q->when($this->priceSort == 'price_asc', function($q2){
                                        $q2->orderBy('sale_price', 'ASC');
                                    });
                                    $q->when($this->priceSort == 'price_desc', function($q2){
                                        $q2->orderBy('sale_price', 'DESC');
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
                                ->paginate(10);
        return view('livewire.front-end.gear.view-all-accessory', [
            'allAccessory' => $this->allAccessory
        ]);
    }
}
