<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
</p>

## Instalação e execução

- Adicione as variáveis de ambiente conforme o arquivo .env.example
    <br>``` cp .env.example .env ```

- Subir o container
<br> ``` docker-compose up -d ```

- Subir o container
<br> ``` docker-compose up -d ```

- Rodar os comandos para instalar o composer e gerar a key
```
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan storage:link
docker-compose exec app php artisan migrate
docker-compose exec app php artisan cache:clear

```

- PDI<br>
``` http://localhost:8000/ ```


DBEAVER 
jdbc:mysql://localhost:3306/pdi?allowPublicKeyRetrieval=true&useSSL=false
