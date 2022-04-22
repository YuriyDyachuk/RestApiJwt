<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## ABOUT DOCUMENTATION FOR [RestApiJWT]()

---------------------------

##FIRST STEPS
* Uninstall old versions
* Older versions of Docker were called docker, docker.io, or docker-engine. If these are installed, uninstall them:

## Command
    sudo apt-get remove docker docker-engine docker.io containerd runc

## Install Docker Engine
    sudo apt install apt-transport-https ca-certificates curl software-properties-common
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu `lsb_release -cs` test"
    sudo apt update

    sudo apt-get install docker-ce docker-ce-cli containerd.io
    sudo service docker start

## Install Docker Compose
    sudo curl -L https://github.com/docker/compose/releases/download/1.21.2/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
    sudo chmod +x /usr/local/bin/docker-compose
    docker-compose --version

## Command
    cp .env.example .env

##NEXT STEP
These packages are required for the make and composer commands

    sudo apt-get install php7.4-gd
    sudo apt-get install php7.4-curl

##NEXT STEPS
Install make Unix and make commands for Docker

    sudo apt update
    sudo apt install make

- Install Windows
- Download "Complete package, except sources" at (http://gnuwin32.sourceforge.net/downlinks/make.php) this will download:
- execute make-3.81.exe by double clicking on the file
- In the install wizard it will show the install path, which by default is:
- Add the path to the binaries to the windows path variable. This will be the install path + "\bin". I did this from a windows command shell with:
- set PATH=%PATH%;"C:\Program Files (x86)\GnuWin32\bin"
- Confirm addition of path with command:
- echo %PATH%
- make -v

##And next

    make build
    make start

##NEXT STEPS
required project structure for correct composer install command

    mkdir -p storage/framework/{sessions,views,cache/data}

##NEXT STEPS
composer installation

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    HASH="$(wget -q -O - https://composer.github.io/installer.sig)"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    sudo php composer-setup.php --install-dir=/usr/bin --filename=composer
    
    composer --version

##NEXT STEPS
all the needed clear commands

    php artisan cache:clear

    php artisan config:clear
    
    php artisan view:clear
    
    php artisan optimize:clear

##NEXT STEP
permissions and project generation commands

    sudo chmod -R 777 ./

    make artisan-command CMD=key:generate

    make artisan-command CMD=storage:link

    make artisan-command CMD=migrate

    make artisan-command CMD=db:seed

## Generation APP_KEY hash command
    make artisan-command CMD=key:generate

## Clear cache all
    php artisan route:clear
    php artisan config:clear
    php artisan cache:clear

NEXT STEPS - OPENING LOCAL SITES IN BROWSER:

## Command First [default] page project
    https://localhost:3003 - default page
    http://localhost:3002 - RESTAPI Swagger Documentation