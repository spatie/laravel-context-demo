<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnapshotsTable extends Migration
{
    public function up(): void
    {
        Schema::create('snapshots', function (Blueprint $table): void {
            $table->increments('id');
            $table->uuid('aggregate_uuid');
            $table->unsignedInteger('aggregate_version');
            $table->json('state');
            $table->timestamp('created_at');
            $table->index('aggregate_uuid');
        });
    }
}
