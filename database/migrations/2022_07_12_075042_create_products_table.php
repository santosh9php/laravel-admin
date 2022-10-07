<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->default('');
            $table->decimal('regular_price', $precision = 19, $scale = 2)->default(0.00);
            $table->decimal('sale_price', $precision = 19, $scale = 2)->default(0.00);
            $table->integer('quantity')->default(0);
            $table->bigInteger('sold_quantity')->default(0);
            $table->string('size')->nullable();
            $table->string('colour')->nullable();
            $table->string('weight')->nullable();
            $table->mediumText('images')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('image_attr')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_desc')->nullable();
            $table->enum('featured', ['1', '0'])->default('0');    
            $table->unsignedBigInteger('views')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
