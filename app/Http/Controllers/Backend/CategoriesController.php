<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use File;
use Illuminate\Http\Request;
use Image;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.categories.index', compact('categories'));
    }
    public function edit($id)
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', null)->get();
        $category = Category::find($id);
        return view('backend.pages.categories.edit', compact('category', 'main_categories'));
    }
    public function create()
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', null)->get();
        return view('backend.pages.categories.create', compact('main_categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please provide a category name',
                'category_image.image' => 'Please provide a valid image with .jpg, .png, .jpeg, .gif extension',
            ]);

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        //image insertion
        if ($request->hasFile('category_image')) {
            //Create directory to save images
            $path = public_path() . '/images/categories';
            if (!file_exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $image = $request->file('category_image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories/' . $img);
            Image::make($image)->save($location);

            $category->image = $img;

        }
        $category->save();
        session()->flash('success', "A new category has been added successfully!!");
        return redirect()->route('admin.categories');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please provide a category name',
                'category_image.image' => 'Please provide a valid image with .jpg, .png, .jpeg, .gif extension',
            ]);

        $category = Category::find($id);
        if (!is_null($category)) {
            $category->name = $request->name;
            $category->description = $request->description;
            $category->parent_id = $request->parent_id;
            if (count($request->category_image) > 0) {
                //Delete the old image
                if (File::Exists('images/categories/' . $category->image)) {
                    File::delete('images/categories/' . $category->image);
                }
//New image save
                $image = $request->file('category_image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/categories/' . $img);
                Image::make($image)->save($location);

                $category->image = $img;
            }
            $category->save();
            session()->flash('success', "Category has updated successfully!!");
            return redirect()->route('admin.categories');

        } else {
            return redirect()->route('admin.categories');
        }
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
            if ($category->parent_id == null) {
                //Then delete all its sub-category
                $sub_category = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();
                foreach ($sub_category as $sub) {
                    //Delete sub-category image
                    if (File::Exists('images/categories/' . $sub->image)) {
                        File::delete('images/categories/' . $sub->image);
                    }
                    $sub->delete();
                }

            }
            //Delete category image
            if (File::Exists('images/categories/' . $category->image)) {
                File::delete('images/categories/' . $category->image);
            }
            $category->delete();
        }
        session()->flash('success', "Product has deleted successfully!!");
        return back();
    }
}
