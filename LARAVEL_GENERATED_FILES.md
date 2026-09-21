# Archivos Laravel generados

Los archivos están organizados para copiarse en un proyecto Laravel existente:

- `database/migrations`: migraciones de los cinco módulos.
- `app/Models`: modelos Eloquent correspondientes a las tablas SQL.
- `app/Services`: servicios CRUD reutilizables por módulo.
- `app/Http/Controllers`: controladores API para inmuebles, usuarios, cartera, ingresos, reservas y auditoría.
- `routes/api.php`: rutas API resource.

Las migraciones usan `foreignId()->constrained()` y están orientadas a PostgreSQL/Laravel. Se recomienda revisar autenticación, autorización, Form Requests, seeders de catálogos y políticas antes de usar en producción.
