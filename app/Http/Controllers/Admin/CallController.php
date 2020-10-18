<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Call;
use App\Http\Requests\StoreFood;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = Call::paginate(5);
        return view('admin.call.index', compact('calls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.call.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFood $request)
    {
        $calls = new Call();
        $this->saveFormValues($request, $calls);
        return redirect('/admin/call')->with('success', 'Call by "' . $calls->name . '" has been successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calls = Call::findOrFail($id);
        return view('admin.call.show', compact('calls'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calls = Call::findOrFail($id);
        return view('admin.call.edit', compact('calls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFood $request, $id)
    {
        $calls = Call::findOrFail($id);
        $this->saveFormValues($request, $calls);
        return redirect('/admin/call')->with('success', 'Call by "' . $calls->name . '" has been successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calls = Call::findOrFail($id);
        $name = $calls->name;
        $calls->delete();
        return redirect('/admin/call')->with('success', 'Call by "' . $name . '" has been successfully deleted!');
    }

    public function saveFormValues(StoreFood $request, Call $calls)
    {
        $calls->name = $request->name;
        $calls->phone = $request->phone;
        $calls->address = $request->address;

        $calls->save();
    }
}
