<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Tag;
use Illuminate\Http\Request;

class siteController extends Controller
{
    public function about()
    {
        return view('pages.site.about');
    }
     public function contact()
     {
         return view('pages.site.contact');
     }
     public function blog()
     {
         $blogs=Content::whereType(1)->whereStatus('accepted')->paginate(5);
         $tags=\App\Models\Tag::all();
         return view('pages.site.blog',compact('blogs','tags'));
     }
    public function berita()
    {
        $berita=Content::whereType(3)->whereStatus('accepted')->paginate(5);
        $tags=Tag::all();
        return view('pages.site.berita',compact('berita','tags'));
    }
    public function singleblog()
    {
        $blogs=Content::whereType(1)->whereStatus('accepted')->get();
        $tag=Tag::all();
        return view('pages.site.singleblog', compact('tag','blogs'));
    }
}
