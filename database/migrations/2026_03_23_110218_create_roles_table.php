<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    /* ROLES table allows the same user to have multiple roles, 
    and also allows for future expansion of the roles system 
    without needing to modify the users table (Roles enum in users table).

    This enhances user experience as they do not have to log out and log back in to switch roles, 
    and it also allows for more flexible role management in the future.

    Its also helpful in auditing and tracking which user did what, 
    as one person has only one account, but can have multiple roles, 
    and we can track their activities across all their roles.
    */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g. buyer, admin, refinery_admin, lab_admin, courier_agent
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
