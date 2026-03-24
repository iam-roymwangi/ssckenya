<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\InventoryBatchStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_batches', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete(); //Shows us the refinery where SSC got the gold from.
            $table->string('batch_code')->unique();
            $table->decimal('total_weight_kg', 12, 3);
            $table->decimal('available_weight_kg', 12, 3);
            $table->decimal('purity_estimate', 5, 2); //This helps us to know which product specification this batch belongs to, and also helps us to evaluate the price of the batch.
            $table->enum('status', InventoryBatchStatusEnum::values())->default(InventoryBatchStatusEnum::AVAILABLE->value);
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_batches');
    }
};
