<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ProductController extends AppBaseController
{

	/**
	 * Display a listing of the Product.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();

		return view('admin.products.index')->with('products', $products);
	}

	/**
	 * Show the form for creating a new Product.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.products.create');
	}

	/**
	 * Store a newly created Product in storage.
	 *
	 * @param CreateProductRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProductRequest $request)
	{
        $input = $request->all();

		$product = Product::create($input);

		Flash::message('Product saved successfully.');

		return redirect(route('admin.products.index'));
	}

	/**
	 * Display the specified Product.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::find($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('admin.products.index'));
		}

		return view('admin.products.show')->with('product', $product);
	}

	/**
	 * Show the form for editing the specified Product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('admin.products.index'));
		}

		return view('admin.products.edit')->with('product', $product);
	}

	/**
	 * Update the specified Product in storage.
	 *
	 * @param  int    $id
	 * @param CreateProductRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateProductRequest $request)
	{
		/** @var Product $product */
		$product = Product::find($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('admin.products.index'));
		}

		$product->fill($request->all());
		$product->save();

		Flash::message('Product updated successfully.');

		return redirect(route('admin.products.index'));
	}

	/**
	 * Remove the specified Product from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Product $product */
		$product = Product::find($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('admin.products.index'));
		}

		$product->delete();

		Flash::message('Product deleted successfully.');

		return redirect(route('admin.products.index'));
	}

}
