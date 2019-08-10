<?php

use App\Models\Contact;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            Contact::statusColumn($table);
            Contact::positionColumn($table);
            $table->string('phone')->nullable();
            $table->string('phone_mobile')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        Schema::create('contact_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('name')->nullable();

            $table->unique(['contact_id','locale']);
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_translations');
        Schema::dropIfExists('contacts');
    }
}
