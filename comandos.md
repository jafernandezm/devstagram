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
```