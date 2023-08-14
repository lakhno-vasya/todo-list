<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')
                ->default(false)
                ->comment('0=Pending, 1=Completed');
            $table->unsignedBigInteger('parent_id')
                ->nullable()
                ->default(null)
                ->references('id')
                ->on('tasks');
            $table->tinyInteger('priority');
            $table->string('title');
            $table->text('description');
            $table->fullText('description');
            $table->dateTime('completedAt');
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
        Schema::dropIfExists('tasks');
    }
}
