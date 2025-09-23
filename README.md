# Entrega 1 Arquitecturas de Software - S2566
### Esteban Álvarez Zuluaga, Mateo Pineda Álvarez, Daniel Arcila Salazar

---
## Requisitos
- Laravel Framework 12.26.1
- Composer Dependency Manager for PHP
- XAMPP Control Panel v3.3.0



## Ejecución

1. Iniciar el servidor Apache y la base de datos mySQL en XAMPP Control Panel
2. Cambiar las variables de entorno para que correspondan a la autenticación propia de base de datos y nombre de la base de datos
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=insumax
DB_USERNAME= USUARIO_PROPIO
DB_PASSWORD=  CONTRASEÑA_PROPIA

```
3. Ejecutar ```bash php artisan key:generate ``` 
4. Ejecutar ```bash php artisan migrate ``` 
5. Ejecutar ```bash php artisan serve```
