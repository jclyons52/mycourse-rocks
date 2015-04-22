<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

}
