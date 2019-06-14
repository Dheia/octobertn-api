<?php namespace Mavitm\Restful\Classes;

use DB;
use Log;
use Schema;
use October\Rain\Support\Traits\Singleton;
use RainLab\Builder\Classes\ComponentHelper;
use October\Rain\Exception\ApplicationException;

class Models
{
    use Singleton;

    public $relationTypes = [
        "hasOne"        => "singular",
        "belongsTo"     => "singular",
        "hasMany"       => "plural",
        "belongsToMany" => "plural",
        "attachOne"     => "singular",
        "attachMany"    => "plural"
    ];

    public  $fileProperties = [
        "path",
        "getLocalPath",
        "sizeToString",
        "getContentType",
        "getExtension",
        "getFilename",
        "getLastModified",
    ];

    public $whereOperators = [
        1 => "=",
        2 => "!=",
        3 => "<",
        4 => ">",
        5 => ">=",
        6 => "<="
    ];

    public function getModels()
    {
        return ComponentHelper::instance()->listGlobalModels();
    }

    public function modelFields($modelOrModels)
    {

        if(!is_array($modelOrModels))
        {
            $modelOrModels = [$modelOrModels];
        }

        $allFields = [];

        foreach ($modelOrModels as $modelFile)
        {
            if(!class_exists($modelFile))
            {
                continue;
            }

            if($modelFile == "System\Models\File")
            {
                $allFields = array_merge($allFields, $this->fileProperties);
                continue;
            }

            $model      = new $modelFile();
            $modelTable = $model->getTable();
            if(empty($modelTable))
            {
                continue;
            }

            //$fields   = Schema::getColumnListing($model->table);
            $fields     = DB::connection()->getSchemaBuilder()->getColumnListing($modelTable);

            foreach ($fields as $f)
            {
                $allFields[] = $modelTable.'.'.$f;
            }
        }

        return $allFields;
    }

    public function modelRelations($model)
    {
        $returnValues = [];

        if(!is_object($model))
        {
            if(!class_exists($model))
            {
                throw new ApplicationException("Model not found");
            }
        }

        $model = is_object($model) ? $model : new $model;

        foreach ($this->relationTypes as $type=>$relationType)
        {
            if(!empty($model->$type))
            {
                foreach ($model->$type as $propName=>$modelNamespace)
                {
                    if(is_array($modelNamespace))
                    {
                        $modelNamespace['fields']       = $this->modelFields($modelNamespace[0]);
                        $returnValues[$type][$propName] = $modelNamespace;
                    }
                    else
                    {
                        $returnValues[$type][$propName][0]              = $modelNamespace;
                        $returnValues[$type][$propName]['fields']       = $this->modelFields($modelNamespace);
                    }

                }
            }
        }

        return $returnValues;
    }

    public function getModelJsonable($model)
    {
        if(!is_object($model))
        {
            if(!class_exists($model))
            {
                throw new \Exception("Model not found");
            }
        }

        $model = is_object($model) ? $model : new $model;

        try
        {
            return $model->getJsonable();
        }
        catch (\Exception $e)
        {
            return [];
        }
    }

    public function getKeyName($model)
    {
        if(!is_object($model))
        {
            if(!class_exists($model))
            {
                throw new \Exception("Model not found");
            }
        }

        $model = is_object($model) ? $model : new $model;

        $primary = $model->getKeyName();

        if(!$model->getAttribute($primary))
        {
            $primary = "id";
        }

        return $primary;
    }
}