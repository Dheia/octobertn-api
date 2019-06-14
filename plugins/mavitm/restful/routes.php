<?php
### EXAMPLE 
/*
Route::group(['prefix' => 'api'], function () {
    Route::post('{apiid}/{userid}/{clientid}', function ($apiid, $userid, $clientid){
        try
        {
            return (new Mavitm\Restful\Classes\Restful)->runApi($apiid, $userid, $clientid);
        }
        catch (\Exception $e)
        {
            return (new Mavitm\Restful\Classes\Restful)->failResponse(['msg'=>$e->getMessage(), 'code'=>400],400);
        }
    });
});
*/