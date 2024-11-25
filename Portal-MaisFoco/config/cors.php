<?php

return [

    'paths' => ['api/*', '*', 'notification-users', 'notices', 'notifications'], 

    'allowed_origins' => ['http://localhost:3000'],

    'exposed_headers' => [],    

    'max_age' => 0,           

    'supports_credentials' => true, 

    'allowed_origins_patterns' => [], 

    'allowed_methods' => ['GET', 'POST', 'PATCH', 'DELETE', 'OPTIONS'], 

    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization', 'Accept', 'X-CSRF-TOKEN', 'Origin'], 

    'api' => [
        'enabled' => true,
        'methods' => ['GET', 'POST', 'PATCH', 'DELETE'],  
        'origins' => ['*'], 
        
    ],
];
