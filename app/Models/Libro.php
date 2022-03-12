<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = "libros";
    protected $primarykey = "id";
    protected $fillable = ["name","precio","created_at","updated_at"];
}
