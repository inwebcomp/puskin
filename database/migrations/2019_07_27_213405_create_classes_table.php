<?php

use App\Models\ClassModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            ClassModel::statusColumn($table);
            ClassModel::positionColumn($table);
            $table->unsignedInteger('teacher_id')->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
        });

        Schema::create('class_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_model_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('slug');
            $table->text('text')->nullable();

            $table->unique(['class_model_id','locale']);
            $table->foreign('class_model_id')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_translations');
        Schema::dropIfExists('classes');
    }
}
