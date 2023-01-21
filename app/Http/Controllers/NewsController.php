<?php

 namespace App\Http\Controllers;
 use App\Models\News;
use GrahamCampbell\ResultType\Success;
use illuminate\http\Request;
 use illuminate\Support\Facades\Validator;
use PHPUnit\Util\Json;

  class NewsController extends Controller {

   public function index(){
    $news = News::all();
    return response()->json([
        'success' => true,
        'message' => 'Sukses Data News',
        'data' => $news
    ]);
   }

   public function store(Request $request){

     $validator = Validator::make($request->all(),[
     'judul' => 'required',
     'penulis' => 'required',
     'content' => 'required'
     ]);

     if ($validator->fails()) {

         return response()->json([
            'success' => false,
            'message' => 'Semua Wajib Diisi!!!',
            'data' => $validator->errors()
         ], 401);

     } else {

        $news = News::create([
        'judul' => $request->input('judul'),
        'penulis' => $request->input('penulis'),
        'content' => $request->input('content')
        ]);

          if ($news) {

            return response()->json([
                'success' => true,
                'message' => 'Berhasil diinput',
                'data' => $news 
            ], 201);

          } else {

            return response()->json([
                'success' => false,
                'message' => 'Gagal diinput',
                'data' => $news 
            ], 400);

          }


     }

   }

   public function show($id){
   
     $news = News::find($id);

     if($news){

         return response()->json([
         
            'Success' => true,
            'message' => 'Detail News',
            'Data' => $news

         ], 200);

     } else {

        return response()->json([
         
            'Success' => false,
            'message' => 'Detail News Tidak Ada',

         ], 404);

     }

    }

     public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penulis' => 'required',
            'content' => 'required'
            ]);
       
        
            if($validator->fails()){

                return response()->json([
                    'success' => false,
                    'message' => 'Semua Wajib Diisi!!!',
                    'data' => $validator->errors()
                 ], 401);
        
            } else {

                $news = News::whereId($id)->update([
                    'judul' => $request->input('judul'),
                    'penulis' => $request->input('penulis'),
                    'content' => $request->input('content')
                ]);

                if($news){

                    return response()->json([
                        'Success' => true,
                        'message' => 'Post News Berhasil',
                        'Data' => $news
                     ], 201);
            
                }else{

                    return response()->json([
                        'Success' => false,
                        'message' => 'Post News Gagal',
                     ], 400);

                }


            }

     }

     public function destroy($id){

         $news = News::whereId($id)->first();
         $news->delete();

         if($news){
    
            return response()->json([
                'Success' => true,
                'message' => 'Hapus News Berhasil',
             ], 200);

         }else{

            return response()->json([
                'Success' => false,
                'message' => 'Hapus News Gagal',
             ], 404);

         }


     }

   
  }



?>