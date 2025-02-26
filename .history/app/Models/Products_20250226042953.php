<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug');
        $table->text('description');
        $table->text('image');
        $table->float('price');
        $table->timestamps();
    });
}
