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
        Schema::table('users', function (Blueprint $table) {
            $table->string('city')->nullable(); // عمود المدينة
            $table->string('address')->nullable(); // عمود العنوان
            $table->string('building')->nullable(); // اسم المبنى أو رقم الفيلا
            $table->text('description')->nullable(); // الوصف الإضافي
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['city', 'address', 'building', 'description']);
        });
    }
    };
