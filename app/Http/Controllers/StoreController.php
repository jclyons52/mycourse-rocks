<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\Product;
use Response;
use Flash;
use Illuminate\Http\Request;

class StoreController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $products = Product::all();
        return view('site.products.index')->with('products', $products);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function product($id)
	{
        $product = Product::find($id);
        $avg_rating = Comment::where('product_id', '=', $product->id)->avg('rating');
        $rating_cont = Comment::where('product_id', '=', $product->id)->count();
        $five_star = Comment::where('product_id', '=', $product->id)->where('rating', '=', '5')->count()*100/$rating_cont;
        $four_star = Comment::where('product_id', '=', $product->id)->where('rating', '=', '4')->count()*100/$rating_cont;
        $three_star = Comment::where('product_id', '=', $product->id)->where('rating', '=', '3')->count()*100/$rating_cont;
        $two_star = Comment::where('product_id', '=', $product->id)->where('rating', '=', '2')->count()*100/$rating_cont;
        $one_star = Comment::where('product_id', '=', $product->id)->where('rating', '=', '1')->count()*100/$rating_cont;

        if(empty($product))
        {
            Flash::error('Product not found');
            return redirect(route('admin.products.index'));
        }

        return view('site.products.show')->with([
            'product'      => $product,
            'avg_rating'   => $avg_rating,
            'rating_count' => $rating_cont,
            'five_star'    => $five_star,
            'four_star'    => $four_star,
            'three_star'   => $three_star,
            'two_star'     => $two_star,
            'one_star'     => $one_star
        ]);
	}

    public function lesson($id){

        $lesson = Lesson::find($id);

        if(empty($lesson))
        {
            Flash::error('Lesson not found');
            return redirect('/');
        }
        return view('site.lessons.show')->with('lesson', $lesson);
    }

}
