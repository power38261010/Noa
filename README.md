<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/witaut/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Acerca del proyecto

Para poder "buildear" el repositorio es necesario Dokcer, por lo que si no lo tienes instalado ejecutar los siguientes comandos en el siguiente ordem:

1-
sudo apt update

2-
sudo apt install apt-transport-https ca-certificates curl software-properties-common

3-
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"

4-
sudo apt update

5-
sudo apt install docker-ce

Por ultimo verificamos  la version

sudo docker --version

Y su estado

sudo systemctl status docker

Ahora instalamos Docker Compose

6-
sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose

7-
sudo chmod +x /usr/local/bin/docker-compose

Por ultimo verificamos la isntalacion

docker-compose --version


Luego de ello nos dirigimos al repositorio en github "https://github.com/power38261010/Noa/tree/witaut"


Elegir la rama "witaut"

Clonarse el repositorio via: https://github.com/power38261010/Noa.git

Luego de elegir una carpeta ejecutar

git checkout witaut

Luego reemplazar el nombre del archivo ".env.example" por el nombre ".env" 

A continuacion en la consola  (estando en la raiz) ejecutamos:

npm install

Luego

npm run build

Por Ultimo
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs

Luego ejecutamos ( en caso de no existir BD y registros)

./vendor/bin/sail up

Desde otra pestaña de la consola ejecutar en el siguiente orden:

1-
./vendor/bin/sail artisan migrate 

2-
./vendor/bin/sail artisan db:seed --class=ProductoServicioTableSeeder

Luego de ello ya puede ingresar a un navegador desde la "url" "http://0.0.0.0/"
Al momento de ser redireccionados al "login" optar por la opcion "Registrarse", luego de registrarse se puede usar el SPA
