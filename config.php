<?php
/**
 * Shared database configuration for the Solar project.
 *
 * Connection settings are read from environment variables to avoid storing
 * credentials in source control.  The following variables must be defined:
 *   - DB_HOST
 *   - DB_USERNAME
 *   - DB_PASSWORD
 *   - DB_NAME
 */

function get_required_env($name)
{
    $value = getenv($name);
    if ($value === false) {
        throw new RuntimeException("Environment variable {$name} is not set.");
    }

    return $value;
}

function create_db_connection()
{
    $host = get_required_env('DB_HOST');
    $username = get_required_env('DB_USERNAME');
    $password = get_required_env('DB_PASSWORD');
    $database = get_required_env('DB_NAME');

    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_error) {
        throw new RuntimeException('Connection failed: ' . $connection->connect_error);
    }

    return $connection;
}
