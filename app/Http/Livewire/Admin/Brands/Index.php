<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brands;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{

    public $brand_name, $slug, $status, $brand_id;

    public function rules()
    {
        return [
            'brand_name' => 'required|string',
            'slug'  => 'required|string',
            'status' => 'nullable'
        ];
    }

    public function resetInput()
    {
        sleep(seconds:1);
        $this->brand_name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
    }
    public function storeBrand()
    {
        $validatedData = $this->validate();

        Brands::create([
            'brand_name' => $this->brand_name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0'
        ]);


        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Brand Added Successfully',
            'text' => '',
        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }   

    public function editBrand(int $brand_id)
    {
        sleep(seconds:1);
        $this->brand_id = $brand_id;
        $brand = Brands::findOrFail($brand_id);
        $this->brand_name = $brand->brand_name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }

    public function updateBrand()
    {
        Brands::findOrFail($this->brand_id)->update([
            'brand_name' => $this->brand_name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Brand Updated Successfully',
            'text' => '',
        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($brand_id)
    {
        usleep(600000);
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        Brands::findOrFail($this->brand_id)->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Brand Deleted Successfully',
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    use WithPagination;
    public function render()
    {
        $brands = Brands::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brands.index', ['brands' => $brands]);
    }
}
