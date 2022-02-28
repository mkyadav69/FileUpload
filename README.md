
Option 1:PDF Upload Test

Notes :

1. Follow PSR-4
2. Validation, file size limit 2MB & type as pdf

UI

1. CSS
2. JAVASCRIPT
3. Bootstrap Theme (CoolAdmin)

Framework used
1. Laravel 9


Github URL 
https://github.com/mkyadav69/FileUpload

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

        ErrorLog /var/log/apache2/uat.demo.com_error.log
        # Possible values include: debug, info, notice, warn, error, crit,
        # alert, emerg.
        LogLevel warn
        CustomLog /var/log/apache2/uat.demo.com_access.log combined
    </VirtualHost>
    => run below command
    a2ensite uat.chromatographyworld.com.conf
    => server restart
    sudo systemctl start apache2
    sudo service apache2 restart
    sudo service apache2 reload

    Imporatnt File

    1. routes/web.php
    2. app/Http/Controllers/FileController.php
    3. app/Models/FileUpload.php
    4. app/Providers/AppServiceProvider
    5. resources/views/theme/layout/base_layput.blade.php
    6. resources/views/theme/layout/header.blade.php
    7. resources/views/theme/layout/sidebar.blade.php
    8. resources/views/upload/file_upload.blade.php
    9.  public/css/common.css
    10. public/jscustom.js
    11. database/migrations/2022_02_26_081140_create_file_uploads_table

10. No plugin used

11. Uploaded file display in descending order (latest on top)

10. Time taken 7 (Including server setup ).

    I have summerized project details.
    For any query please let me know.
    Thank You












