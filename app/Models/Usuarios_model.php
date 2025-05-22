<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_model extends Model
{
    protected $table      = 'persona'; // nombre exacto de tu tabla
    protected $primaryKey = 'id_persona';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'nombre_persona',
        'apellido_persona',
        'nacimiento_persona',
        'dni_persona',
        'correo_persona',
        'contraseña_persona',
        'id_estado_persona',
        'id_perfil',
        'fecha_persona'
    ];

    protected $useTimestamps = false; // ya usás fecha_persona como timestamp
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
}
