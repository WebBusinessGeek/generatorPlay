<?php

class LibrariansController extends \BaseController {

	/**
	 * Display a listing of librarians
	 *
	 * @return Response
	 */
	public function index()
	{
		$librarians = Librarian::all();

		return View::make('librarians.index', compact('librarians'));
	}

	/**
	 * Show the form for creating a new librarian
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('librarians.create');
	}

	/**
	 * Store a newly created librarian in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Librarian::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Librarian::create($data);

		return Redirect::route('librarians.index');
	}

	/**
	 * Display the specified librarian.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$librarian = Librarian::findOrFail($id);

		return View::make('librarians.show', compact('librarian'));
	}

	/**
	 * Show the form for editing the specified librarian.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$librarian = Librarian::find($id);

		return View::make('librarians.edit', compact('librarian'));
	}

	/**
	 * Update the specified librarian in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$librarian = Librarian::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Librarian::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$librarian->update($data);

		return Redirect::route('librarians.index');
	}

	/**
	 * Remove the specified librarian from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Librarian::destroy($id);

		return Redirect::route('librarians.index');
	}

}
