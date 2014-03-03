# In2it Demo Application

This is a demo [Zend Framework](http://framework.zend.com) application used soley for educational and training purposes. If interested in our [training courses](http://www.in2it.be/php-consulting/php-training-courses), visit our web site for more details.

## Installation

The installation of this demo is straightforward:

### 1. Clone this project from GitHub

First you need to clone this project from GitHub. Ensure you use the `--recursive` parameter so it includes our own libray components used within this demo application.

    $ git clone --recursive https://github.com/in2it/zfdemo.git

### 2. Use composer for other libraries

We've set up [Composer](http://getcomposer.org) to retrieve Zend Framework source code and our generator tool [Faker](https://github.com/fzaninotto/Faker).

If you don't have composer yourself, you can fetch it easily yourself.

**Using cURL**:

    $ curl -sS https://getcomposer.org/installer | php

**Using PHP**:

    php -r "readfile('https://getcomposer.org/installer');" | php

Getting the libraries:

    $ php composer.phar install

This will install the remaining libraries used in this project.

**NOTE:** Since both Zend Framework and In2it's library are in `vendor/` directory, we need to set a symlink to the correct paths:

    $ cd /path/to/zfdemo
    $ cd library
    $ ln -s ../In2it/library/In2it In2it
    $ ln -s ../zendframework/zendframework1/library/Zend Zend

### 3. Set up a virtual host

If you're using PHP 5.4 or higher, you can simple use the build-in PHP server

    $ cd /path/to/zfdemo
    $ APPLICATION_ENV=development php -S 0.0.0.0:1234 -t public public/index.php

If you're using PHP 5.3 or lower, best would be to set up a virtual host for your web server.

Something like the following should be sufficient for [Apache](http://httpd.apache.org).

    <VirtualHost *:80>
       DocumentRoot "/srv/www/zfdemo/public"
       ServerName demo.local
    
       # This should be omitted in the production environment
       SetEnv APPLICATION_ENV development
    
       <Directory "/srv/www/zfdemo/public">
           Options Indexes MultiViews FollowSymLinks
           AllowOverride All
           Order allow,deny
           Allow from all
       </Directory>
    
    </VirtualHost>

### 4. File Permissions

In directory `application/data/` we store our local SQLite database `demo.db`. If you want to have your web server being able to write to this, you need to modify the directory and the file to the group of your web browser.

Example: your web server's group is www-data, than you need to adjust the directory to the following:

    $ cd /path/to/zfdemo
    $ sudo chgrp -R www-data application/data

## Implemented modules

For the example of this application we have created two modules "product" and "user", where the first takes care of all product related things, and the latter handles users.

## Copyright and warranties

[In2it](http://www.in2it.be) provides this code "as-is" and provides no warranties. **THIS IS NOT PRODUCTION CODE!!!**.

This work is licensed under a [Creative Commons Attribution-ShareAlike 4.0 International License](http://creativecommons.org/licenses/by-sa/4.0/).