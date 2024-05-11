<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
        */
        public function up(): void {
            Schema::create('complaits', function (Blueprint $table) {
                $table->id();
                $table->string('complait_submitted');
                $table->string('status')->default('unprocessed');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
        */
        public function down(): void {
            Schema::dropIfExists('complaits');
        }
    };
