<?php

use App\Models\Evenement;
use Illuminate\Console\Scheduling\Event;
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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Evenement::ID_PUB);
            $table->foreign(Evenement::ID_PUB)->references('id')->on('publications');
            $table->timestamp(Evenement::DATE_EVENEMENT);
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
        Schema::dropIfExists('evenements');
    }
};
