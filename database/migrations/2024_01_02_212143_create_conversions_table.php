<?php

use App\Enums\MusicTempoEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conversions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id')->nullable(true);
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('genres');
            $table->text('themes');
            $table->integer('length');
            $table->enum('tempo', [MusicTempoEnum::LOW->value,
                                    MusicTempoEnum::NORMAL->value,
                                    MusicTempoEnum::HIGH->value]);
            $table->string('music_path')->nullable(true);
            $table->string('mood');
            $table->boolean('status')->default(1);
            $table->boolean('is_favorite')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversions');
    }
};
