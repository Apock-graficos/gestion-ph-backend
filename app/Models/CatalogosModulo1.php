<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class TipoResidente extends Model {protected $table='tipos_residente';public $timestamps=false;protected $fillable=['nombre'];}
class CalidadResidente extends Model {protected $table='calidades_residente';public $timestamps=false;protected $fillable=['nombre'];}
class EstadoAprobacion extends Model {protected $table='estados_aprobacion';public $timestamps=false;protected $fillable=['nombre'];}
class TipoSoporteResidencia extends Model {protected $table='tipos_soporte_residencia';public $timestamps=false;protected $fillable=['nombre'];}
