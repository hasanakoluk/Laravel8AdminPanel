<?php

         namespace App\Models;
         
         use Illuminate\Database\Eloquent\Factories\HasFactory;
         use Illuminate\Database\Eloquent\Model;
         
         class Hizmetler extends Model
         {
             use HasFactory;
             protected $table="hizmetler";
             protected $fillable=["id","baslik","seflink","kategori","resim","metin","anahtar","description","durum","sirano","created_at","updated_at"];
         }