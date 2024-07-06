<?php

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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->unsignedBigInteger('students_id');
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('books_id');
            $table->foreign('books_id')->references('id')->on('books')->onDelete('cascade');
            $table->date('borrowed_at')->useCurrent();
            $table->date('returned_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowings');
    }
};
