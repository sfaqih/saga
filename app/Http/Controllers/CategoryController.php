<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Response;
use Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view('category.index', ['data' => $data]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:article_category,name',
            'slug' => 'required|unique:article_category,slug',
        ]);      
        
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
            
        return redirect('/category')->with(['status' => 'success','message' => 'Category Successfully Added']);;
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
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $data  = Category::find($id);
 
            return Response::json($data);                   
        }else{
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        
        return redirect('/category')->with(['status' => 'success','message' => 'Category Successfully Updated']);;
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
        $category->delete();

        return redirect('/category')->with(['status' => 'success','message' => 'Category has been deleted']);
    }
}
