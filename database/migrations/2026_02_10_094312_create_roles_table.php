<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {

            $table->uuid('id')->primary(); // UUID primary key

            $table->string('name'); // admin / user
            $table->string('description')->nullable();
            $table->boolean('status')->default(true);

            $table->timestamps();
            $table->softDeletes(); // deleted_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
