<?php

return [
    /*
     * This is the tenant connection that will be used by
     * models that are tenant-aware. Make sure to configure
     * it in `config/database.php`.
     */
    'tenant_database_connection_name' => 'tenant',

    /*
     * This is the landlord connection that will be used by
     * models that need to work outside of a tenant context.
     * Make sure to configure it in `config/database.php`.
     */
    'landlord_database_connection_name' => 'landlord',

    /*
     * The hostname of the default tenant. This hostname will be used
     * if no hostname is provided by the incoming request.
     */
    'default_tenant_hostname' => null,

    /*
     * This class is responsible for determining the current tenant.
     * Out of the box we'll resolve it using the current hostname.
     */
    'current_tenant_resolver' => Spatie\Multitenancy\Tenant\Resolvers\HostnameTenantResolver::class,

    'connections' => [
        'company1' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_COMPANY1', '127.0.0.1'),
            'port' => env('DB_PORT_COMPANY1', '3306'),
            'database' => env('DB_DATABASE_COMPANY1', 'forge'),
            'username' => env('DB_USERNAME_COMPANY1', 'forge'),
            'password' => env('DB_PASSWORD_COMPANY1', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
        'company2' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_COMPANY2', '127.0.0.1'),
            'port' => env('DB_PORT_COMPANY2', '3306'),
            'database' => env('DB_DATABASE_COMPANY2', 'forge'),
            'username' => env('DB_USERNAME_COMPANY2', 'forge'),
            'password' => env('DB_PASSWORD_COMPANY2', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ],
];
