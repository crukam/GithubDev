<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDeveloperRepositoryLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('developer_repository_language', function (Blueprint $table) {
            $table->integer('numberOfLignesOfCode')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('developer_repository_language', function (Blueprint $table) {
            $table->dropColumn('numberOfLignesOfCode');
        });
    }
}
