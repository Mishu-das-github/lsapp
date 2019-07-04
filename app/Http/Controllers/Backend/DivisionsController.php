<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $divisions = Division::orderBy('id', 'desc')->get();
        return view('backend.pages.divisions.index', compact('divisions'));
    }
    public function edit($id)
    {
        $division = Division::find($id);
        if (!is_null($division)) {
            return view('backend.pages.divisions.edit', compact('division'));

        } else {
            return redirect()->route('admin.divisions');
        }
    }
    public function create()
    {
        return view('backend.pages.divisions.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'priority' => 'required',
        ],
            [
                'name.required' => 'Please provide a division name',
                'priority.required' => 'Please provide a division priority',
            ]);

        $division = new Division;
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();
        session()->flash('success', "A new division has been added successfully!!");
        return redirect()->route('admin.divisions');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'priority' => 'required',
        ],
            [
                'name.required' => 'Please provide a division name',
                'priority.required' => 'Please provide a division priority',
            ]);

        $division = Division::find($id);
        if (!is_null($division)) {
            $division->name = $request->name;
            $division->priority = $request->priority;
            $division->save();
            session()->flash('success', "Division has updated successfully!!");
            return redirect()->route('admin.divisions');

        } else {
            return redirect()->route('admin.divisions');
        }
    }

    public function delete($id)
    {
        $division = Division::find($id);
        if (!is_null($division)) {
            //Delete all the districts for the division
            $districts = District::where('division_id', $division->id)->get();
            foreach ($districts as $district) {
                $district->delete();
            }

            $division->delete();
        }

        session()->flash('success', "Division has deleted successfully!!");
        return back();
    }
}
