<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\SalePurchaseAgreementStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /*This table stores the agreement between the buyer and us, after a purchase inquiry has been made.
    It shows full commitment that the deal is supposed to go through.*/
    public function up(): void
    {
        Schema::create('sale_purchase_agreements', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('inquiry_id')->unique()->constrained('purchase_inquiries')->cascadeOnDelete();
            $table->foreignId('buyer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('product_specification_id')->constrained()->cascadeOnDelete();
            $table->decimal('agreed_quantity_kg', 12, 3);
            $table->decimal('price_per_kg', 15, 2);
            $table->decimal('total_amount', 18, 2);
            $table->decimal('commitment_fee_amount', 18, 2)->nullable();
            $table->string('currency')->default('USD');
            $table->enum('status', SalePurchaseAgreementStatusEnum::values())->default(SalePurchaseAgreementStatusEnum::ISSUED->value);
            $table->string('contract_number')->unique();
            $table->string('document_url')->nullable();
            $table->timestamp('issued_at')->nullable(); // This time is different from created_at, because we might create the agreement in the system before actually issuing it to the buyer.
            $table->timestamp('signed_at')->nullable(); // Same as this one, because the agreement might be signed after it's created in the system.
            
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_purchase_agreements');
    }
};
