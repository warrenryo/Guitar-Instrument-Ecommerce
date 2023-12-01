<?php

namespace App\Http\Livewire\FrontEnd\Gear;

use App\Models\Strings;
use Livewire\Component;

class ViewAllStrings extends Component
{
    private $strings;
    public $priceSort, $availability, $availability2;

    public function mount($strings)
    {
        $this->strings = $strings;
    }
    protected $queryString = [
        'priceSort' => ['except' => '', 'as' => 'price'],
        'availability' => ['except' => '', 'as' => 'filter.availability.i'],
        'availability2' => ['except' => '', 'as' => 'filter.availability.o']
    ];
    public function render()
    {
        $this->strings = Strings::where('status', '1')
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
        return view('livewire.front-end.gear.view-all-strings', [
            'strings' => $this->strings,
        ]);
    }
}
