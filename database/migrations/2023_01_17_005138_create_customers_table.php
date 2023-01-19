<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->text('first_name');
            $table->text('last_name');
            $table->text('phone1');
            $table->text('phone2')->nullable();
            $table->text('email');
            $table->text('Address1');
            $table->text('house_number1');
            $table->text('postal_code1');
            $table->text('city1');
            $table->text('Address2')->nullable();
            $table->text('house_number2')->nullable();
            $table->text('postal_code2')->nullable();
            $table->text('city2')->nullable();
 
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
        Schema::dropIfExists('customers');
    }
};
