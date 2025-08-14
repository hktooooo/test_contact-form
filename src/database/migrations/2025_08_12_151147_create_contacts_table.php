<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:src/database/migrations/2025_07_26_110606_create_contacts_table.php
            $table->bigInteger('category_id')->unsigned();
=======
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
>>>>>>> origin/main:src/database/migrations/2025_08_12_151147_create_contacts_table.php
            $table->string('first_name');
            $table->string('last_name');
            $table->tinyInteger('gender');
            $table->string('email');
<<<<<<< HEAD:src/database/migrations/2025_07_26_110606_create_contacts_table.php
            $table->string('tel', 11);
=======
            $table->string('tel');
>>>>>>> origin/main:src/database/migrations/2025_08_12_151147_create_contacts_table.php
            $table->string('address');
            $table->string('building')->nullable();
            $table->text('detail');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
