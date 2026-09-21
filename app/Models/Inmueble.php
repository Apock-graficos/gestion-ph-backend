<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Inmueble extends Model { protected $table='inmuebles'; public $timestamps=false; protected $fillable=['torre','apto','parqueadero','deposito','coeficiente','matricula_inmobiliaria','pdf_certificado_libertad_url','referencia_bancaria','valor_cuota_anterior','valor_cuota_actual','creado_en']; protected $casts=['coeficiente'=>'decimal:4','valor_cuota_anterior'=>'decimal:2','valor_cuota_actual'=>'decimal:2','creado_en'=>'datetime']; public function residentes(){return $this->hasMany(InmuebleResidente::class);} public function estadosCuenta(){return $this->hasMany(EstadoCuenta::class);} }
