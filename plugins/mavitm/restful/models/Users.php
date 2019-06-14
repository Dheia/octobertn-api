<?php namespace Mavitm\Restful\Models;

use Model;

/**
 * Model
 */
class Users extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mavitm_restful_api_users';

    public $belongsTo = [
        'api' => ['Mavitm\Restful\Models\Api'],
        'user'  => ['RainLab\User\Models\User']
    ];

    public function beforeUpdate()
    {
        if(empty($this->api_id) && !empty($this->api->id))
        {
            $this->api_id = $this->api->id;
        }
    }
}
