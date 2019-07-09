<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    
    public function index()
    {
        $article = Article::orderBy('created_at', 'desc')->take(6)->get();
        
        $instagram = $this->instagram(5);

        return view('index', ['article' => $article, 'ig' => $instagram]);
    }

    public function detailArticle($slug)
    {
        $data = Article::where('slug', $slug)->firstOrFail();
        $recent = Article::orderBy('created_at', 'desc')->where('slug', '!=', $slug)->take(3)->get();

        return view('website.detailArtikel', ['data' => $data, 'recent' => $recent]);
    }

    private function instagram($limit)
    {
        $api_url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=8775296042.da8183d.25214b8201bb4f7ebe6686d412c1eee2&count=".$limit;
        $curl = curl_init(); // initializing
        curl_setopt( $curl, CURLOPT_URL, $api_url ); // API URL to connect
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 ); // Return the result, do not print
        $json_return = curl_exec( $curl ); // Connect and get json data
        curl_close( $curl ); // Close connection
        $insta = json_decode( $json_return, true); // Decode and return
        
        foreach($insta['data'] as $feed){
                /* Photo Type
                * thumbnail
                * low_resolution
                * standard_resolution
                */
            $items[] = array(
                'link' => $feed['link'], 
                'url_image' => $feed['images']['standard_resolution']['url'], 
                'likes' => $feed['likes']['count'], 
                'caption' => $feed['caption']['text']
            );
        }
        return $items;
    }
}
