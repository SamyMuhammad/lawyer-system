<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionRollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_rolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code')->unique(); // الرقم الآلي
            $table->string('court');
            $table->foreignId('client_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('opponent_name');
            $table->string('opponent_description');
            $table->date('session_date');
            $table->string('previous_decision');
            $table->date('date');
            $table->text('notes');
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
        Schema::dropIfExists('session_rolls');
    }
}
