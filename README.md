Notes :

1. Follow PSR-4 Guidlines
2. Url Validation,

UI
1. CSS
2. JAVASCRIPT
3. Bootstrap Theme (CoolAdmin)

Backend Framework
1. Laravel 9
    => Reason to choose laravel becouse its provide packages which you can use in your application.
    You can customize anything you want with the help of cofiguration file & the method provided by package.

Github URL 
https://github.com/mkyadav69/FileUpload
Branch 'url_hashing_stystem'

Project URL (Hosted on Godaddy)
    http://demo.chromatographyworld.com/  
    -Login on GoDaddy
    -Define type A hosting (IPV4)
    -Define value IP address
    -Define Name

Deployment Instructions

1. Install laravel
    composer create-project laravel/laravel file-upload

2. Install Dependencies
    composer install
    
3. Permission to storage & public 
    chmod -R 777 storage/ public/

4. Create .env file
    suod vim .env

5. Update env file information
    DB_DATABASE=file_upload
    DB_USERNAME=root
    DB_PASSWORD=root

6. Clear Cache & Config 
    php artisan config:cache

7. Generate app key
    php artisan generate:key

8. Create database table schema
    php artisan migrate

9. Apache server configuration
    =>Goto cd /etc/apache2/site-available
    =>create conf file file_upload.conf
    =>update the below content in file

    <VirtualHost *:80>
        ServerAdmin webmaster@site
        ServerName uat.demo.com
        #DirectoryIndex index.php

        DocumentRoot  /data/docroot/FileUpload/public/
        <Directory  /data/docroot/FileUpload/public>
                Options Includes FollowSymLinks MultiViews
                AllowOverride All
                #AllowOverride None
                Require all granted
        </Directory>
        #RewriteEngine On
        #RewriteRule ^(.*)$ https://uat.demo.com$1 [R=301,L]

        ErrorLog /var/log/apache2/demo.com_error.log
        # Possible values include: debug, info, notice, warn, error, crit,
        # alert, emerg.
        LogLevel warn
        CustomLog /var/log/apache2/demo.com_access.log combined
    </VirtualHost>
    => run below command
    a2ensite uat.chromatographyworld.com.conf
    => server restart
    sudo systemctl start apache2
    sudo service apache2 restart
    sudo service apache2 reload

    Imporatnt File

    1. routes/web.php
    2. app/Http/Controllers/UrlController.php
    3. resources/views/hash/hash_file.blade.php
    4. database/migrations/2019_12_22_015115_create_short_urls_table.php
                           2019_12_22_015214_create_short_url_visits_table.php
                           2020_02_11_224848_update_short_url_table_for_version_two_zero_zero.php
                           2020_02_12_008432_update_short_url_visits_table_for_version_two_zero_zero.php
                           2020_04_10_224546_update_short_url_table_for_version_three_zero_zero.php


10. Time taken 7 (Including server setup ).
    I have summerized project details.
    For any query please let me know.
    Thank You












