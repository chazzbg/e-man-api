<?php
/**
 * Created by PhpStorm.
 * User: chazz
 * Date: 12/5/18
 * Time: 11:07 PM
 *
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'id_user',
        'lat',
        'lng',
        'elevation'
    ];
}
