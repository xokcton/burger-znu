<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use App\Http\Requests\StoreSlider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slider::paginate(5);
        return view('admin.slider.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlider $request)
    {
        $slides = new Slider();
        $this->saveFormValues($request, $slides);
        return redirect('/admin/slider')->with('success', 'Slide "' . $slides->slug . '" has been successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slides = Slider::findOrFail($id);
        return view('admin.slider.show', compact('slides'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slides = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slides'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSlider $request, $id)
    {
        $slides = Slider::findOrFail($id);
        $this->saveFormValues($request, $slides);
        return redirect('/admin/slider')->with('success', 'Slide "' . $slides->slug . '" has been successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slides = Slider::findOrFail($id);
        $name = $slides->slug;
        $slides->delete();
        return redirect('/admin/slider')->with('success', 'Slide "' . $name . '" has been successfully deleted!');
    }

    public function saveFormValues(StoreSlider $request, Slider $slides)
    {
        $slides->slug = $request->slug;

        $file = $request->file('img');
        if ($file) {
            $fName = trim(strval(time())) . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fName);
            $slides->img = '/uploads/' . $fName;
        }

        $slides->save();
    }
}
