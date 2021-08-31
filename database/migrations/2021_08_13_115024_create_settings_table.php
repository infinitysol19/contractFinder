<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('home_banner_h1', 500 )->nullable();
            $table->text('home_banner_p', 500 )->nullable();
            $table->text('home_banner_p2', 500 )->nullable();

            $table->text('home_meta', 500 )->nullable();
            $table->text('blog_meta', 500 )->nullable();
            $table->text('contact_meta', 500 )->nullable();
            $table->text('livesearch_meta', 500 )->nullable();
            $table->text('historicalsearch_meta', 500 )->nullable();
            $table->text('pricing_meta', 500 )->nullable();
            $table->text('login_meta', 500 )->nullable();
            $table->text('register_meta', 500 )->nullable();
             $table->text('competitors_meta', 500 )->nullable();
             $table->text('buyer_behaviour_analysis_meta', 500 )->nullable();
            
            $table->text('myaccount_meta', 500 )->nullable();
            $table->text('single_page_tendor_meta', 500 )->nullable();
            $table->text('single_page_blog_meta', 500 )->nullable();
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
        Schema::dropIfExists('settings');
    }
}
