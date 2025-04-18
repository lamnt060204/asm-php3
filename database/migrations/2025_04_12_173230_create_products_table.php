<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer("price");
            $table->integer("quantity");
            $table->string("image");
            $table->unsignedBigInteger('category_id');
            $table->bigInteger("status")->default(1)->nullable();
            $table->text("description")->nullable();
            $table->foreign("category_id")->references("id")->on("categories");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
