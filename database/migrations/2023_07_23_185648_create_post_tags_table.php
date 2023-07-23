<?php

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained((new Post())->getTable());
            $table->foreignId('tag_id')->constrained((new Tag())->getTable());

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_tags');
    }
};
