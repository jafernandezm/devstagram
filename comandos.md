#### Comandos usados hasta ahora
capitlos
video 16 --- capitulo 13
```bash

sail artisan make:model Post

sail artisan make:migration create_posts_table

tambien se puede
sail artisan make:model --migration --controller --factory Post

sail artisan migrate

- para volver hastas una migracion 
sail artisan migrate:rollback --step=1


Comentarios
sail artisan make:model --migration --controller Comentario

policy
sail artisan make:policy PostPolicy --model=Post

Like
sail artisan make:model --migration --controller Like
sail php artisan migrate

Perfil Controller 
sail artisan make:controller PerfilController
```
Borrar el contenido 
```bash
sail artisan route:cache
sail artisan route:list
```


```bash
sail artisan make:migration add_imagen_field_to_users_table

Seguir a otros 
sail artisan make:model Follower -mc

sail artisan make:controller HomeController
25/08/23      -> video 26 
sail artisan make:component ListarPost
```


```php
    cualquier pagina
    <x-listar-post>
        <h1>Componente 1</h1>
    </x-listar-post>
    <x-listar-post>

        <x-slot:titulo>
            <header>Esto es el titulo</header>
        </x-slot:titulo>
        <h1>Componente 2</h1>
    </x-listar-post>

    listar-pots
    <div>
        {{$titulo}}
        <h1>{{$slot}}</h1>
    </div>


```

```bash
    sail artisan view:clear
```

#instalar livewire en laravel

