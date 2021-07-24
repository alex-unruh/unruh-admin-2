<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostsRequest;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

	private $categories;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data['posts'] = Post::all();
		return view('admin.posts.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$data['categories'] = Category::where('id', '>', 1)->get();
		$data['galleries'] = Gallery::all();
		return view('admin.posts.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\PostsRequest $form
	 * @return \Illuminate\Http\Response
	 */
	public function store(PostsRequest $form)
	{
		$form = $form->validated();
		$this->categories = $form['categories'] ?? null;
		if ($this->categories) {
			unset($form['categories']);
		}
		DB::transaction(function () use ($form) {
			$post = new Post();
			$post->fill($form);
			$post->author = auth()->user()->id;
			$post->save();
			$this->syncCategories($post->id);
		});
		return redirect()->route('posts')->with('success', 'Post cadastrado com sucesso!');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  App\Models\Post $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post)
	{
		$data['categories'] = Category::where('id', '>', 1)->get();
		$data['galleries'] = Gallery::all();
		$data['post'] = $post;
		return view('admin.posts.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(PostsRequest $form, Post $post)
	{
		$form = $form->validated();
		$this->categories = $form['categories'] ?? null;
		if ($this->categories) {
			unset($form['categories']);
		}
		DB::transaction(function () use ($form, $post) {
			$post->fill($form);
			$post->save();
			$this->syncCategories($post->id);
		});
		return redirect()->route('posts')->with('success', 'Post atualizado com sucesso!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
        $post = Post::find($id);
        if (in_array($post->slug, config('admin.protected_posts'))) {
            return redirect()->back()->with('warning', 'Essa página é default do sistema e não pode ser excluída');
        }
        $post->delete();
		return redirect()->route('posts')->with('success', 'Post excluído com sucesso!');
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function createSlug(Request $request)
	{
		$slug = Str::slug($request->title, '-');
		$increment = 1;
		while(Post::where('slug', $slug)->get()->count() > 0){
		 	$slug .= '-' . $increment;
		}
		return response()->json(['slug' => $slug]);
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	private function syncCategories($post_id)
	{
		if ($this->categories) {
			$post = Post::find($post_id);
			$post->categories()->sync($this->categories);
		}
	}
}
