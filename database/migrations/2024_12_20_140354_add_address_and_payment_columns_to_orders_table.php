<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('address')->nullable();         // لإضافة عمود العنوان
            $table->string('phone_number')->nullable();    // لإضافة عمود رقم الهاتف
            $table->string('cvv')->nullable();             // لإضافة عمود CVV
        });
    }
    
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['address', 'phone_number', 'cvv']);
        });
    }
    
};
