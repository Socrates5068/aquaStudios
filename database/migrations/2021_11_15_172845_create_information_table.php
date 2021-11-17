<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('image', 150)->default('images/contact.webp');
            $table->string('address', 100)->default('Pasaje héroes del chaco (Galeria A&A) AMB. 19');
            $table->string('telephone', 30)->default('61883536');
            $table->string('schedule', 100)->default('Lunes a viernes de 9:00 a 16:00');
            
            $table->string('twitter', 100)->default('#');
            $table->string('facebook', 100)->default('#');
            $table->string('instagram', 100)->default('#');
            $table->string('whatsapp', 100)->default('#');

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
        Schema::dropIfExists('information');
    }
}
