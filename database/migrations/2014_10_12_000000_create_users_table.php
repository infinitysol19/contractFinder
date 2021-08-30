<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUsersTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/ 
public function up()
{  
 
Schema::create('users', function (Blueprint $table) {
$table->id();
$table->string('email')->unique();
$table->string('first_name', 200 )->nullable();
$table->string('last_name', 200 )->nullable();
$table->text('image')->default('defultProfile.png');
$table->json('setting')->default('["daily_email_alerts_new","daily_email_alerts","time_sensitive_tenders_alerts","account_manager","bid_writing_advice"]'); 
$table->string('company', 300 )->nullable();
$table->string('industry_sector', 300 )->nullable();
$table->string('number_of_employees', 300 )->nullable();
$table->string('turnover', 300 )->nullable();
$table->string('company_post_code', 300 )->nullable();
$table->string('phone_number', 200 )->nullable();
$table->integer('role_id')->nullable();
$table->timestamp('email_verified_at')->nullable();
$table->string('password')->nullable();
$table->string('password_show')->nullable();
$table->enum('block_unblok', ['yes','no'])->default('no');
$table->enum('is_softdel', ['yes','no'])->default('no');
$table->rememberToken();
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
Schema::dropIfExists('users');
}
}