<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class CalidadIngreso extends Model {protected $table='calidades_ingreso';public $timestamps=false;protected $fillable=['nombre'];}
class EspecieMascota extends Model {protected $table='especies_mascota';public $timestamps=false;protected $fillable=['nombre'];}
class RegistroIngreso extends Model {protected $table='registros_ingreso';public $timestamps=false;protected $fillable=['inmueble_id','nombre_completo','identificacion','tipo_identificacion_id','calidad_ingreso_id','check_in','check_out','contacto_email','foto_visitante_url','creado_por','creado_en'];protected $casts=['check_in'=>'datetime','check_out'=>'datetime','creado_en'=>'datetime'];}
class VehiculoIngreso extends Model {protected $table='vehiculos_ingreso';public $timestamps=false;protected $fillable=['registro_ingreso_id','placa','marca','color'];}
class MascotaIngreso extends Model {protected $table='mascotas_ingreso';public $timestamps=false;protected $fillable=['registro_ingreso_id','nombre','especie_id','carnet_vacunacion_url','certificado_apoyo_emocional_url'];}
class EmpleadaDomestica extends Model {protected $table='empleadas_domesticas';public $timestamps=false;protected $fillable=['inmueble_id','nombre_completo','identificacion','documento_id_url','hora_ingreso_permitido','hora_salida_permitido','activa'];protected $casts=['activa'=>'boolean'];}
