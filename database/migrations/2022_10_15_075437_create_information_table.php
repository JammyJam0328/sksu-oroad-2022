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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('user_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('extension_name')->nullable();
            $table->boolean('has_changed_last_name')->default(false);
            $table->string('old_last_name')->nullable();
            $table->string('birth_date');
            $table->string('address');
            $table->string('contact_number');
            $table->foreignId('program_id');
            $table->foreignId('campus_id');
            $table->foreignId('student_status_id');
            $table->string('sex');
            $table->string('valid_id');
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
        Schema::dropIfExists('information');
    }
};
