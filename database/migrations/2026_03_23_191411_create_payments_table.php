<?php

use App\Enums\PaymentStatusEnum;
use App\Enums\PaymentTypeEnum;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('skr_id')
                ->constrained('shipment_knowledge_record')
                ->cascadeOnDelete();

            $table->foreignId('spa_id')
                ->constrained('sale_purchase_agreements')
                ->cascadeOnDelete();

            $table->foreignId('buyer_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->decimal('amount', 18, 2);

            $table->string('currency')->default('USD');

            $table->enum('payment_type', PaymentTypeEnum::values())->default(PaymentTypeEnum::COMMITMENT_FEE->value);

            $table->string('payment_status', PaymentStatusEnum::values())->default(PaymentStatusEnum::PENDING->value);
            // App\Enums\PaymentStatusEnum

            $table->string('payment_method')->nullable();
            // bank_transfer, crypto, escrow

            $table->string('reference')->nullable();

            $table->timestamp('paid_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
