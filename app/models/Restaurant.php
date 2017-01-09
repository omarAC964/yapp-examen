<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 07/01/2017
 * Time: 2:33 PM
 */
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Restaurant extends Model{
    protected $table = 'restautants';
    protected $primaryKey = 'id';
    protected $fillable = array('nombre_restaurant', 'direccion', 'telefono');

    public function dias(){
        return $this->hasMany('DiasTrabajo','restaurants_id','id');
    }
}