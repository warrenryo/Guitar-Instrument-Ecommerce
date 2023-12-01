<?php

namespace App\Http\Livewire\FrontEnd\Gear;

use App\Models\Gear;
use Livewire\Component;

class ViewAccessory extends Component
{
    private  $gearProd, $brands, $categories;
    public  $availability, $availability2, $priceSort,  $accessoryCategory;

    public function mount($brands, $categories, $accessoryCategory)
    {
        $this->brands = $brands;
        $this->categories = $categories;
        $this->accessoryCategory = $accessoryCategory;
    }
    protected $queryString = [
        'priceSort' => ['except' => '', 'as' => 'price'],
        'availability' => ['except' => '', 'as' => 'filter.availability.i'],
        'availability2' => ['except' => '', 'as' => 'filter.availability.o']
    ];
    public function render()
    {
        $this->gearProd = Gear::where('gearCategory_id', $this->accessoryCategory->id)
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
        return view('livewire.front-end.gear.view-accessory',[
            'gearProd' => $this->gearProd,
            'brands' => $this->brands,
            'categories' => $this->categories,
            'accessoryCategory' => $this->accessoryCategory
        ]);
    }
}
