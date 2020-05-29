<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Pbook;
class CreatePbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbooks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('writer_name');
            $table->string('category_id');
            $table->string('user_id');
            $table->integer('price');
            $table->string('description',5000);
            $table->string('image');
            $table->integer('views')->default(0);
            $table->enum('available',[Pbook::available_book,Pbook::unavailable_book])->default(Pbook::unavailable_book);
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
        Schema::dropIfExists('pbooks');
    }
}
