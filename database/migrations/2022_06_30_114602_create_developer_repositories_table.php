<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperRepositoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_repositories', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('developer_id')->unsigned();
            $table->string('name',150);
            $table->timestamps();
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developer_repositories');
    }
}
