<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moduller extends Model
{
    use HasFactory;
    protected $table="moduller";
    protected $fillable=["id","baslik","seflink","durum","created_at","updated_at"];
}
