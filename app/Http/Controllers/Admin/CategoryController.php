<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.category');
    }

    public function viewCategory(){
        return view('admin.category.viewCategory');
    }

    public function store(CategoryFormRequest $request){
        $validatedData = $request->validated();

        $category = new Category;

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/',$filename);

            $category->image = "uploads/category/$filename";
        }
        

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';

        $category->save();
        Alert::success('Success', 'Category Added Successfully');
        return redirect('admin/category/viewCategory');
    }

    //EDIT AND UPDATE CATEGORY
    public function edit(Category $item){
        return view('admin.category.editCategory', compact('item'));
    }

    public function update(CategoryFormRequest $request, $item){

        $validatedData = $request->validated();

        $category = Category::findOrFail($item);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];


        if($request->hasFile('image')){

            $path = $category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/',$filename);

            $category->image = "uploads/category/$filename";
        }
        

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';

        $category->update();

        Alert::success('Success', 'Category Updated Successfully');
        return redirect('admin/category/viewCategory');
    }

    public function delete(Request $request){
        $category_id = $request->input('delete_category');

        $category = Category::find($category_id);

        $path = 'uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();

        Alert::success('Success', 'Category Deleted Successfully');
        return redirect()->back();
    }
}
