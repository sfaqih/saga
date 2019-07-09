<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use DB;

class ArticleController extends Controller
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
        $article = Article::all();

        return view('article.index', ['data' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->articleCategory();

        return view('article.form_add', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'title' => 'required|min:10|unique:article,title',
                'slug' => 'required|min:10|unique:article,slug',
                'category' => 'required',
                'banner' => 'required|image|max:5012',
                'content' => 'required|min:25',
            ]
        );

        $banner = $request->file('banner');
        if ($request->hasFile('banner')) {
            $banner_name = $this->uploadBanner($banner);
        }
        
        Article::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category,
            'content' => $request->content,
            'banner_original' => $banner_name
        ]);
        
        return redirect('/article')->with(['status' => 'success','message' => 'Article Successfully Created']);;
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
    public function edit($id)
    {
        $data  = Article::find($id);
        $category = $this->articleCategory();

        return view('article.form_edit', ['data' => $data, 'category' => $category]);
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
        $this->validate(
            $request,
            [
                'title' => 'required|min:10',
                'slug' => 'required|min:10',
                'category' => 'required',
                'banner' => 'image|max:5012',
                'content' => 'required|min:25',                
            ]
        );

        $article = Article::find($id);

        $banner = $request->file('banner');
        if ($request->hasFile('banner')) {
            $article->banner_original = $this->uploadBanner($banner);
        }

        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->category_id = $request->category;
        $article->content = $request->content;
        $article->banner_original = $article->banner_original;
        

        $article->save();

        return redirect('/article')->with(['status' => 'success','message' => 'Article Successfully Updated']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/article')->with(['status' => 'success','message' => 'Article has been deleted']);
    }

    public function resizeImage(Type $var = null)
    {
        # code...
    }

    private function articleCategory()
    {
        $category_list = DB::table('article_category')->pluck('name', 'id');
        $category = array('' => 'Choose Category') + $category_list->toArray();
        
        return $category;
    }

    private function uploadBanner($banner)
    {
        $banner_name = str_replace( '.'.$banner->getClientOriginalExtension(), '', $banner->hashName() );
        $banner_name = $banner_name.date('dmY').'.'.$banner->getClientOriginalExtension();
    
        $destinationPath = public_path('/images');
    
        $banner->move($destinationPath, $banner_name); 
        
        return $banner_name;
    }
}
