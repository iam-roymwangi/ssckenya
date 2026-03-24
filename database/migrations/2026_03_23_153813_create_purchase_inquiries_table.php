<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\PurchaseInquiryStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    /*This table stores a show of interest from the buyer, an approach from them to buy our gold.
    A purchase inquiry will lead to a sale purchase agreement, if both parties agree. So the relationship is 
    One to Zero or One, because a purchase inquiry might not lead to a sale purchase agreement.*/ 
    public function up(): void
    {
        Schema::create('purchase_inquiries', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('buyer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_specification_id')->constrained()->cascadeOnDelete();
            $table->decimal('requested_quantity_kg', 12, 3);
            $table->text('message')->nullable();
            $table->enum('status', PurchaseInquiryStatusEnum::values())->default(PurchaseInquiryStatusEnum::PENDING->value);
            $table->timestamps();
    

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_inquiries');
    }
};
