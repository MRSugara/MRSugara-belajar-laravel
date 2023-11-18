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
        Schema::create('product_circulations', function (Blueprint $table) {
            $table->id();
            $table->date('trx_date');
            $table->string('reff');
            $table->integer('in');
            $table->integer('out');
            $table->integer('product_id');
            $table->integer('remaining_stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_circulations');
    }
};
