    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('posts_kajian_acara', function (Blueprint $table) {
                $table->id();
                $table->string('event_name', 255);
                $table->date('event_date');
                $table->time('start_time');
                $table->string('speaker', 255)->nullable();
                $table->text('description')->nullable();
                $table->string('location', 255)->nullable();
                $table->boolean('is_routine')->default(false);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('posts_kajian_acara');
        }
    };
