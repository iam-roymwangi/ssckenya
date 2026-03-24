<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\ProductSpecificationLabelEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    /*This table helps group the products into tiers, or levels.
    From the moment gold is mined and refined, it comes in different qualities
    There is, for instance, gold bars that are 90-100% pure,
    80-90% pure, etc. 
    We need to have records of each product, and the spec where it belongs, 
    and the minimum you can order, etc. */
    public function up(): void
    {
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->decimal('purity_min', 5, 2);
            $table->decimal('purity_max', 5, 2);
            $table->decimal('min_weight_kg', 10, 3)->nullable();
            $table->decimal('max_weight_kg', 10, 3)->nullable();
            $table->decimal('min_order_qty_kg', 10, 3);
            $table->enum('specification_label', ProductSpecificationLabelEnum::values())->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_specifications');
    }
};
