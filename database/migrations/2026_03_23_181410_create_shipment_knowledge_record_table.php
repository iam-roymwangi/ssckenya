<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\ShipmentKnowledgeRecordEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipment_knowledge_record', function (Blueprint $table) {
            Schema::create('skr_records', function (Blueprint $table) {
                $table->id();
                $table->uuid('uuid')->unique();
                $table->string('skr_code')->unique();
                $table->foreignId('spa_id')->constrained('sale_purchase_agreements')->cascadeOnDelete();
                $table->foreignId('buyer_id')->constrained('users')->cascadeOnDelete();
                $table->foreignId('product_specification_id')->constrained()->cascadeOnDelete();
                $table->decimal('total_weight_kg', 12, 3);
                $table->enum('current_stage', ShipmentKnowledgeRecordEnum::values())->default(ShipmentKnowledgeRecordEnum::ORDER_CONFIRMED->value);
                $table->date('expected_delivery_date')->nullable();
                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_knowledge_record');
    }
};
