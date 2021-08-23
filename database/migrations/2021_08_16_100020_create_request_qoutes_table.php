<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestQoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_qoutes', function (Blueprint $table) {
$table->id();
$table->integer('user_id')->nullable();
$table->text('link_to_tendor', 500 )->nullable();
$table->text('tender_worth', 200 )->nullable();
$table->dateTime('tender_colse_data')->nullable();
$table->text('tender_sector',300)->nullable();


$table->text('title', 200 )->nullable();
$table->text('location', 200 )->nullable();
$table->text('category', 200 )->nullable();
$table->text('duration', 200 )->nullable();
$table->text('offer', 200 )->nullable();
$table->text('description', 200 )->nullable();
$table->text('completed_bids', 200 )->nullable();
$table->text('percentage_rate', 200 )->nullable();
$table->text('qoute_rec', 200 )->nullable();
$table->text('qoute_end', 200 )->nullable();
$table->enum('reply', ['yes','no'])->default('no');
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
        Schema::dropIfExists('request_qoutes');
    }
}
