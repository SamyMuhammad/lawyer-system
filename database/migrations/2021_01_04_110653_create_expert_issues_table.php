<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('issue_court_code')->unique(); // الرقم الآلي
            $table->string('type'); // نوع الدعوى
            $table->string('experts_court');
            $table->string('expert_name');
            $table->foreignId('client_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('opponent_name');
            $table->string('opponent_description');
            $table->string('previous_decision');
            $table->integer('floor_number');
            $table->integer('hall_number');
            $table->date('date');
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
        Schema::dropIfExists('expert_issues');
    }
}
