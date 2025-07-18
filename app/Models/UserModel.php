<?php //vamos a crear tantos modelos como tablas tengamos en labase de datos

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'persona';// nombre de la tabla en la base de datos
    protected $primaryKey = 'id_persona';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';//tipo de dato que devuelve el modelo
    protected $useTimestamps = false; //true si se quiere usar timestamps
    protected $useSoftDeletes = false;//true si se quiere usar soft deletes

    protected $allowedFields = ['nombre_persona', 'apellido_persona', 'nacimiento_persona', 'dni_persona', 'correo_persona', 'contrasenia_persona', 'id_estado_persona', 'id_perfil', 'fecha_persona'];//campos que se pueden insertar o actualizar en la base de datos (los mismos nombres que estan en la base de datos deben estar aca, excepto el que tiene la llavesita osea el id)

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}