<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StringCategory;
use App\Models\AccessoryCategory;
use App\Models\GuitarEffectsCategory;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StringCategoryRequest;
use App\Http\Requests\AccessoryCategoryRequest;
use App\Http\Requests\GuitarEffectsCategoryRequest;

class GearCategoryController extends Controller
{
    public function index()
    {
        $accessoryCat = AccessoryCategory::paginate(10);
        return view('admin.gearCategory.accessoryCategoryIndex', compact('accessoryCat'));
    }

    //ADD ACCESSORY
    public function addAccessory(AccessoryCategoryRequest $request)
    {
        $validatedData = $request->validated();

        $accessoryCategory = new AccessoryCategory;
        $accessoryCategory->accessory_category_name = $validatedData['accessory_category_name'];
        $accessoryCategory->slug = Str::slug($validatedData['slug']);
        $accessoryCategory->status = $request->status == true ? '1':'0';

        $accessoryCategory->save();

        Alert::success('Success!', 'Accessory Category Added');
        return redirect('admin/gearCategory/accessories');
    }

    public function editAccessory($accessoryCat_id)
    {   
        $accessoryCat = AccessoryCategory::findOrFail($accessoryCat_id);
        return view('admin.gearCategory.accessoryCategoryEdit', compact('accessoryCat'));
    }

    public function updateAccessory(AccessoryCategoryRequest $request, int $accessoryCat_id)
    {
        $validatedData = $request->validated();
        
        $accessoryCat = AccessoryCategory::findOrFail($accessoryCat_id);

        $accessoryCat->accessory_category_name = $validatedData['accessory_category_name'];
        $accessoryCat->slug = Str::slug($validatedData['slug']);
        $accessoryCat->status = $request->status == true ? '1':'0';

        $accessoryCat->update();
        Alert::success('Success!', 'Accessory Updated Successfully');
        return redirect('admin/gearCategory/accessories');
    }

    public function deleteAccessory(Request $request)
    {
        $accessoryCat_id = $request->input('deleteAccessoryCategory');

        $accessoryCat = AccessoryCategory::findOrFail($accessoryCat_id);

        $accessoryCat->delete();
        Alert::success('Success!', 'Accessory Deleted');
        return redirect()->back();
    }


    //STRING CATEGORY 

    public function stringCategoryIndex()
    {
        return view('admin.stringCategory.stringCategoryIndex');
    }

    public function addStringCat(StringCategoryRequest $request)
    {
        $validatedData = $request->validated();

        $stringCat = new StringCategory;
        $stringCat->string_category_name = $validatedData['string_category_name'];
        $stringCat->slug = Str::slug($validatedData['slug']);
        $stringCat->status = $request->status == true ? '1':'0';

        $stringCat->save();
        Alert::success('Success!', 'String Category Added Successfully');
        return redirect()->back();
    }

    public function editStringCat($string_id)
    {
        $stringCategory = StringCategory::findOrFail($string_id);
        return view('admin.stringCategory.stringCategoryEdit', compact('stringCategory'));
    }

    public function updateStringCat(StringCategoryRequest $request, int $string_id)
    {
        $validatedData = $request->validated();

        $stringCat = StringCategory::findOrFail($string_id);
        $stringCat->string_category_name = $validatedData['string_category_name'];
        $stringCat->slug = Str::slug($validatedData['slug']);
        $stringCat->status = $request->status == true ? '1':'0';
        
        $stringCat->update();
        Alert::success('Success!', 'String Category Updated');
        return redirect('admin/stringCategory/strings');
    }

    public function deleteStringCat(Request $request)
    {
        $string_id =  $request->input('deleteStringCategory');

        $stringCat = StringCategory::findOrFail($string_id);

        $stringCat->delete();
        Alert::success('Success!', 'String Category Deleted');
        return redirect()->back();
    }

    //GUITAR EFFECTS CATEGORY
    public function guitarEffectsIndex()
    {
        return view('admin.guitarEffectsCategory.guitarEffectsIndex');
    } 

    public function addGuitarEffects(GuitarEffectsCategoryRequest $request)
    {
        $validatedData = $request->validated();

        $gEffects = new GuitarEffectsCategory;
        $gEffects->guitarEffectsCategory_name = $validatedData['guitarEffectsCategory_name'];
        $gEffects->slug = Str::slug($validatedData['slug']);
        $gEffects->status = $request->status == true ? '1':'0';

        $gEffects->save();
        Alert::success('Success!', 'Guitar Effects Category Added');
        return redirect()->back();
    }

    public function guitarEffectsCategoryEdit($ge_id)
    {
        $guitarEffects = GuitarEffectsCategory::find($ge_id);
        return view('admin.guitarEffectsCategory.guitarEffectsEdit',compact('guitarEffects'));
    }

    public function updateGuitarEffectsCategory(GuitarEffectsCategoryRequest $request, int $ge_id)
    {
        $validatedData = $request->validated();

        $guitarEffects = GuitarEffectsCategory::find($ge_id);
        $guitarEffects->guitarEffectsCategory_name = $validatedData['guitarEffectsCategory_name'];
        $guitarEffects->slug = Str::slug($validatedData['slug']);
        $guitarEffects->status = $request->status == true ? '1':'0';

        $guitarEffects->update();
        Alert::success('Success!', 'Guitar Effects Updated');
        return redirect('admin/guitarEffectsCategory/guitarEffects');
    }

    public function deleteGuitarEffectsCategory(Request $request)
    {
        $gEffects_id = $request->input('deleteGuitarEffects');

        $guitarEffects = GuitarEffectsCategory::find($gEffects_id);
        $guitarEffects->delete();
        Alert::success('Success!', 'Guitar Effects Category Deleted');
        return redirect()->back();
    }
}
