<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->index()->unique();
            $table->integer('price')->default(0);
            $table->integer('price_old')->default(0);
            $table->integer('price_entry')->default(0)->comment('Giá nhập');
            $table->integer('category_id')->default(0);
            $table->integer('document_id')->default(0);
            $table->integer('admin_id')->default(0);
            $table->string('avatar')->nullable();
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->string('img4')->nullable();
            $table->integer('view')->default(0);
            $table->tinyInteger('sale')->default(0);
            $table->tinyInteger('hot')->default(0);
            $table->tinyInteger('active')->default(0);
            $table->integer('paid')->default(0);
            $table->mediumText('description')->nullable();
            $table->mediumText('tech_info')->nullable();
            $table->text('content')->nullable();
            $table->string('description_seo')->nullable();
            $table->string('keyword_seo')->nullable();
            $table->string('title_seo')->nullable();
            $table->integer('review_total')->default(0);
            $table->integer('review_star')->default(0);
            $table->tinyInteger('type_star')->default(0);
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
}
