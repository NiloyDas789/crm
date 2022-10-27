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
        Schema::create('office_checkins', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('start');
            $table->time('wait_time');
            $table->foreignId('contact_id')->constrained()->cascadeOnDelete();
            $table->longText('visit_purpose');
            $table->foreignId('assignee_id')->constrained('users')->cascadeOnDelete();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('office_checkins');
    }
};
