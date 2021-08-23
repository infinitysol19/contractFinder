<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUsersubscriptionsTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('usersubscriptions', function (Blueprint $table) {
$table->id();
$table->integer('user_id')->nullable();
$table->integer('package_id')->nullable();
$table->string('card_number', 200 )->nullable();
$table->string('card_cvc', 200 )->nullable();
$table->string('card_expiry_month', 200 )->nullable();
$table->string('card_expiry_year', 200 )->nullable();
$table->text('charg_id', 200 )->nullable();
$table->dateTime('package_start_date')->nullable();
$table->dateTime('package_end_date')->nullable();
$table->enum('block_unblok_sub', ['yes','no'])->default('no');
$table->enum('renewal_mode', ['yes','no'])->default('no');
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
Schema::dropIfExists('usersubscriptions');
}
}