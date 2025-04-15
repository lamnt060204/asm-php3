<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, SoftDeletes;

    protected $table ="products";
    protected $fillable = [
        "name",
        "price",
        "quantity",
        "image",
        "category_id",
        "status",
        "description",
        "deleted_at",
        "created_at",
        "updated_at",
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
