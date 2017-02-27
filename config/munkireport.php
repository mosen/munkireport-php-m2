<?php
return [
    
    'curl_cmd' => ["/usr/bin/curl",
    "--fail",
    "--silent",
    "--show-error"],

    'version' => '3.0a1',

    'enable_business_units' => false,

    /**
     * The AD Security Group which will be allowed to login (if AD Auth is enabled)
     */
    'ad_login_group' => env('AD_LOGIN_GROUP', null),
];