<?php

namespace App\Http\Livewire\FrontEnd\Gear;

use App\Models\Strings;
use Livewire\Component;

class ViewStrings extends Component
{
    private $stringProd;
    public $availability, $availability2, $priceSort, $stringCat;

    public function mount($stringProd, $stringCat)
    {
        $this->stringProd = $stringProd;
        $this->stringCat = $stringCat;
    }
    protected $queryString = [
        'priceSort' => ['except' => '', 'as' => 'price'],
        'availability' => ['except' => '', 'as' => 'filter.availability.i'],
        'availability2' => ['except' => '', 'as' => 'filter.availability.o']
    ];
    public function render()
    {
        $this->stringProd = Strings::where('stringCategory', $this->stringCat->string_category_name)
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
                            ->where('status', '1')
                            ->paginate(15);
        return view('livewire.front-end.gear.view-strings', [
            'stringProd' => $this->stringProd,
        ]);
    }
}
