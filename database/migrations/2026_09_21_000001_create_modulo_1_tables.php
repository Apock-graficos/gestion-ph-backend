<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tipos_identificacion', function (Blueprint $t) { $t->id(); $t->string('codigo', 10)->unique(); $t->string('nombre', 100); });
        Schema::create('roles', function (Blueprint $t) { $t->id(); $t->string('nombre', 50)->unique(); });
        Schema::create('tipos_residente', function (Blueprint $t) { $t->id(); $t->string('nombre', 50)->unique(); });
        Schema::create('calidades_residente', function (Blueprint $t) { $t->id(); $t->string('nombre', 50)->unique(); });
        Schema::create('estados_aprobacion', function (Blueprint $t) { $t->id(); $t->string('nombre', 30)->unique(); });
        Schema::create('tipos_soporte_residencia', function (Blueprint $t) { $t->id(); $t->string('nombre', 100)->unique(); });
        Schema::create('inmuebles', function (Blueprint $t) { $t->id(); $t->string('torre',50); $t->string('apto',50); $t->string('parqueadero',50)->nullable(); $t->string('deposito',50)->nullable(); $t->decimal('coeficiente',7,4); $t->string('matricula_inmobiliaria',100)->nullable(); $t->string('pdf_certificado_libertad_url')->nullable(); $t->string('referencia_bancaria',100)->unique()->nullable(); $t->decimal('valor_cuota_anterior',12,2); $t->decimal('valor_cuota_actual',12,2); $t->timestamp('creado_en')->useCurrent(); });
        Schema::create('usuarios', function (Blueprint $t) { $t->id(); $t->string('username',100)->unique(); $t->string('password_hash'); $t->string('nombre',150); $t->string('apellido',150); $t->string('identificacion',50)->unique(); $t->foreignId('tipo_identificacion_id')->constrained('tipos_identificacion'); $t->string('email',150)->unique(); $t->string('telefono',50)->nullable(); $t->foreignId('rol_id')->constrained('roles'); $t->boolean('activo')->default(true); $t->boolean('confirma_habeas_data')->default(false); $t->string('firma_digital_url')->nullable(); $t->text('huella_template')->nullable(); $t->string('foto_url')->nullable(); });
        Schema::create('inmueble_residentes', function (Blueprint $t) { $t->id(); $t->foreignId('inmueble_id')->constrained('inmuebles'); $t->foreignId('usuario_id')->constrained('usuarios'); $t->foreignId('tipo_residente_id')->constrained('tipos_residente'); $t->foreignId('calidad_residente_id')->constrained('calidades_residente'); $t->date('fecha_inicio_periodo')->nullable(); $t->date('fecha_fin_periodo')->nullable(); $t->foreignId('estado_aprobacion_id')->default(1)->constrained('estados_aprobacion'); $t->text('observaciones_aprobacion')->nullable(); $t->timestamp('creado_en')->useCurrent(); });
        Schema::create('soportes_residencia', function (Blueprint $t) { $t->id(); $t->foreignId('inmueble_residente_id')->constrained('inmueble_residentes'); $t->foreignId('tipo_soporte_id')->constrained('tipos_soporte_residencia'); $t->string('archivo_url'); $t->foreignId('estado_validacion_id')->default(1)->constrained('estados_aprobacion'); $t->foreignId('validado_por')->nullable()->constrained('usuarios'); $t->timestamp('fecha_validacion')->nullable(); });
    }
    public function down(): void { foreach (['soportes_residencia','inmueble_residentes','usuarios','inmuebles','tipos_soporte_residencia','estados_aprobacion','calidades_residente','tipos_residente','roles','tipos_identificacion'] as $table) Schema::dropIfExists($table); }
};
