<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\DeliveryStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('skr_id')
                ->constrained('skr_records')
                ->cascadeOnDelete();

            $table->foreignId('courier_id')
                ->nullable()
                ->constrained('organizations')
                ->nullOnDelete();
            // organization.type = 'courier'

            $table->string('tracking_number')->nullable();

            $table->enum('status', DeliveryStatusEnum::values())->default(DeliveryStatusEnum::PENDING->value);
            

            $table->timestamp('shipment_date')->nullable();
            $table->timestamp('estimated_delivery_date')->nullable();
            $table->timestamp('delivered_at')->nullable();

            $table->string('destination_country')->nullable();
            $table->string('destination_address')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
