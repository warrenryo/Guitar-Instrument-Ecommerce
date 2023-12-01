<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $brands = Brands::all();
        $categories = Category::all();
        return view('admin.products.productIndex', ['categories' => $categories, 'brands' => $brands]);
    }

    public function addProduct(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'product_name' => $validatedData['product_name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'color' => $validatedData['color'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'sale_price' => $validatedData['sale_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';

            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$fileName);
                $finalImagePathName = $uploadPath.$fileName;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'images' => $finalImagePathName,
                ]);
            }
        }
        Alert::success('Success!', 'Product Added Successfully');
        return redirect()->back();
       
    }

    public function editProduct(int $product_id)
    {
        $categories = Category::all();
        $brands = Brands::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.productEdit', compact('categories','brands','product'));
    }

    public function updateProduct(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();

        $product = Product::where('id',$product_id)->first();

        if($product)
        {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'product_name' => $validatedData['product_name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'color' => $validatedData['color'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'sale_price' => $validatedData['sale_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? '1':'0',
                'status' => $request->status == true ? '1':'0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';

                
                $i = 1;
                foreach($request->file('image') as $imageFile)
                {
                    $extension = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$fileName);
                    $finalImagePathName = $uploadPath.$fileName;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'images' => $finalImagePathName,
                    ]);
                }
                Alert::success('Success!', 'Product Updated Successfully!');
                return redirect('admin/products');
            }
    
        }else{
            Alert::error('Error!', 'No such ID found');
            return redirect('admin/products');
        }
        Alert::success('Success!', 'Product Updated Successfully!');
        return redirect('admin/products');
        
    }

    public function deleteProduct(Request $request)
    {   
        $product_id = $request->input('delete_product');

        $product = Product::findOrFail($product_id);

        if($product->productImages){
            foreach($product->productImages as $image)
            {
                if(File::exists($image->images))
                {
                    File::delete($image->images);
                }
            }
        }
        $product->delete();

        Alert::success('Success', 'Product Deleted Successfully');
        return redirect('admin/products');
    }

    public function deleteImage($delete_prod_image){
        $productImage = ProductImage::findOrFail($delete_prod_image);

        if(File::exists($productImage->images)){
            File::delete($productImage->images);
        }

        $productImage->delete();
        Alert::success('Success', 'Image Deleted');
        return redirect()->back();
    }
}
