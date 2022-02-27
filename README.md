
Option 1:PDF Upload Test

Notes :

1. Follow PSR-4
2. Validation, file size limitation & file type as pdf

UI

1. CSS
2. JAVASCRIPT
3. Bootstrap Theme (CoolAdmin)

Framework used
1. Laravel 9


Github URL 
https://github.com/mkyadav69/FileUpload

Project URL (Hosted on Go daddy)
http://uat.demo.com/  




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

    File Needs be refer
    1. web.php
    2. FileController.php
    3. FileUpload.php
    4. AppServiceProvider
    5. base_layput.blade.php
    6. header.blade.php
    7. sidebar.blade.php
    8. file_upload.blade.php
    9. common.css
    10. custom.js
    11. In migration folder reref table schema

10. Time taken 1 day.

I have summerized project details.
For any query please let me know.
Thank You












