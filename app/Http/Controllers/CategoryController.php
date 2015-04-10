<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class CategoryController extends AppBaseController
{

	/**
	 * Display a listing of the Category.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();

		return view('admin.categories.index')->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new Category.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.categories.create');
	}

	/**
	 * Store a newly created Category in storage.
	 *
	 * @param CreateCategoryRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCategoryRequest $request)
	{
        $input = $request->all();

		$category = Category::create($input);

		Flash::message('Category saved successfully.');

		return redirect(route('admin.categories.index'));
	}

	/**
	 * Display the specified Category.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::find($id);

		if(empty($category))
		{
			Flash::error('Category not found');
			return redirect(route('admin.categories.index'));
		}

		return view('admin.categories.show')->with('category', $category);
	}

	/**
	 * Show the form for editing the specified Category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($id);

		if(empty($category))
		{
			Flash::error('Category not found');
			return redirect(route('admin.categories.index'));
		}

		return view('admin.categories.edit')->with('category', $category);
	}

	/**
	 * Update the specified Category in storage.
	 *
	 * @param  int    $id
	 * @param CreateCategoryRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCategoryRequest $request)
	{
		/** @var Category $category */
		$category = Category::find($id);

		if(empty($category))
		{
			Flash::error('Category not found');
			return redirect(route('admin.categories.index'));
		}

		$category->fill($request->all());
		$category->save();

		Flash::message('Category updated successfully.');

		return redirect(route('admin.categories.index'));
	}

	/**
	 * Remove the specified Category from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Category $category */
		$category = Category::find($id);

		if(empty($category))
		{
			Flash::error('Category not found');
			return redirect(route('admin.categories.index'));
		}

		$category->delete();

		Flash::message('Category deleted successfully.');

		return redirect(route('admin.categories.index'));
	}

}
