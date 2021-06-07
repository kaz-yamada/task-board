<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->unsignedInteger('board_owner');
            $table->unsignedInteger('team_id')->nullable();
            $table->boolean('is_private')->default(true);
            $table->timestamps();
        });

        Schema::create('board_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("board_id");
            $table->timestamps();
        });

        Schema::create('card_lists', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->smallInteger('position')->default(0);
            $table->unsignedInteger("board_id");
            $table->timestamps();
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text('description')->nullable();
            $table->smallInteger('position')->default(0);
            $table->unsignedInteger('card_owner');
            $table->unsignedInteger('card_list_id');
            $table->timestamps();
        });

        Schema::create('card_label', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->unsignedInteger("card_id");
            $table->unsignedInteger("label_id");
            $table->timestamps();
        });

        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string("color");
            $table->timestamps();
        });

        Schema::create('card_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("card_id");
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("card_id");
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
        Schema::dropIfExists('boards');
        Schema::dropIfExists('board_user');
        Schema::dropIfExists('card_lists');
        Schema::dropIfExists('cards');
        Schema::dropIfExists('labels');
        Schema::dropIfExists('card_label');
        Schema::dropIfExists('card_user');
        Schema::dropIfExists('comments');
    }
}
