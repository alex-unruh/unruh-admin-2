<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoriesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $form = $request->validated();
        $category = new Category();
        $category->fill($form);
        $category->save();
        return redirect()->route('categories')->with('success', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data['is_protected'] = in_array($category->slug, config('admin.protected_categories'));
        $data['categories'] = Category::all();
        $data['category'] = $category;
        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, Category $category)
    {
        $form = $request->validated();
        $category->fill($form);
        $category->save();
        return redirect()->route('categories')->with('success', 'Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (in_array($category->slug, config('admin.protected_categories'))) {
            return redirect()->back()->with('warning', 'Essa categoria é default do sistema e não pode ser excluída');
        }

        $category->delete();
        return redirect()->route('categories')->with('success', 'Registro excluído com sucesso!');
    }

    /**
     * 
     * @return void
     */
    public function createSlug(Request $request)
    {
        $slug = Str::slug($request->title, '-');
        $increment = 1;
        while (Category::where('slug', $slug)->get()->count() > 0) {
            $slug .= '-' . $increment;
        }
        return response()->json(['slug' => $slug]);
    }
}
