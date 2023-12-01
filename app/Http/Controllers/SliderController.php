<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.slider.sliderIndex');
    }

    public function addSlider(SliderFormRequest $request)
    {
        $validatedData = $request->validated();
        
        $slider = new Slider;

        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/slider/', $fileName);

            $slider->image = "uploads/slider/$fileName";
        }

        $slider->status = $request->status == true ? '1':'0';

        $slider->save();
        
        Alert::success('Success', 'Slider Added Successfully');
        return redirect('admin/slider');
    }

    //UPDATE AND EDIT SLIDER
    public function editSlider(Slider $slider)
    {
        
        return view('admin.slider.editSlider', compact('slider'));
    }

    public function updateSlider(SliderFormRequest $request, int $slider_id)
    {
        $validatedData = $request->validated();

        $slider = Slider::findOrFail($slider_id);
        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];

        if($request->hasFile('image')){
            $path = $slider->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;

            $file->move('uploads/slider/', $fileName);

            $slider->image = "uploads/slider/$fileName";
        }

        $slider->status = $request->status == true ? '1':'0';

        $slider->update();
        
        Alert::success('Success', 'Slider Updated Successfully');
        return redirect('admin/slider');
    }

    //DELETE SLIDER 
    public function deleteSlider(Request $request)
    {
        $deleteSlider = $request->input('delete_slider');

        $slider = Slider::findOrFail($deleteSlider);
        
        $path = $slider->image;
        if(File::exists($path))
        {
            File::delete($path);
        }

        $slider->delete();

        Alert::success('Success', 'Slider Deleted Successfully');
        return redirect()->back();
    }
}
