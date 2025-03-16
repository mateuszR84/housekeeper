<?php

namespace Stdevs\Housekeeper\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateItemsTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('stdevs_housekeeper_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('price')->nullable();
            $table->string('price_status')->nullable();
            $table->string('condition')->nullable();
            $table->string('status')->nullable();
            $table->string('location')->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('is_saleable');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('stdevs_housekeeper_items');
    }
};
