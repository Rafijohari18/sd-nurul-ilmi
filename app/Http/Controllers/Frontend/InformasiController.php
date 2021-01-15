<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Response;
use Http;
use App\Models\CategoryContent;
use App\Models\PageLang;
use App\Models\PageMedia;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Page;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Content;
use App\Models\ProfilAlumni;
use App\Models\Alumni;
use App\Models\Config;
use App\Models\Slider;
use App\Models\Dosen;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Playlist;
use App\Models\Video;
use Auth;
use Session;
use DB;

class InformasiController extends Controller
{

    public function index($slug)
    {
        $data['category'] = CategoryContent::where('slug',$slug)->first();
        $data['content'] = Content::where('category_content_id',$data['category']->id)->get();
         
        return view('frontend.informasi',compact('data'));
    }

    public function preview(Request $request, $slug)
    {
        $data['content']        = Content::where('slug',$slug)->first();
        $data['content_news']   = Content::where('category_content_id',$data['content']->category_content_id)
                                    ->get()->take(5);
                            
        $data['category']       = CategoryContent::where('id',$data['content']->category_content_id)->first();
         
        return view('frontend.preview_informasi',compact('data'));
    }

    public function kontak()
    {
        $data['kontak'] = Config::where('id',10)->first();
        return view('frontend.kontak',compact('data'));
        

    }

    public function prevslider(Request $request, $id)
    {
        $data['slider'] = Slider::where('id',$id)->first();
        $data['content_news']   = Content::where('category_content_id',1)
        ->get()->take(5);

        return view('frontend.preview_slider',compact('data'));
    }

    public function tentang()
    {
        $data['visi']           = PageLang::where('id',4)->first();
        $data['misi']           = PageLang::where('id',5)->first();

        $data['sambutan']       = PageLang::where('id',1)->first();

        $data['foto_ketua']     = PageMedia::where('page_id',1)->get();
        

        return view('frontend.tentang',compact('data'));
    }

    public function profilAlumni()
    {
    
        $data['alumni']     = Alumni::orderBy('id','DESC')->get();
    
        return view('frontend.profil-alumni',compact('data'));
    }

    public function gallery()
    {
        $data['album']     = Album::where('id','!=',3)->get();

        $data['photo']     = Photo::where('album_id','!=',3)->with('album')->get();
     
    
        return view('frontend.gallery',compact('data'));
    }

    public function galleryvideo()
    {
        $data['album']     = Playlist::get();
        $data['video']     = Video::with('album')->get();
     
    
        return view('frontend.video',compact('data'));
    }

    public function sarpras()
    {
        $data['album']     = Album::where('id',3)->get();
        $data['photo']     = Photo::where('album_id',3)->with('album')->get();
     
    
        return view('frontend.sarpras',compact('data'));
    }

    public function guru()
    {
        $data['guru']  = Guru::orderBy('id','DESC')->get();

        return view('frontend.guru',compact('data'));
    }

    public function siswa()
    {
        $data['siswa']  = Siswa::orderBy('id','DESC')->get();
        return view('frontend.siswa',compact('data'));
        
    }

}