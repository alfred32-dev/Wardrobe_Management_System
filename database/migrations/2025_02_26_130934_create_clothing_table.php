<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('clothings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // Tops, Bottoms, Shoes, Accessories, etc.
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('brand')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('image_url')->nullable();
            $table->string('outfit')->nullable(); // Church, Football, Work, etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clothings');
    }
};
