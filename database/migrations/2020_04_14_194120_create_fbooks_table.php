<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Fbook;
class CreateFbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fbooks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('writer_name');
            $table->string('category_id');
            $table->string('user_id');
            $table->string('description',5000);
            $table->string('image');
            $table->integer('views')->default(0);
            $table->enum('available',[Fbook::available_book,Fbook::unavailable_book])->default(Fbook::unavailable_book);
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
        Schema::dropIfExists('fbooks');
    }
}
