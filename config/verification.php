<?php
return [
   /*
    |--------------------------------------------------------------------------
    | Disable User registration
    |--------------------------------------------------------------------------
    |
    | Disables registration of new users
    |
    */
    'disable_signup' => env('APP_DISABLE_SIGNUP', false),
   /*
    |--------------------------------------------------------------------------
    | Activate double optin on signup
    |--------------------------------------------------------------------------
    |
    | Activates double optin on signup
    |
    */
    'signup_double_optin' => env('APP_SIGNUP_DOUBLE_OPTIN', false),
    /*
    |--------------------------------------------------------------------------
    | New User Email Notification
    |--------------------------------------------------------------------------
    |
    | Email to notify when new user registers.
    |
    */
    'email_new_user_notification' => env('APP_EMAIL_NEW_USERS_NOTIFICATION'),
    /*
    |--------------------------------------------------------------------------
    | Maximum allowed size for uploaded files, in kilobytes.
    |--------------------------------------------------------------------------
    |
    | This value determines the maximum size when uploading a file, in kilobytes.
    |
     */
    'max_upload_size' => env('DEFAULT_MAX_UPLOAD_SIZE', 10240),
    /*
    |--------------------------------------------------------------------------
    | Maximum allowed storage size per account, in megabytes.
    |--------------------------------------------------------------------------
    |
    | This the default limit for each new account. Default value: 512Mb.
    |
     */
    'max_storage_size' => env('DEFAULT_MAX_STORAGE_SIZE', 512),
];