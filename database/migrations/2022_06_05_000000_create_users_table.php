<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string(User::PRENOM)->nullable();
            $table->string(User::NOM)->nullable();
            $table->unsignedBigInteger(User::IDORG)->nullable();
            $table->foreign(User::IDORG)->references('id')->on('organisations');
            $table->string(User::POSTE)->nullable();
            $table->string(User::NUMERO_TELEPHONE)->nullable();
            $table->string(User::STATUS)->nullable();
            $table->integer(User::ACTIFYN)->nullable();
            $table->string(User::EMAIL)->unique()->nullable();
            $table->timestamp(User::DELETED_AT)->nullable();
            $table->date(User::DATE_NAISSANCE)->nullable();
            $table->timestamp(User::EMAIL_VERIFIED_AT)->nullable();
            $table->string(User::PASSWORD);
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
};
