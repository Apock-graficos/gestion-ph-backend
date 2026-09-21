<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model;
class TipoIdentificacion extends Model {protected $table='tipos_identificacion';public $timestamps=false;protected $fillable=['codigo','nombre'];}
