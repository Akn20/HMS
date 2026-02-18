<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration {
=======
return new class extends Migration
{
>>>>>>> origin/main
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('institutions', function (Blueprint $table) {
<<<<<<< HEAD
            $table->uuid('id')->primary();
=======
            $table->id();
>>>>>>> origin/main

            // Core Details
            $table->string('name');
            $table->string('code')->unique();
<<<<<<< HEAD
            $table->uuid('organization_id')->nullable();
            $table->string('gst_number')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('pincode')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('timezone')->nullable();

            // Branding
            $table->string('institution_url')->nullable();
            $table->string('login_template')->nullable();
            $table->string('logo')->nullable();
            $table->string('default_language')->nullable();

            // Admin
            $table->string('admin_name')->nullable();
            $table->string('admin_email')->nullable();
            $table->string('admin_mobile')->nullable();
            $table->string('role')->nullable();
            $table->tinyInteger('status')->default(1);

            // Legal & Commercial
            $table->string('mou_copy')->nullable();
            $table->string('po_number')->nullable();
            $table->date('po_start_date')->nullable();
            $table->date('po_end_date')->nullable();
            $table->string('subscription_plan')->nullable();


            // Billing
            $table->string('invoice_type')->nullable();
            $table->string('invoice_frequency')->nullable();
            $table->string('payment_mode')->nullable();
            $table->decimal('invoice_amount', 12, 2)->nullable();
            $table->string('payment_status')->nullable();
            $table->boolean('payment_received')->default(false);
            $table->date('payment_date')->nullable();
            $table->string('transaction_reference')->nullable();

            // Support
            $table->string('poc_name')->nullable();
            $table->string('poc_email')->nullable();
            $table->string('poc_contact')->nullable();
            $table->string('support_sla')->nullable();

            $table->softDeletes();
=======
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->text('address')->nullable();

            // Access & Branding
            $table->string('institution_url')->nullable();
            $table->string('default_language')->nullable();
            $table->string('login_template')->nullable();
            $table->string('logo')->nullable();

            // Admin & Control
            $table->string('admin_name')->nullable();
            $table->string('admin_email')->nullable();
            $table->string('admin_mobile')->nullable();

            // Billing & Payment
            $table->string('invoice_type')->nullable();
            $table->decimal('invoice_amount', 10, 2)->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('payment_status')->nullable();

            // Status
            $table->enum('status', ['Active', 'Inactive'])->default('Active');

>>>>>>> origin/main
            $table->timestamps();
        });
    }

<<<<<<< HEAD



=======
>>>>>>> origin/main
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> origin/main
