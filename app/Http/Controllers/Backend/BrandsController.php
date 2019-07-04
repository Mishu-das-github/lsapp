<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use File;
use Illuminate\Http\Request;
use Image;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.pages.brands.index', compact('brands'));
    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.pages.brands.edit', compact('brand'));
    }
    public function create()
    {
        return view('backend.pages.brands.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand_image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please provide a Brand name',
                'brand_image.image' => 'Please provide a valid image with .jpg, .png, .jpeg, .gif extension',
            ]);

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->description = $request->description;
        //image insertion
        if ($request->hasFile('brand_image')) {
            //Create directory to save images
            $path = public_path() . '/images/brands';
            if (!file_exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $image = $request->file('brand_image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $img);
            Image::make($image)->save($location);

            $brand->image = $img;

        }
        $brand->save();
        session()->flash('success', "A new Brand has been added successfully!!");
        return redirect()->route('admin.brands');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'Brand_image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please provide a Brand name',
                'Brand_image.image' => 'Please provide a valid image with .jpg, .png, .jpeg, .gif extension',
            ]);

        $brand = Brand::find($id);
        if (!is_null($brand)) {
            $brand->name = $request->name;
            $brand->description = $request->description;
            if (count($request->brand_image) > 0) {
                //Delete the old image
                if (File::Exists('images/brands/' . $brand->image)) {
                    File::delete('images/brands/' . $brand->image);
                }
//New image save
                $image = $request->file('brand_image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/brands/' . $img);
                Image::make($image)->save($location);

                $brand->image = $img;
            }
            $brand->save();
            session()->flash('success', "Brand has updated successfully!!");
            return redirect()->route('admin.brands');

        } else {
            return redirect()->route('admin.brands');
        }
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand)) {
            //Delete Brand image
            if (File::Exists('images/brands/' . $brand->image)) {
                File::delete('images/brands/' . $brand->image);
            }
            $brand->delete();
        }
        session()->flash('success', "Product has deleted successfully!!");
        return back();
    }
}
