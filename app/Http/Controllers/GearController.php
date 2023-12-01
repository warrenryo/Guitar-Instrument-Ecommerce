<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use App\Models\Brands;
use App\Models\Strings;
use Illuminate\Support\Str;
use App\Models\StringImages;
use Illuminate\Http\Request;
use App\Models\GuitarEffects;
use App\Models\AccesorryImage;
use App\Models\StringCategory;
use App\Models\AccessoryCategory;
use App\Models\GuitarEffectsImages;
use Illuminate\Support\Facades\File;
use App\Models\GuitarEffectsCategory;
use App\Http\Requests\StringFormRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AccessoryFormRequest;
use App\Http\Requests\GuitarEffectsFormRequest;

class GearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brands::all();
        $gearCategory = AccessoryCategory::all();
        return view('admin.gear.accessoryIndex', compact('brands','gearCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccessoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $gearCategory = AccessoryCategory::findOrFail($validatedData['gearCategory_id']);
        
        $accessory = $gearCategory->gearProducts()->create([
            'gearCategory_id' => $validatedData['gearCategory_id'],
            'accessory_name' => $validatedData['accessory_name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'orig_price' => $validatedData['orig_price'],
            'quantity' => $validatedData['quantity'],
            'sale_price' => $validatedData['sale_price'],
            'status' => $request->status == true ? '1':'0',
            'trending' => $request->trending == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/accessory/';

            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$fileName);
                $finalImagePathName = $uploadPath.$fileName;

                $accessory->acessoryImages()->create([
                    'accesory_id' => $accessory->id,
                    'images' => $finalImagePathName,
                ]);
            }
        }
        
        Alert::success('Success', 'Accessory Added Successfully');
        return redirect()->back();
    }

    public function editAccessory(int $acc_id)
    {
        
        $brands = Brands::all();
        $gearCategory = AccessoryCategory::all();
        $accessory = Gear::findOrFail($acc_id);
        return view('admin.gear.accessoryEdit',compact('brands','accessory','gearCategory'));
    }

    public function updateAccessory(AccessoryFormRequest $request, int $accessory_id)
    {
        $validatedData = $request->validated();

        $gearCategory = Gear::where('id',$accessory_id)->first();

        if($gearCategory)
        {
            $gearCategory->update([
                'gearCategory_id' => $validatedData['gearCategory_id'],
                'accessory_name' => $validatedData['accessory_name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'orig_price' => $validatedData['orig_price'],
                'quantity' => $validatedData['quantity'],
                'sale_price' => $validatedData['sale_price'],
                'status' => $request->status == true ? '1':'0',
                'trending' => $request->trending == true ? '1':'0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

            if($request->hasFile('image')){
                $uploadPath = 'uploads/accessory/';
    
                $i = 1;
                foreach($request->file('image') as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$fileName);
                    $finalImagePathName = $uploadPath.$fileName;
    
                    $gearCategory->acessoryImages()->create([
                        'accesory_id' => $gearCategory->id,
                        'images' => $finalImagePathName,
                    ]);
                }
                Alert::success('Success!', 'Accessory Updated Successfully');
                return redirect('admin/accessory');
            }
            
        }else{
            Alert::error('Error!', 'No such ID found');
            return redirect('admin/accessory');
        }
        Alert::success('Success!', 'Product Updated Successfully!');
        return redirect('admin/accessory');
        
    }

    public function deleteAccessory(Request $request)
    {
        $deleteAccessory = $request->input('deleteAccessory');

        $accessory = Gear::findOrFail($deleteAccessory);
        
        if($accessory->acessoryImages){
            foreach($accessory->acessoryImages as $image)
            {
                if(File::exists($image->images))
                {
                    File::delete($image->images);
                }
            }
        }
        $accessory->delete();
        Alert::success('Success!', 'Accessory has been Deleted');
        return redirect('admin/accessory');
    }

    public function deleteAccessoryImage(int $delete_acc_img)
    {
        $accessoryImg = AccesorryImage::findOrFail($delete_acc_img);
        if(File::exists($accessoryImg->images)){
            File::delete($accessoryImg->images);
        }
        $accessoryImg->delete();
        Alert::success('Success!', 'Accessory Image has been Deleted');
        return redirect()->back();
    }


    //STRING CONTROLLER

    public function stringIndex()
    {
        $stringCategory = StringCategory::all();
        $brand = Brands::all();
        return view('admin.gear.strings.stringIndex', compact('stringCategory', 'brand'));
    }

    public function addString(StringFormRequest $request)
    {
        $validatedData = $request->validated();

        $string = new Strings;
        $string->stringCategory = $validatedData['stringCategory'];
        $string->string_name = $validatedData['string_name'];
        $string->slug = Str::slug($validatedData['slug']);
        $string->brand = $validatedData['brand'];
        $string->small_description = $validatedData['small_description'];
        $string->description = $validatedData['description'];
        $string->orig_price = $validatedData['orig_price'];
        $string->quantity = $validatedData['quantity'];
        $string->sale_price = $validatedData['sale_price'];
        $string->status = $request->status == true ? '1':'0';
        $string->trending = $request->trending == true ? '1':'0';
        $string->meta_title = $validatedData['meta_title'];
        $string->meta_keyword = $validatedData['meta_keyword'];
        $string->meta_description = $validatedData['meta_description'];
        $string->save();
        
        if($request->hasFile('image')){
            $uploadPath = 'uploads/strings/';
            
            $i = 0;
            foreach($request->file('image') as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$extension;
                $image->move($uploadPath,$fileName);
                $finalImagePathName = $uploadPath.$fileName;

                $string->stringImages()->create([
                    'string_id' => $string->id,
                    'images' => $finalImagePathName,
                ]);
            }
        }
        
    
        foreach($request->input('string_gauge') as $gauge)
        {
            $string->stringGauge()->create([
                'string_id' => $string->id,
                'string_gauge' => $gauge
            ]);
        }

        
        Alert::success('Success!', 'String Added Successfully');
        return redirect()->back();
    }

    public function editString($string_id)
    {
        $stringCategory = StringCategory::all();
        $brands = Brands::all();
        $string = Strings::with('gauge')->findOrFail($string_id);
        return view('admin.gear.strings.stringEdit', compact('string','brands','stringCategory'));
    }

    public function updateString(StringFormRequest $request, int $string_id)
    {
        $validatedData = $request->validated();

        $string = Strings::where('id', $string_id)->first();

        if($string)
        {
            $string->stringCategory = $validatedData['stringCategory'];
            $string->string_name = $validatedData['string_name'];
            $string->slug = Str::slug($validatedData['slug']);
            $string->brand = $validatedData['brand'];
            $string->small_description = $validatedData['small_description'];
            $string->description = $validatedData['description'];
            $string->orig_price = $validatedData['orig_price'];
            $string->quantity = $validatedData['quantity'];
            $string->sale_price = $validatedData['sale_price'];
            $string->status = $request->status == true ? '1':'0';
            $string->trending = $request->trending == true ? '1':'0';
            $string->meta_title = $validatedData['meta_title'];
            $string->meta_keyword = $validatedData['meta_keyword'];
            $string->meta_description = $validatedData['meta_description'];
            
            
              
        if($request->hasFile('image')){
            $uploadPath = 'uploads/strings/';
            
            $i = 0;
            foreach($request->file('image') as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$extension;
                $image->move($uploadPath,$fileName);
                $finalImagePathName = $uploadPath.$fileName;

                $string->stringImages()->create([
                    'string_id' => $string->id,
                    'images' => $finalImagePathName,
                ]);
            }
        }

        $string->update();
        
        foreach($request->input('string_gauge') as $gaugeId => $gauge)
        {
            
            $stringGauge = $string->stringGauge()->findOrFail($gaugeId);
            $stringGauge->update($gauge);
        }
        }

        Alert::success('Success!', 'String Updated Successfully');
        return redirect('admin/strings');
    }

    public function deleteStringImage($img_id)
    {
        $image_id = StringImages::findOrFail($img_id);
        if(File::exists($image_id->images))
        {
            File::delete($image_id->images);
        }
        $image_id->delete();
        Alert::success('Success!', 'Image Deleted');
        return redirect()->back();
    }

    public function deleteString(Request $request)
    {
        $string_id = $request->input('deleteString');
        $string = Strings::findOrFail($string_id);
        if($string->stringImages)
        {
            foreach($string->stringImages as $image)
            {
                if(File::exists($image->images))
                {
                    File::delete($image->images);
                }
            }
        }
        if($string->stringGauge)
        {
            foreach($string->stringGauge as $gauge)
            {
                $gauge->delete();
            }
        }
        $string->delete();
        Alert::success('Success!', 'String Deleted Successfully');
        return redirect()->back();
    }

    //Guitar Effects Controller

    public function guitarEffectsIndex()
    {
        $guitarEffectsCategory = GuitarEffectsCategory::all();
        $brand = Brands::all();
        return view('admin.gear.guitarEffects.guitarEffectsIndex', compact('brand','guitarEffectsCategory'));
    }

    public function addGuitarEffects(GuitarEffectsFormRequest $request)
    {
        $validatedData = $request->validated();

        $guitarEffects = new GuitarEffects;
        $guitarEffects->guitarEffectsCategory = $validatedData['guitarEffectsCategory'];
        $guitarEffects->guitar_effects_name = $validatedData['guitar_effects_name'];
        $guitarEffects->slug = Str::slug($validatedData['slug']);
        $guitarEffects->brand = $validatedData['brand'];
        $guitarEffects->small_description = $validatedData['small_description'];
        $guitarEffects->description = $validatedData['description'];
        $guitarEffects->orig_price = $validatedData['orig_price'];
        $guitarEffects->quantity = $validatedData['quantity'];
        $guitarEffects->sale_price = $validatedData['sale_price'];
        $guitarEffects->status = $request->status == true ? '1':'0';
        $guitarEffects->trending = $request->trending == true ? '1':'0';
        $guitarEffects->meta_title = $validatedData['meta_title'];
        $guitarEffects->meta_keyword = $validatedData['meta_keyword'];
        $guitarEffects->meta_description = $validatedData['meta_description'];
        $guitarEffects->save();

        if($request->hasFile('image'))
        {
            $uploadPath = 'uploads/guitarEffects/';
            $i = 0;
            foreach($request->file('image') as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$extension;
                $image->move($uploadPath,$fileName);
                $finalImagePathName = $uploadPath.$fileName;

                $guitarEffects->guitarEffectsImages()->create([
                    'guitar_effects_id' => $guitarEffects->id,
                    'images' => $finalImagePathName
                ]);
            }
        }
        Alert::success('Success!', 'Guitar Effects Added');
        return redirect()->back();
    }

    public function editGuitarEffects(int $gEffects_id)
    {
        $brands = Brands::all();
        $guitarEffectsCategory = GuitarEffectsCategory::all();
        $gEffects = GuitarEffects::find($gEffects_id);

        return view('admin.gear.guitarEffects.guitarEffectsEdit', compact('brands', 'guitarEffectsCategory', 'gEffects'));

    }

    public function updateGuitarEffects(GuitarEffectsFormRequest $request, int $gEffects_id)
    {
        $validatedData = $request->validated();

        $guitarEffects = GuitarEffects::where('id', $gEffects_id)->first();
        if($guitarEffects)
        {
            $guitarEffects->guitarEffectsCategory = $validatedData['guitarEffectsCategory'];
            $guitarEffects->guitar_effects_name = $validatedData['guitar_effects_name'];
            $guitarEffects->slug = Str::slug($validatedData['slug']);
            $guitarEffects->brand = $validatedData['brand'];
            $guitarEffects->small_description = $validatedData['small_description'];
            $guitarEffects->description = $validatedData['description'];
            $guitarEffects->orig_price = $validatedData['orig_price'];
            $guitarEffects->quantity = $validatedData['quantity'];
            $guitarEffects->sale_price = $validatedData['sale_price'];
            $guitarEffects->status = $request->status == true ? '1':'0';
            $guitarEffects->trending = $request->trending == true ? '1':'0';
            $guitarEffects->meta_title = $validatedData['meta_title'];
            $guitarEffects->meta_keyword = $validatedData['meta_keyword'];
            $guitarEffects->meta_description = $validatedData['meta_description'];

            if($request->hasFile('image'))
            {
                $uploadPath = 'uploads/guitarEffects/';
                $i = 1;
                foreach($request->file('image') as $imageFile)
                {
                    $extension = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$fileName);
                    
                    $finalImagePathName = $uploadPath.$fileName;

                    $guitarEffects->guitarEffectsImages()->create([
                        'guitar_effects_id' => $guitarEffects->id,
                        'images' => $finalImagePathName
                    ]);
                }
            }
            $guitarEffects->update();
        }else{
            Alert::error('Error!', 'Image cannot be Null');
            return redirect()->back();
        }
        Alert::success('Success!', 'Guitar Effects Updated');
        return redirect('admin/guitarEffects');
        
    }

    public function deleteGuitarImg($img_id)
    {
        $gEffectsImg = GuitarEffectsImages::find($img_id);
        if(File::exists($gEffectsImg->images))
        {
            File::delete($gEffectsImg->images);
        }
        $gEffectsImg->delete();
        Alert::success('Success', 'Guitar Effects Image Deleted');
        return redirect()->back();
    }

    public function deleteGuitarEffects(Request $request)
    {
        $gEffects_id = $request->input('deleteGuitarEffects');

        $gEffects = GuitarEffects::find($gEffects_id);
        foreach($gEffects->guitarEffectsImages as $image)
        {
            if(File::exists($image->images))
            {
                File::delete($image->images);
            }
        }
        $gEffects->delete();
        Alert::success('Success!', 'Guitar Effects Deleted');
        return redirect()->back();

    }
}
