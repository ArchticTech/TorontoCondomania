<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactConsultationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_consultation', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100);
            $table->string('phone_no', 50);
            $table->string('email_address', 100);
            $table->string('call_response', 100)->nullable();
            $table->string('isBroker', 100)->nullable();
            $table->string('looking_for_purchase', 100)->nullable();
            $table->text('message_consultation');
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
        Schema::dropIfExists('contact_consultation');
    }
}
