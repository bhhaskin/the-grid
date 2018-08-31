<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecretsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secrets', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('label')->nullable();
            $table->text('notes')->nullable();
            $table->enum('type', ['credential', 'secret'])->default('secret');
            $table->string('username')->nullable();
            $table->binary('data')->nullable();
            $table->string('url', 2083)->nullable();
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secrets');
    }
}
