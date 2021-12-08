<?php
//classess
use App\Classes\ResponseMessage;

//Models
use App\Models\{
                User,
                Attachment,
                Comment,
                Custom_Mail,
                Mail,
                Notify,
                Signature,
                Todo
              };

  function logError($method,$line,$exception)
  {
      \Log::error($method . '@' . $line . ': ' . $exception->getMessage());
  }
  
  function getInvalidCredentialsResponse()
  {
    return[
            'data'=>[
                'code'    => 400,
                'message' => ResponseMessage::INVALID_CREDENTIAL,
            ],
            'status' => false
          ];
  }


  function getTokenFailureResponse()
  {
    return [
              'data' => [
                  'code'    => 400,
                  'message' => ResponseMessage::INVALID_CREDENTIAL,
              ],
              'status' => false
            ]; 
  }


  function getInvalidTokenResponse()
{
    return [
                'data' => [
                    'code'      => 400,
                    'message'   => ResponseMessage::INVALID_TOKEN,
                ],
                'status' => false
            ];    
}

function getDefaultResponse()
{
    return [
                'data' => [
                    'code'    => 400,
                    'message' => ResponseMessage::SOMETHING_WENT_WRONG,
                    // 'result'  => '',
                    'error'   => '',
                ],
               'status' => false
            ];   
}



?>
