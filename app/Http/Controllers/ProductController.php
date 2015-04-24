<?php namespace App\Http\Controllers;

use App\Fileentry;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateProductRequest;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Laracasts\Flash\Flash;
use Response;

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
		return view('site.products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateProductRequest $request)
	{
        $user = Auth::user();
        $input = $request->all();
        $file = $input['files'];
        $file_id = $this->addThumbnail($file);
        $input['fileentry_id'] = $file_id;

        $product = Product::create($input);
        $user->products()->save($product, ['owner' => '1']);

        $mod_role = Role::create(['name' => 'Product'.$product->id.'mod']);

        $user->roles()->attach($mod_role->id);



        Flash::message('Product saved successfully.');

        return redirect(route('products.show', [$product->id]));
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
        $rating_cont = Comment::where('product_id', '=', $product->id)->count();
        $checked_rating_count = ($rating_cont > 0 ? $rating_cont : 1);

        $five_star = Comment::where('product_id', '=', $product->id)->where('rating', '=', '5')->count()*100/$checked_rating_count;

        $four_star = Comment::where('product_id', '=', $product->id)->where('rating', '=', '4')->count()*100/$checked_rating_count;

        $three_star = Comment::where('product_id', '=', $product->id)->where('rating', '=', '3')->count()*100/$checked_rating_count;

        $two_star = Comment::where('product_id', '=', $product->id)->where('rating', '=', '2')->count()*100/$checked_rating_count;

        $one_star = Comment::where('product_id', '=', $product->id)->where('rating', '=', '1')->count()*100/$checked_rating_count;

        if(empty($product))
        {
            Flash::error('Product not found');
            return redirect(route('admin.products.index'));
        }

        return view('site.products.show')->with([
            'product'      => $product,
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

    /**
     * @param $file
     */
    public function addThumbnail($file)
    {
        $extension = $file->getClientOriginalExtension();

        Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename() . '.' . $extension;
        $entry->save();
        return $entry->id;
    }

    private function syncFiles($product, $input)
    {
        $product->files()->sync($input);
    }

}
