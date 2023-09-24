<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' =>[
        'client_id' => '551099233785412',
        'client_secret' => 'e50a22881787f384b7f37d03c8d068a1',
        'redirect' => 'http://nhiduongcosmetic.com/My_Project_NL/admin/callback'
    ],

    'google' =>[
        'client_id' => '335097500661-de6rn692cuq8kvbnsrde6ri4llrral4e.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://nhiduongcosmetic.com/My_Project_NL/google/callback'
    ],
];
