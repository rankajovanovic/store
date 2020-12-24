<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'description', 'avaible' ];
    
    public static function avaible() {
        return self::where('avaible', 1);
    }

    public static function unavailable() {
        return self::where('avaible', 0);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }


    public function author() {
        return $this->belongsTo(User::class, 'user_id');
      }

}

