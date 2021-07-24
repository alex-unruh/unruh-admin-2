<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleriesRequest;

class GalleriesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data['galleries'] = Gallery::all();
		return view('admin.galleries.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.galleries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \App\Http\Requests\GalleriesRequest $request;
	 * @return \Illuminate\Http\Response
	 */
	public function store(GalleriesRequest $form)
	{
		$request = $form->validated();
		DB::transaction(function () use ($request) {
			$gallery = new Gallery();
			$gallery->name = $request['name'];
			$gallery->slug = $request['slug'];
			$gallery->save();
			if (isset($request['gallery'])) {
				$gallery->images()->createMany($request['gallery']);
			}
		});

		return redirect()->route('galleries')->with('success', 'Galeria cadastrada com sucesso!');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Gallery $galeria)
	{
		$data['gallery'] = $galeria;
		return view('admin.galleries.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(GalleriesRequest $form, Gallery $galeria)
	{
		$request = $form->validated();
		DB::transaction(function () use ($request, $galeria) {
			$galeria->name = $request['name'];
			$galeria->slug = $request['slug'];
			$galeria->save();
			if (isset($request['gallery'])) {
				$galeria->images()->delete();
				$galeria->images()->createMany($request['gallery']);
			}
		});

		return redirect()->route('galleries')->with('success', 'Galeria atualizada com sucesso!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Post::where('gallery_id', $id)->update(['gallery_id' => null]);
        $gallery = Gallery::find($id);
        if(in_array($gallery->slug, config('admin.protected_galleries'))){
            return redirect()->back()->with('error', 'Essa galeria não pode ser excluída');
        }
        $gallery->delete();
		return redirect()->route('galleries')->with('success', 'Galeria excluída com sucesso!');
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function createSlug(Request $request)
	{
		$slug = Str::slug($request->name, '-');
		$increment = 1;
		while (Gallery::where('slug', $slug)->get()->count() > 0) {
			$slug .= '-' . $increment;
		}
		return response()->json(['slug' => $slug]);
	}
}
