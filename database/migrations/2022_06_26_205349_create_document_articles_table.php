<?php
use App\Models\DocumentArticle;
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
        Schema::create('document_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(DocumentArticle::ID_ARTICLE);
            $table->foreign(DocumentArticle::ID_ARTICLE)->references('id')->on('articles');
            $table->unsignedBigInteger(DocumentArticle::ID_DOCUMENT);
            $table->foreign(DocumentArticle::ID_DOCUMENT)->references('id')->on('documents');
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
        Schema::dropIfExists('document_articles');
    }
};
