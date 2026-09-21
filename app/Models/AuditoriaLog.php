<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class AuditoriaLog extends Model {protected $table='auditoria_log';public $timestamps=false;protected $fillable=['usuario_id','accion','tabla_afectada','registro_id','valor_anterior','valor_nuevo','ip_address','fecha_accion'];protected $casts=['valor_anterior'=>'array','valor_nuevo'=>'array','fecha_accion'=>'datetime'];}
