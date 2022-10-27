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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('dob');
            $table->string('client_id');
            $table->string('email');
            $table->string('phone');
            $table->string('contact_reference')->nullable();
            $table->string('street')->nullable();
            $table->foreignId('city_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('zip_code')->nullable();
            $table->string('visa_expiry_date')->nullable();
            $table->string('application')->nullable();
            $table->string('assignee_id')->nullable();
            $table->string('followers')->nullable();
            $table->string('source')->nullable();
            $table->string('tag_name')->nullable();
            $table->double('rating', 2, 1)->nullable();
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
        Schema::dropIfExists('clients');
    }
};
