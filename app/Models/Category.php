<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = "categories";
    protected $fillable = [
        "name",
        "status",
        "deleted_at",
        "created_at",
        "updated_at",
    ] ;

    public function products(){
        return $this->hasMany(Product::class);
    }
}
