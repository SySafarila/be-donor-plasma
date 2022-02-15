<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->enum('gender', ['rhesus-plus', 'rhesus-minus']);
            $table->string('placeBirth');
            $table->date('dateBirth');
            $table->string('mobile');
            $table->string('email');
            $table->enum('bloodType', ['blood-group-a', 'blood-group-b', 'blood-group-o', 'blood-group-ab']);
            $table->enum('rhesus', ['rhesus-plus', 'rhesus-minus']);
            $table->string('height');
            $table->string('weight');
            $table->date('positiveDate');
            $table->date('negativeDate');
            $table->boolean('agreement');
            $table->text('positiveImage');
            $table->text('negativeImage');
            $table->boolean('status');
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
        Schema::dropIfExists('donors');
    }
}
