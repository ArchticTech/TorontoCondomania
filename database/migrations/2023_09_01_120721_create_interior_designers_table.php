<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteriorDesignersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interior_designers', function (Blueprint $table) {
            $table->id();
            $table->string('interior_designer_name', 100);
            $table->boolean('is_main')->default(false);
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('created_by')->default(1);
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
        Schema::dropIfExists('interior_designers');
    }
}
