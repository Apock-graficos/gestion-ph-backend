<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class InmuebleResidente extends Model {protected $table='inmueble_residentes';public $timestamps=false;protected $fillable=['inmueble_id','usuario_id','tipo_residente_id','calidad_residente_id','fecha_inicio_periodo','fecha_fin_periodo','estado_aprobacion_id','observaciones_aprobacion','creado_en'];protected $casts=['fecha_inicio_periodo'=>'date','fecha_fin_periodo'=>'date','creado_en'=>'datetime'];}
class SoporteResidencia extends Model {protected $table='soportes_residencia';public $timestamps=false;protected $fillable=['inmueble_residente_id','tipo_soporte_id','archivo_url','estado_validacion_id','validado_por','fecha_validacion'];protected $casts=['fecha_validacion'=>'datetime'];}
