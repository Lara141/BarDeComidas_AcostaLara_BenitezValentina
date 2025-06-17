<?php

namespace App\Models;

use CodeIgniter\Model;

class Detalle_Venta_Model extends Model
{
    protected $table      = 'detalle_venta';// nombre de la tabla en la base de datos
    protected $primaryKey = 'id_detalle_venta';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';//tipo de dato que devuelve el modelo
    //protected $useTimestamps = false; //true si se quiere usar timestamps
    protected $useSoftDeletes = false;//true si se quiere usar soft deletes

    protected $allowedFields = ['id_venta', 'id_producto', 'cantidad', 'precio_unitario', 'subtotal', 'activo'];//campos que se pueden insertar o actualizar en la base de datos (los mismos nombres que estan en la base de datos deben estar aca, excepto el que tiene la llavesita osea el id)

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;
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