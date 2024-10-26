# API REST

## Descripción

Este proyecto es una API REST que maneja clientes e facturas. Utiliza autenticación con Sanctum y proporciona endpoints para gestionar clientes e facturas.

## Uso

### Autenticación

La autenticación se maneja a través de Sanctum. Para obtener un token de acceso, envía una solicitud POST a `/api/login` con tus credenciales.

### Endpoints

#### Clientes

- `GET /api/v1/customers` - Lista todos los clientes.
- `POST /api/v1/customers` - Crea un nuevo cliente.
- `GET /api/v1/customers/{id}` - Muestra un cliente específico.
- `PUT /api/v1/customers/{id}` - Actualiza un cliente.
- `DELETE /api/v1/customers/{id}` - Elimina un cliente.

#### Facturas

- `GET /api/v1/invoices` - Lista todas las facturas.
- `POST /api/v1/invoices` - Crea una nueva factura.
- `GET /api/v1/invoices/{id}` - Muestra una factura específica.
- `PUT /api/v1/invoices/{id}` - Actualiza una factura.
- `DELETE /api/v1/invoices/{id}` - Elimina una factura.
- `POST /api/v1/invoices/bulk` - Crea múltiples facturas en una sola solicitud.

### Filtros

Los filtros de clase se utilizan para validar y filtrar las solicitudes entrantes. Puedes encontrar los filtros en el directorio [`app/Filters`](app/Filters).

### Requests

Las solicitudes se validan utilizando clases de Request personalizadas. Estas clases se encuentran en el directorio [`app/Http/Requests`](app/Http/Requests).

### Resources

Los recursos se utilizan para transformar las respuestas JSON. Puedes encontrar los recursos en el directorio [`app/Http/Resources`](app/Http/Resources).

## Contribuir

Si deseas contribuir a este proyecto, por favor, abre un issue o envía un pull request.

## Licencia

Este proyecto está licenciado bajo la [MIT license](https://opensource.org/licenses/MIT).
