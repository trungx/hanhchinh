<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('ancestor_id')->unsigned()->nullable();
            $table->integer('order')->unsigned()->nullable();
            $table->integer('visibility')->unsigned()->default(1);
            $table->string('title');
            $table->string('type')->nullable();
            $table->string('full_title')->nullable();
            $table->string('code')->nullable();
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->text('filename')->nullable();
            $table->text('page_image')->nullable();
            $table->text('description')->nullable();
            $table->index(['id', 'slug']);
            $table->softDeletes();
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
        Schema::dropIfExists('regions');
    }
}
