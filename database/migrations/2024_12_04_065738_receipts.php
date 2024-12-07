<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_uuid')->nullable()->unique(); // UUID column
            $table->string('username');
            $table->string('game_name');
            $table->string('platform');
            $table->string('rank')->nullable();
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->text('image_url')->nullable();
            $table->timestamps();
        });

        // Add the trigger for auto-generating receipt_uuid
        DB::unprepared("
        CREATE TRIGGER generate_receipt_uuid BEFORE INSERT ON receipts
        FOR EACH ROW
        BEGIN
            IF NEW.receipt_uuid IS NULL THEN
                SET NEW.receipt_uuid = CONCAT('CN-', LPAD(
                    IFNULL(
                        (SELECT MAX(CAST(SUBSTRING(receipt_uuid, 4) AS UNSIGNED)) + 1 FROM receipts),
                        1
                    ), 
                    4, '0')
                );
            END IF;
        END
    ");
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS generate_receipt_uuid");
        Schema::dropIfExists('receipts');
    }
};
