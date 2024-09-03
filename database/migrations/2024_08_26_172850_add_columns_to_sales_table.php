<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSalesTable extends Migration
{
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->string('name')->after('product_id');
            $table->string('category')->after('name');
            $table->text('description')->after('category');
            $table->decimal('price', 8, 2)->after('description');
            $table->integer('stock')->after('price');
            $table->string('image')->after('stock'); // Add image field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn(['name', 'category', 'description', 'price', 'stock', 'image']);
        });
    }
}
