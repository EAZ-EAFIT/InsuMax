# Entrega 1 Arquitecturas de Software - S2566
### Esteban Álvarez Zuluaga, Mateo Pineda Álvarez, Daniel Arcila Salazar

---
# Entrega 1 Arquitecturas de Software - S2566
### Esteban Álvarez Zuluaga, Mateo Pineda Álvarez, Daniel Arcila Salazar

---
## Requirements
- Laravel Framework 12.26.1  
- Composer Dependency Manager for PHP  
- XAMPP Control Panel v3.3.0  

## Execution

1. Start the Apache server and the MySQL database in XAMPP Control Panel.  
2. Change the environment variables so that they correspond to your own database authentication and database name:  

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=insumax
DB_USERNAME= YOUR_USERNAME
DB_PASSWORD= YOUR_PASSWORD


```
3. Run ```bash composer install ```
4. Run ```bash php artisan key:generate ```
5. Run ```bash php artisan migrate ``` 
6. Run ```bash php artisan serve```
