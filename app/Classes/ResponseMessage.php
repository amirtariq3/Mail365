<?php
namespace App\Classes;

class ResponseMessage
{
    const REQIEST_SUCCESSFUL     = 'Request Successful.';
    const INVALID_TOKEN          = 'Please log-in again. The session has expire';
    const SOMETHING_WENT_WRONG   = 'Something went wrong. Please try again later!';
    const INVALID_CREDENTIONAL   = 'Incorect Email or Password.';
    const TOKEN_FAILURE          = 'Fail to create token';
    const INVALID_USER           = 'Not a valid user.';
}



?>