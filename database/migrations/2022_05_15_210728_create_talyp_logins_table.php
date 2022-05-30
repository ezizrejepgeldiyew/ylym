<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalypLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talyp_logins', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('sapak_id');
            $table->string('dogry_j');
            $table->string('jogap_s');
            $table->string('bal');
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
        Schema::dropIfExists('talyp_logins');
    }
}
