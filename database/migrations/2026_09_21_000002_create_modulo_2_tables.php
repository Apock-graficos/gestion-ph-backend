<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('tipos_movimiento_bancario',fn(Blueprint $t)=>[$t->id(),$t->string('nombre',20)->unique()]);
  Schema::create('canales_pago',fn(Blueprint $t)=>[$t->id(),$t->string('nombre',50)->unique()]);
  Schema::create('estados_conciliacion',fn(Blueprint $t)=>[$t->id(),$t->string('nombre',30)->unique()]);
  Schema::create('medios_pago',fn(Blueprint $t)=>[$t->id(),$t->string('nombre',50)->unique()]);
  Schema::create('estados_cuenta',function(Blueprint $t){$t->id();$t->foreignId('inmueble_id')->constrained('inmuebles');$t->unsignedTinyInteger('periodo_mes');$t->unsignedSmallInteger('periodo_anio');foreach(['cuota_ordinaria','cuota_extraordinaria','intereses_mora','sanciones','descuentos','pagos_realizados','saldo_pendiente'] as $c)$t->decimal($c,12,2)->default(0);$t->date('fecha_vencimiento');$t->timestamp('creado_en')->useCurrent();$t->unique(['inmueble_id','periodo_mes','periodo_anio']);});
  Schema::create('extractos_bancarios',function(Blueprint $t){$t->id();$t->timestamp('fecha_importacion')->useCurrent();$t->foreignId('importado_por')->constrained('usuarios');$t->string('nombre_archivo',150)->nullable();$t->unsignedInteger('total_registros')->nullable();});
  Schema::create('movimientos_bancarios',function(Blueprint $t){$t->id();$t->foreignId('extracto_id')->constrained('extractos_bancarios');$t->date('fecha_movimiento');$t->string('descripcion');$t->string('referencia',100)->nullable();$t->decimal('valor',12,2);$t->foreignId('tipo_movimiento_id')->constrained('tipos_movimiento_bancario');$t->foreignId('canal_pago_id')->constrained('canales_pago');$t->foreignId('estado_conciliacion_id')->default(1)->constrained('estados_conciliacion');});
  Schema::create('pagos',function(Blueprint $t){$t->id();$t->foreignId('inmueble_id')->constrained('inmuebles');$t->foreignId('movimiento_bancario_id')->nullable()->constrained('movimientos_bancarios');$t->timestamp('fecha_pago');$t->decimal('valor_transferido',12,2);$t->foreignId('medio_pago_id')->constrained('medios_pago');$t->string('banco_origen',100)->nullable();$t->string('soporte_url')->nullable();$t->text('observaciones')->nullable();$t->foreignId('registrado_por')->constrained('usuarios');$t->timestamp('creado_en')->useCurrent();});
  Schema::create('sugerencias_conciliacion',function(Blueprint $t){$t->id();$t->foreignId('movimiento_id')->constrained('movimientos_bancarios');$t->foreignId('inmueble_id')->constrained('inmuebles');$t->unsignedInteger('puntaje_confianza');$t->json('criterios_coincidencia')->nullable();$t->timestamp('creado_en')->useCurrent();});
 }
 public function down():void{foreach(['sugerencias_conciliacion','pagos','movimientos_bancarios','extractos_bancarios','estados_cuenta','medios_pago','estados_conciliacion','canales_pago','tipos_movimiento_bancario'] as $x)Schema::dropIfExists($x);}
};
