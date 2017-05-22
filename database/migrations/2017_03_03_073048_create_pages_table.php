<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parent_id');
            $table->string('title');
            $table->string('description');
            $table->string('keywords');
            $table->string('name');
            $table->string('url');
            $table->text('text');
            $table->char('published', 1);
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->string('top_menu')->nullable();
            $table->string('footer_menu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
