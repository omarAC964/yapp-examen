<?php
/**
 * Created by PhpStorm.
 * User: Omar
 * Date: 07/01/2017
 * Time: 2:33 PM
 */
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class DiasTrabajo extends Model{
    protected $table = 'dias_trabajo';
    protected $primaryKey = 'id';
    protected $fillable = array('hora_inicio', 'hora_fin', 'restaurants_id');

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }
}