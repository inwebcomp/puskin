<?php

use App\Models\Entity;
use App\Models\Navigation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid')->nullable();
            $table->unsignedInteger('page_id')->nullable();
            $table->unsignedInteger('article_id')->nullable();
            Navigation::statusColumn($table);
            Navigation::positionColumn($table);
            $table->timestamps();
            $table->nestedSet();
        });

        Schema::table('navigation', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('navigation')->onDelete('cascade');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('set null');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('set null');
        });

        Schema::create('navigation_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('navigation_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('link')->nullable();

            $table->unique(['navigation_id', 'locale']);
            $table->foreign('navigation_id')->references('id')->on('navigation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navigation_translations');
        Schema::dropIfExists('navigation');
    }
}
