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
    { if (!Schema::hasTable('wishlists')) {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();  // معرف المفضلة
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // معرف المستخدم
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // معرف المنتج
            $table->timestamps();  // تاريخ الإنشاء والتحديث
        });
    }
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
