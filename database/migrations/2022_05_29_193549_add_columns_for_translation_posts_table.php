<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsForTranslationPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title_fr');
            $table->string('title_de');
            $table->string('title_es');
            $table->string('title_it');
            $table->string('description_fr');
            $table->string('description_de');
            $table->string('description_es');
            $table->string('description_it');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->removeColumn('title_fr');
            $table->removeColumn('title_de');
            $table->removeColumn('title_es');
            $table->removeColumn('title_it');
            $table->removeColumn('description_fr');
            $table->removeColumn('description_de');
            $table->removeColumn('description_es');
            $table->removeColumn('description_it');
        });
    }
}
