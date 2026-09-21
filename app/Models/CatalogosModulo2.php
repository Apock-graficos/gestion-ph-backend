<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class TipoMovimientoBancario extends Model {protected $table='tipos_movimiento_bancario';public $timestamps=false;protected $fillable=['nombre'];}
class CanalPago extends Model {protected $table='canales_pago';public $timestamps=false;protected $fillable=['nombre'];}
class EstadoConciliacion extends Model {protected $table='estados_conciliacion';public $timestamps=false;protected $fillable=['nombre'];}
class MedioPago extends Model {protected $table='medios_pago';public $timestamps=false;protected $fillable=['nombre'];}
