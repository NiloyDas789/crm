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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->foreignId('master_category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('partner_type_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('partner_id');
            $table->string('business_registration_number');
            $table->string('service_workflow_id');
            $table->foreignId('currency_id')->constrained()->cascadeOnDelete();
            $table->string('street');
            $table->string('zip_code');
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->string('phone');
            $table->string('email');
            $table->string('fax');
            $table->string('website');
            $table->foreignId('office_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('partners');
    }
};
