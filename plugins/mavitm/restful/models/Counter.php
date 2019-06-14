<?php namespace Mavitm\Restful\Models;

use Model;


class Counter extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $rules = [];

    protected $jsonable = ['request_body'];

    public $table = 'mavitm_restful_counter';

    public $belongsTo = [
        'api'   => ['Mavitm\Restful\Models\Api'],
        'user'  => ['RainLab\User\Models\User']
    ];
}
