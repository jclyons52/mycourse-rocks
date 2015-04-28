<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class PageController extends Controller {

	public function about()
    {
        return view('site.pages.about');
    }

    public function popular()
    {
        $products = Product::popular()->paginate(10);

        return view('site.pages.popular')->with('products', $products);

    }

    public function newProducts(){

    }

    public function adminDashboard(){

        return view('admin.dashboard');
    }

    public function contact(Request $request){

        $input = $request->all();

        Mail::send('emails.contact', $input, function($message) use($input)
        {
            $message->from($input['email'], $input['firstname'].' '.$input['lastname']);
            $message->to('jclyons52@gmail.com', 'Joseph Lyons')->subject($input['subject']);
        });

        Flash::message('Your message has been sent');

        return redirect()->back();

    }

}
