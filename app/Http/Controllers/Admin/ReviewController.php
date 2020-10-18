<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;
use App\Http\Requests\StorePayment;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::paginate(5);
        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayment $request)
    {
        $reviews = new Review();
        $this->saveFormValues($request, $reviews);
        return redirect('/admin/review')->with('success', 'Review by "' . $reviews->name . '" has been successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reviews = Review::findOrFail($id);
        return view('admin.review.show', compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reviews = Review::findOrFail($id);
        return view('admin.review.edit', compact('reviews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePayment $request, $id)
    {
        $reviews = Review::findOrFail($id);
        $this->saveFormValues($request, $reviews);
        return redirect('/admin/review')->with('success', 'Review by "' . $reviews->name . '" has been successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reviews = Review::findOrFail($id);
        $name = $reviews->name;
        $reviews->delete();
        return redirect('/admin/review')->with('success', 'Review by "' . $name . '" has been successfully deleted!');
    }

    public function saveFormValues(StorePayment $request, Review $reviews)
    {
        $reviews->name = $request->name;
        $reviews->review = $request->comment;

        if ($request->verified) {
            $reviews->verified = $request->verified;
        }

        $reviews->save();
    }
}
