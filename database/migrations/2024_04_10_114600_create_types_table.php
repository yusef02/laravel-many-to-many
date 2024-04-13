<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [
                'blog',
                'e-commerce',
                'community',
                'forum',
                'coupon',
                'crowdfunding',
                'event',
                'info',
                'landing page',
                'news',
                'one page',
                'personal',
                'portfolio',
                'social network',
                'streaming'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
};
