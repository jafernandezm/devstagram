### relaciones en laravel
One to One
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

One To Many
Usuario  multiples Posts
```php

```

Belongs To
Usuario <-- Post
```php

```

Has One of Many
mostrar el ultimo registro
Usuario ->Ordenes
```php

```
Has One Thought
doctor varios --> Pacientes --> Habitacion
              --> Pacientes --> Habitacion
```php

```
Has Many Through
Evento --> lugar -->Asistente
Evento -->       -->Asistente
