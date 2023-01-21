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
            Schema::create('customer_product', function (Blueprint $table) {

            $table->foreignIdFor(\App\Models\Customer::class)->nullable()->constrained()->restrictOnDelete();
            $table->foreignIdFor(\App\Models\Product::class)->nullable()->constrained()->restrictOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_product');
    }
};
