<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesProduct extends Model
{
    use HasFactory;
    protected $fillable = ["sale_id","product_id","quantity"];
    public $timestamps = false;
}
