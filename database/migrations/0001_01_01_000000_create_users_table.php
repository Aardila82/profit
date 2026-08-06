<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'cliente'])->default('cliente');
            $table->string('celular')->nullable();
            $table->decimal('peso_actual', 5, 2)->nullable();
            $table->boolean('must_change_password')->default(true);
            
            // Campos de suscripcion
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            
            // Campos de clientes
            $table->integer('edad')->nullable();
            $table->decimal('altura', 5, 2)->nullable();
            $table->string('genero')->nullable();
            $table->string('objetivo')->nullable();
            $table->text('lesiones')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
