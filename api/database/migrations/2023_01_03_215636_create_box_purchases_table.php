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
        Schema::create('box_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('box_id')->nullable()->constrained('boxes');
            $table->foreignId('purchase_id')->nullable()->constrained('purchases');
            $table->decimal('amount',8,2)->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('box_purchases');
    }
};
