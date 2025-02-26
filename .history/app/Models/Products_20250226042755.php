<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('description');
        $table->string('price');
        $table->timestamps();
    });
}
