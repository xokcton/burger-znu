<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use App\Question;
use App\Review;
use App\Call;
use App\Slider;
use App\Http\Requests\StoreContact;
use App\Http\Requests\StorePayment;
use App\Http\Requests\StoreFood;
use App\Mail\MailClass;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $slides = Slider::all();
        return view('index', compact('categories', 'slides'));
    }

    public function payment()
    {
        $comments = Review::where('verified', 1)->latest()->limit(3)->get();
        return view('payment.payment', compact('comments'));
    }

    public function product()
    {
        $products = DB::table('products')->paginate(9);
        return view('product.product', compact('products'));
    }

    public function contact()
    {
        return view('contact.contact');
    }

    public function category(string $slug)
    {
        $category = Category::firstWhere('slug', $slug);
        $products = Product::where('category_id', $category->id)->paginate(6);
        return view('product.product', compact('category', 'products'));
    }

    public function getQuestion(StoreContact $request)
    {
        $question = new Question();
        $question->name = $request->name;
        $question->email = $request->email;
        $question->problem = $request->problem;
        $question->save();

        Mail::to('denislevch2023@gmail.com')->send(new MailClass($question->name, $question->email, $question->problem));

        return back()->with('success', 'Your question has been successfully sent!');
    }

    public function getComment(StorePayment $request)
    {
        $review = new Review();
        $review->name = $request->name;
        $review->review = $request->comment;
        $review->save();
        return back()->with('success', 'Thank you "' . $review->name . '". Your comment has been successfully saved and will be displayed as soon as the admin allows!');
    }

    public function getCall(StoreFood $request)
    {
        $call = new Call();
        $call->name = $request->name;
        $call->phone = $request->phone;
        $call->address = $request->address;
        $call->save();
        return back();
    }
}
