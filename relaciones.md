### relaciones en laravel
# One to One
Usuario -> Perfil
```php
    //User
    public function posts()
    {
        return $this->hasMany(Post::class); //un usuario tiene muchos posts
         //return $this->hasMany(Post::class, 'user_id'); //un usuario tiene muchos posts
    }

     // un post pertece a un usuario
    //Post
    public function user()
    {
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

     public function user()
    {
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

```

# One To Many
Usuario  multiples Posts
```php

```

# Belongs To
Usuario <-- Post
```php

```

# Has One of Many
mostrar el ultimo registro
Usuario ->Ordenes
```php

```
# Has One Thought
doctor varios --> Pacientes --> Habitacion
              --> Pacientes --> Habitacion
```php

```
# Has Many Through
Evento --> lugar -->Asistente
Evento -->       -->Asistente



# para usar fechas 

```php 
{{ $post->created_at->diffForHumans() }}
```


# como restringir cierta rutas nomas
```php
class PostController extends Controller
{
    //
    public function __construct()
    {
        // si no esta logueado no puede acceder a la pagina excepto a index y show
        $this->middleware('auth')->except(['index','show']);
    }
}

```