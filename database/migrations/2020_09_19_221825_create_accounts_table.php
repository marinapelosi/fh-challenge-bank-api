<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agency_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('number')->unique();
            $table->decimal('balance', 8, 2);                       
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign('accounts_agency_id_foreign');            
            $table->dropForeign('accounts_user_id_foreign');            
        });
        Schema::dropIfExists('accounts');
    }
}
