<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use File;
use Illuminate\Http\Request;
use Image;

class SlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $sliders = Slider::orderBy('priority', 'asc')->get();
        return view('backend.pages.sliders.index', compact('sliders'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'button_link' => 'nullable|url',
            'priority' => 'required',
        ],
            [
                'title.required' => 'Please provide a slider title',
                'image.required' => 'Please provide a slider image',
                'image.image' => 'Please provide a valid slider image',
                'button_link.url' => 'Please provide a valid button link',
                'priority.required' => 'Please provide slider priority',
            ]);

        $slider = new Slider;
        $slider->title = $request->title;
        //image insertion
        if ($request->hasFile('image')) {
            //Create directory to save images
            $path = public_path() . '/images/sliders';
            if (!file_exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/sliders/' . $img);
            Image::make($image)->save($location);

            $slider->image = $img;

        }
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        $slider->save();
        session()->flash('success', "A new slider has been added successfully!!");
        return redirect()->route('admin.sliders');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
            'button_link' => 'nullable|url',
            'priority' => 'required',
        ],
            [
                'title.required' => 'Please provide a slider title',
                'image.image' => 'Please provide a valid slider image',
                'button_link.url' => 'Please provide a valid button link',
                'priority.required' => 'Please provide slider priority',
            ]);

        $slider = Slider::find($id);
        if (!is_null($slider)) {
            $slider->title = $request->title;
            //image insertion
            if ($request->hasFile('image')) {
                //Create directory to save images
                $path = public_path() . '/images/sliders';
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $image = $request->file('image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/sliders/' . $img);
                Image::make($image)->save($location);

                $slider->image = $img;

            }
            $slider->button_link = $request->button_link;
            $slider->priority = $request->priority;
            $slider->save();
            session()->flash('success', "Slider has been updated successfully!!");
            return redirect()->route('admin.sliders');

        } else {
            return redirect()->route('admin.sliders');
        }
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if (!is_null($slider)) {
            $slider->delete();
        }
        session()->flash('success', "Slider has deleted successfully!!");
        return back();
    }
}
