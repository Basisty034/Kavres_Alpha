<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // $table->string('image')->after('product_name'); // Comment or remove this line
            $table->string('seller_name')->after('price');
            $table->string('seller_profile_image')->after('seller_name');
            $table->string('payment_method')->nullable()->after('seller_profile_image');
            $table->decimal('total_payment', 8, 2)->nullable()->after('payment_method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['seller_name', 'seller_profile_image', 'payment_method', 'total_payment']);
        });
    }
};