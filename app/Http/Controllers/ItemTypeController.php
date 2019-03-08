<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ItemType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$item_types = ItemType::orderBy('id', 'desc')->paginate(10);

		return view('item_types.index', compact('item_types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('item_types.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$item_type = new ItemType();

		$item_type->name = $request->input("name");

		$item_type->save();

		return redirect()->route('item_types.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$item_type = ItemType::findOrFail($id);

		return view('item_types.show', compact('item_type'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item_type = ItemType::findOrFail($id);

		return view('item_types.edit', compact('item_type'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$item_type = ItemType::findOrFail($id);

		$item_type->name = $request->input("name");

		$item_type->save();

		return redirect()->route('item_types.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$item_type = ItemType::findOrFail($id);
		$item_type->delete();

		return redirect()->route('item_types.index')->with('message', 'Item deleted successfully.');
	}

}
