<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horizon_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('queue');
            $table->longText('payload');
            $table->string('status');
            $table->unsignedInteger('runtime')->nullable();
            $table->longText('exception')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('horizon_failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('connection');
            $table->string('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('horizon_monitoring', function (Blueprint $table) {
            $table->string('tag')->primary();
            $table->timestamp('last_seen')->nullable();
        });

        Schema::create('horizon_snapshots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('key');
            $table->longText('value');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horizon_snapshots');
        Schema::dropIfExists('horizon_monitoring');
        Schema::dropIfExists('horizon_failed_jobs');
        Schema::dropIfExists('horizon_jobs');
    }
};
