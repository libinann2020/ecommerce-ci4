<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductCategory extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'product_categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['name','image','status'];

}
