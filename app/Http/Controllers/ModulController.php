<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Moduller;
use App\Models\Kategoriler;
use File;
class ModulController extends Controller
{

     function __construct(){
     
      view()->share('moduller',Moduller::whereDurum(1)->get());


    }


    public function index(){
        return view("admin.include.moduller");
    }
    /* 1.Adım modül oluşturma */
    public function modulekle(Request $request){
        $request->validate([
            "baslik"=>"required|string",
        ]);
        $baslik=$request->baslik;
        $seflink=Str::of($baslik)->slug('');
        $kontrol=Moduller::whereSeflink($seflink)->first();
        if($kontrol){
         
            return redirect()->route("moduller")->with('hata','Bu modül daha önce eklenmiştir'); 

        }else{
            Moduller::create([
                "baslik"=>$baslik,
                "seflink"=>$seflink
            ]);
            /* 2.Adım Kategori kayıt işlemi */ 
             Kategoriler::create([
                 "baslik"=>$baslik,
                 "seflink"=>$seflink,
                 "tablo"=>"modul",
                 "sirano"=>1
             ]);
             /* 3.Adım dinamik tablo oluşturma */
             Schema::create($seflink, function (Blueprint $table) {
                $table->id();
                $table->string("baslik",255);
                $table->string("seflink",255);
                $table->string("resim",255)->nullable();
                $table->longText("metin")->nullable();
                $table->unsignedBiginteger("kategori");    //kategoriler tablosunun id si ile kurumsal tablosundaki kategori bölümünü ilişkilendirmek için kullanılır
                $table->string("anahtar",255)->nullable();
                $table->string("description",255)->nullable();
                $table->enum("durum",[1,2])->default(1);
                $table->integer("sirano")->nullable();
                $table->timestamps();
                $table->foreign("kategori")->references("id")->on("kategoriler")->onDelete("cascade");   /* foreign = kurumsal tablosundaki unsignedBiginteger'deki 
                                                                                      kategori kısmını almak için kullanılır.
                                                                                     references = ilişkilendirmek istediğimiz kategoriler tablosunun
                                                                                     id'sini belirtmek için kullanılır
                                                                                     on = hangi tablo ile ilişkilendireceksek ismi yazılır
                                                                                     onDelete("cascade") = kategoriler tablosunda ki veriler
                                                                                     silinirse kurumsal tablosundada silinsin anlamını taşır .   
                                                                                    */
            });
             /* 4. Adım model oluşturma */
             $modelDosyasi='<?php
    
             namespace App\Models;
             
             use Illuminate\Database\Eloquent\Factories\HasFactory;
             use Illuminate\Database\Eloquent\Model;
             
             class '.ucfirst($seflink).' extends Model
             {
                 use HasFactory;
                 protected $table="'.$seflink.'";
                 protected $fillable=["id","baslik","seflink","kategori","resim","metin","anahtar","description","durum","sirano","created_at","updated_at"];
             }';
             File::put(app_path('Models')."/".ucfirst($seflink).'.php',$modelDosyasi);  // Hizmetler.php
             return redirect()->route("moduller")->with('basarili','işleminiz başarı ile kaydedildi'); 
        }
      
       
     }
}
