<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id('worker_id');
            $table->string('name');
            $table->bigInteger('salary')->unsigned();
            $table->string('email');
            $table->timestamps();

            $table->unsignedBigInteger('office_id');

            $table->foreign('office_id')->references('office_id')->on('offices')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
