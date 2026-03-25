<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\LabTestStatusEnum;
use App\Enums\LabTestTypeEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('skr_id')
                ->constrained('skr_records')
                ->cascadeOnDelete();

            $table->foreignId('lab_id')
                ->constrained('organizations')
                ->cascadeOnDelete();
            

            $table->enum('test_type', LabTestTypeEnum::values())->default(LabTestTypeEnum::XRF->value);
            

            $table->decimal('purity_result', 5, 2)->nullable();

            $table->enum('status', LabTestStatusEnum::values())->default(LabTestStatusEnum::PENDING->value);
            

            $table->foreignId('retest_of')
                ->nullable()
                ->constrained('lab_tests')
                ->nullOnDelete(); //WHENEVER A RETEST OCCURS, FOR AUDITING, HISTORY TRACKING.

            $table->string('report_url')->nullable();

            $table->timestamp('tested_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_tests');
    }
};
