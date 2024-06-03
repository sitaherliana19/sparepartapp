<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('product_code')->after('total_price'); 
            $table->string('product_name')->after('product_code'); 
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('product_code'); 
            $table->dropColumn('product_name');
        });
    }
};
