<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_agents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->string('agent_name', 100);
            $table->text('agent_image');
            $table->string('agent_contact_no', 100);
            $table->string('agent_address', 100);
            $table->string('agent_email', 100);
            $table->string('agent_website', 100)->nullable();
            $table->string('agent_agency', 100)->nullable();
            $table->string('agent_company', 100)->nullable();
            $table->string('company_phone_no', 100)->nullable();
            $table->string('company_address', 100)->nullable();
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_agents');
    }
}
