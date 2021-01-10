<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('issue_number')->unique(); // رقم القضية
            // $table->unsignedInteger('client_code')->unique(); // رقم العميل في المكتب
            // $table->string('client_name');
            $table->foreignId('client_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('issue_court_code')->unique(); // الرقم الآلي للقضية في المحكمة
            $table->string('court_name');
            $table->string('opponent_name');
            $table->string('type'); // نوع الدعوى
            $table->string('subject');
            $table->date('issue_date');
            $table->date('session_date');
            // $table->string('client_description'); // صفة الموكل
            $table->string('opponent_description'); // صفة الخصم
            $table->string('previous_decision');
            $table->string('issue_status');
            $table->double('contract_value', 10, 2);
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
        Schema::dropIfExists('issues');
    }
}
