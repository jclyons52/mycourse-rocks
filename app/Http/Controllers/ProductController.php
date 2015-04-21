<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Response;
use Flash;

class ProductController extends Controller {

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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
