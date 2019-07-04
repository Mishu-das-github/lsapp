<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use File;
use Illuminate\Http\Request;
use Image;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.pages.product.index')->with('products', $products);
    }

    public function show($slug)
    {
        //
    }
    public function create()
    {
        return view('backend.pages.product.create');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.pages.product.edit')->with('product', $product);
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ]);

        $product = new Product;

        $field_name = array("title", "description", "price", "quantity");
        foreach ($field_name as $key) {
            $product->$key = $request->$key;
        }

        $product->slug = str_slug($request->title);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;
        $product->save();

        //ProductImage model insert image
        // if($request->hasFile('product_image'))
        // {
        //     $image=$request->file('product_image');
        //  $img=time(). '.' .$image->getClientOriginalExtension();
        //  $location=public_path('images/products/'.$img);
        //  Image::make($image)->save($location);

        //  $product_image=new ProductImage;
        //  $product_image->product_id=$product->id;
        //  $product_image->image=$img;
        //  $product_image->save();

        // }

        if (count($request->product_image) > 0) {
            //Create directory to save images
            $path = public_path() . '/images/products';
            if (!file_exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $c = 0;
            foreach ($request->product_image as $image) {
                $c++;
                $img = time() . $c . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/products/' . $img);
                Image::make($image)->save($location);

                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();
            }
            session()->flash('addProductSuccess', 'Product has been added successfully.');
        }

        return redirect()->route('admin.product.create');
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $product = Product::find($id);

        $field_name = array("title", "description", "price", "quantity", "category_id", "brand_id");
        foreach ($field_name as $key) {
            $product->$key = $request->$key;
        }
        $product->save();

        return redirect()->route('admin.products');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) {
            //Delete all images of this product
            $images = ProductImage::orderBy('id', 'desc')->where('product_id', $product->id)->get();
            foreach ($images as $image) {
                if (File::Exists('images/products/' . $image->image)) {
                    File::delete('images/products/' . $image->image);
                }
                $image->delete();
            }
            $product->delete();
        }
        session()->flash('success', "Product has been deleted successfully!!");
        return back();
    }
}
