<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApidataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apidata', function (Blueprint $table) {

  
            $table->id();
            $table->text('title')->nullable();
            $table->text('title_slug')->nullable();
            $table->text('description')->nullable();
            $table->text('summary')->nullable();
            $table->string('cpv', 200 )->nullable();
            $table->json('cpvjson', 200 )->nullable(); 
            $table->string('location', 300 )->nullable();
            $table->json('location2')->nullable();
            $table->dateTime('published_date')->nullable();
             $table->dateTime('end_date')->nullable();
            $table->string('oicd', 500 )->nullable();
            $table->string('tid', 500 )->nullable();
            $table->double('price')->nullable();
            $table->double('min_price')->nullable();
            $table->string('currency', 200 )->nullable();
            $table->string('buyer_location', 300 )->nullable();
            $table->string('buyer_postal_code', 300 )->nullable();
            $table->string('buyer_region', 300 )->nullable();
            $table->string('status', 300 )->nullable();
            $table->string('tag', 200 )->nullable();
            $table->string('buyer_name_1', 200 )->nullable();
            $table->string('buyer_name_2', 200 )->nullable();
            $table->string('supplier_name', 200 )->nullable();
            $table->string('api_type', 200 )->nullable();
            $table->json('object')->nullable();
            $table->string('tender_id', 300 )->nullable()->unique();
            $table->string('initiation_time', 200 )->nullable();
            $table->enum('is_softdel', ['yes','no'])->default('no');
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
        Schema::dropIfExists('apidata');
    }
}
