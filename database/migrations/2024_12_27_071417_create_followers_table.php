<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_followers', function (Blueprint $table) {
            // $table->id();
            $table->foreignIdFor(User::class,'follower_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class,'followed_id')->constrained()->cascadeOnDelete();
            $table->primary(['follower_id','followed_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_followers');
    }
};
