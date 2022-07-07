<?php

use App\Models\Publication;
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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Publication::IDCAT);
            $table->foreign(Publication::IDCAT)->references('id')->on('categories');
            $table->unsignedBigInteger(Publication::IDUSER);
            $table->foreign(Publication::IDUSER)->references('id')->on('users');
            $table->timestamp(Publication::DATE_PUBLICATION);
            $table->integer(Publication::ACTIFYN)->nullable();
            $table->string(Publication::TITRE)->nullable();
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
        Schema::dropIfExists('publications');
    }
};
