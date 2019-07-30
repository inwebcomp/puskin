<?php

use App\Models\ClassModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            ClassModel::statusColumn($table);
            ClassModel::positionColumn($table);
            $table->timestamps();
        });

        Schema::create('teacher_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->string('slug');
            $table->string('post')->nullable();
            $table->text('text')->nullable();
            $table->text('contacts')->nullable();
            $table->text('subjects')->nullable();

            $table->unique(['teacher_id','locale']);
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_translations');
        Schema::dropIfExists('teachers');
    }
}
