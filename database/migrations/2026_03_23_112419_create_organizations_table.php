<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\OrganizationTypeEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('organizations', function (Blueprint $table) {
        $table->id();
        $table->uuid('uuid')->unique(); // UUIDs will be exposed to endpoints instead of primary keys, enhancing security.
        $table->string('name');
        $table->enum('organization_type', OrganizationTypeEnum::values());  //Enum
        $table->string('registration_number')->nullable();
        $table->string('country')->nullable();//are all companies Kenyan based? We might need to refactor the attributes in this table
        $table->string('address')->nullable();
        $table->string('contact_email')->nullable();
        $table->string('contact_phone')->nullable();
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
