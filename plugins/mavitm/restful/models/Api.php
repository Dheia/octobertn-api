<?php namespace Mavitm\Restful\Models;

use Model;
use Mavitm\Restful\Models\Users;
/**
 * Model
 */
class Api extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $jsonable = ['config_data', 'displayed_fields'];

    public $rules = [
        'name'              => 'required',
        'primary_model'     => 'required',
        'config_data'       => 'required'
    ];

    public $table = 'mavitm_restful_api';


    public $hasMany = [
        'users' => [
            'Mavitm\Restful\Models\Users',
        ]
    ];

    public function afterSave()
    {
        Users::whereNull('api_id')->update(['api_id'=> $this->id]);
    }
}
