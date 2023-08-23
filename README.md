
## -------Inicios--------
# luego de eso configuramos el comando
```bash
sudo nano ~/.bashrc
```
## copiamos esto en la parte final
```bash
alias sail="./vendor/bin/sail"
```
luego cambiar cambios
```bash
source ~/.bashrc
```
para migrar es php 
```bash
sail php artisan migrate 
sail npm install
sail mysql
sail up
sail down
```
------comandos----------------------------------
Instalar tailwindccss
bibliografia : https://tailwindcss.com/docs/guides/laravel#vite
```bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

sail mysql
-----Comando para mysql-----
```bash
sail mysql
```
```s
show databases;
use desvtagram;
show tables;
describe users;
```

-----------------------------------------------------------
## ------------comandos de composer laravel-------------------
```bash
sail artisan make:controller RegistrerController
sail artisan make:controller Auth\\RegistrerController
crear tabla
sail php artisan make:migration add_username_to_users_table
crear un modelo
sail php artisan make:model Cliente

sail php artisan migrate:rollback --step=1
```
## -------------------------------------------------------
para hacer las validaciones en espanol lo que hacemos es descargar una repositorio
https://github.com/MarcoGomesr/laravel-validation-en-espanol
luego vamos a config
'locale' => 'en', a
'locale' => 'es',
cambiamos 
------------------------------------------
-------------migraciones---------------------
comandos

```bash
sail php artisan migrate 
volver atras
sail artisan migrate:rollback
volver 5 anteriores
sail artisan migrate:roolback --step=5
volver a migrar todo 
sail php artisan migrate:fresh --seed
sail artisan make:migration agregar_imagen_user

sail php artisan make:controller LogoutController
```

--------------------------------
--------------------------------
para conectar nuestra base de datos a docker y revisar
tenemos esn en la carpeta de docker-composer.yml
- '${FORWARD_DB_PORT:-3306}:3306'
y en nuestro .env copiamos esto
FORWARD_DB_PORT=3007 entonces trabajaremos con el puertyo 
php artisan config:cache
-------------------------------

docker run --name mysql-server -e MYSQL_ROOT_HOST=% -e MYSQL_ROOT_PASSWORD=12345 -p 3306:3306 -d mysql/mysql-server



## Comandos de npm requisitos
Crear Dropzone https://docs.dropzone.dev/getting-started/installation/npm-or-yarn
```bash
sail npm install --save dropzone
sail artisan make:controller ImagenController
```



## Para redimensionar imagenes en laravel es 

https://image.intervention.io/v2/introduction/installation

```bash
sail composer require intervention/image
```
lo instalamos en laravel de la forma de ir a config app.php

config/app.php
```php
$providers[
Intervention\Image\ImageServiceProvider::class
]
$aliases [
'Image' => Intervention\Image\Facades\Image::class
]
```






capitlos
video 23 --- capitulo 2



















