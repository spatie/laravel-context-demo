<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table): void {
            $table->id();
            $table->uuid('uuid');
            $table->uuid('product_uuid');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('total_price');
            $table->timestamps();
        });
    }
}
