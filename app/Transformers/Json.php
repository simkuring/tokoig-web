<?php

namespace App\Transformers;


/**
*  Class Json is transformers from raw data to json view
*/
class Json
{
    public static function response($data = null, $message = null, $status = true, $additional=null)
    {   
        if ($message==null) {
            $message = __('message.success');
        }
        if ($data==null) {
            $data = [];
        }
        $result['meta']['status'] = $status;
        $result['meta']['message'] = $message;
        $result['meta']['code'] = 200;
        if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            
            // $result = $data;
            $result = collect($result);
            $result = $result->merge($data);
        } else {
            $result['data'] = $data;
        }
        
        if ($additional!=null) {
            foreach ($additional as $add) {
                $result['meta'][$add['name']] = $add['data'];
            }
        }
        // $result['code'] = 200;
        $code = 200;
        return response()->json($result, $code);
    }

    public static function exception($message = null,$error = null, $status = false, $code=400)
    {   
        if ($message==null) {
            $message = __('message.error');
        }
        $result['data'] = [];
        $result['meta']['status'] = $status;
        $result['meta']['message'] = $message;
        $result['meta']['code'] = $code;
        if ($error instanceof \ErrorException) {    
            $result['error']['message'] = $error->getMessage();
            $result['error']['file'] = $error->getFile();
            $result['error']['line'] = $error->getLine();
        } else {
           $result['error'] = $error; 
        }
        return response()->json($result, 200);
    }
    
}


