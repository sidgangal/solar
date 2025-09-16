# Solar Project

## Database configuration

This application expects the following environment variables to be defined before any of the PHP scripts are executed:

- `DB_HOST` – database host name or IP address.
- `DB_USERNAME` – database user.
- `DB_PASSWORD` – database password.
- `DB_NAME` – database schema to connect to.

Example shell configuration:

```bash
export DB_HOST=localhost
export DB_USERNAME=solar_user
export DB_PASSWORD=change_me
export DB_NAME=solar
```

The PHP scripts include `config.php`, which reads these variables and establishes a connection by calling `create_db_connection()`.
