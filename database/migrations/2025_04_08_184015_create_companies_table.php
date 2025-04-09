<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->uuid()
                ->unique();
            $table->string('name');
            $table->foreignId('industry_id')
                ->constrained();
            $table->foreignId('tenant_id')
                ->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
        $table->dropForeign(['industry_id']);
        $table->dropForeign(['tenant_id']);
        });

        Schema::dropIfExists('companies');
        Schema::dropIfExists('industries');
    }
};
