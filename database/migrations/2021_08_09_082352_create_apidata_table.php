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
            $table->text('cpv', 200 )->nullable();
            $table->json('cpvjson', 200 )->nullable(); 
            $table->text('location', 300 )->nullable();
            $table->json('location2')->nullable();
            $table->dateTime('published_date')->nullable();
             $table->dateTime('end_date')->nullable();
            $table->text('oicd', 500 )->nullable();
            $table->text('tid', 500 )->nullable();
            $table->double('price')->default(0);
            $table->double('min_price')->default(0);
            $table->text('currency', 200 )->nullable();
            $table->text('buyer_location', 300 )->nullable();
            $table->text('buyer_postal_code', 300 )->nullable();
            $table->text('buyer_region', 300 )->nullable();
            $table->text('status', 300 )->nullable();
            $table->text('tag', 200 )->nullable();
            $table->text('buyer_name_1', 200 )->nullable();
            $table->text('buyer_name_2', 200 )->nullable();
            $table->text('supplier_name', 200 )->nullable();
            $table->text('api_type', 200 )->nullable();
            $table->json('object')->nullable();
            $table->text('tender_id', 300 )->nullable();
            $table->text('initiation_time', 200 )->nullable();
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
