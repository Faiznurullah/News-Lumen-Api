<?php

namespace App\Http\Controllers;

use App\Models\News;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        return view('home');
    }

    public function insert(Request $request)
    {
       Request()->validate([
           'judul' => 'required',
           'penulis' => 'required',
           'content' => 'required'
       ],[
           'judul.required' => 'Nama Wajib Diisi !!!',
           'penulis.required' => 'Penulis Wajib Diisi !!!',
           'content.required' => 'Content Wajib Diisi !!!'
       ]);

       News::create([
            'judul' => request('judul'),
            'penulis' => request('penulis'), 
            'content' => request('content'),  
       ]);
    
   return redirect('/daftar')->with('Pesan', 'Data Sukses Dikirim');
    
      }

      public function daftar()
    {
        $data = News::all();
        return view('daftar', compact('data'));
    }

    public function detail($id)
    {
        $data = News::where('id', $id)->first();

        if(!$data){

            abort(404);
    
            }

        return view('detail', compact('data'));
    }
    public function hapus($id){

        $x = News::find($id);

        if(!$x){

            abort(404);
    
            }

        $x->delete();
        return redirect('/daftar')->with('Pesan', 'Data Sukses Dihapus');

     }
     public function edit($id)
     {
         $data = DB::table('news')->where('id', $id)->first();
 
         if(!$data){
 
             abort(404);
     
             }
 
         return view('edit', compact('data'));
     }
     public function update($id, Request $request)
    {
       Request()->validate([
           'judul' => 'required',
           'penulis' => 'required',
           'content' => 'required'
       ],[
           'judul.required' => 'Nama Wajib Diisi !!!',
           'penulis.required' => 'Penulis Wajib Diisi !!!',
           'content.required' => 'Content Wajib Diisi !!!'
       ]);

       $a = News::where('id', $id)
             ->update([
                    'judul' => $request->judul,
                    'penulis' => $request->penulis,
                    'content' => $request->content
             ]);

    
   return redirect('/daftar')->with('Pesan', 'Data Sukses Diupdate');
    
      }

}
