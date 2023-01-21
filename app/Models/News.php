<?php

 namespace App\Models;
 use illuminate\Database\Eloquent\Model;

 class news extends Model {


   protected $table = 'news';

   protected $fillable = [
   'judul',
   'penulis',
   'content'
   ];



 }



?>