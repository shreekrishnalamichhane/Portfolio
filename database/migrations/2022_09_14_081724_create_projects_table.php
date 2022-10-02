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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('slug')->unique();
            $table->string('duration')->nullable(false);
            $table->mediumText('short_description')->nullable(false);
            $table->string('cover_img')->nullable(false);
            $table->longText('description')->nullable(false);
            $table->string('tags')->nullable(false);
            $table->string('source')->nullable(true);
            $table->string('demo')->nullable(true);
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
        Schema::dropIfExists('projects');
    }
};
