<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
            $categories = Category::when(isset(request()->search),function ($query){
                $search = request()->search;
                $query->where("title","LIKE","%$search%");

            })->latest("id")->paginate(5);
            return view('Category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest("id")->limit(5)->get();
        return view('Category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $request->validate([
           "title"=>"required|min:3|unique:categories,title"
        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->user_id = Auth::id();
        $category->save();

        return redirect()->back()->with('add',$request->title."  is added");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('Category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validate([
           "title"=>"required|min:3|unique:categories,title,".$category->id
        ]);

        $category->title = $request->title;
        $category->update();

        return  redirect()->route('category.index')->with('up',$category->title." is updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $categoryName = $category->title;
        $category->delete();
        return redirect()->route('category.index')->with('del',$categoryName." is deleted");
    }

    public function search(Request $request){
        return $request;
    }


}
