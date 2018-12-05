##EMAN API

###requirements
- composer
- docker
- docker-compose

###steps to run

- ```git clone https://github.com/chazzbg/e-man-api```

- ```cd e-man-api```

- ```composer install```

- ```docker-compose -p eman up```

- ```docker exec -it eman_php_1 /usr/local/bin/php /code/artisan db:create```


now app should be available at http://localhost:8080

to run queue job listener, run 

- ```docker exec -it eman_php_1 /usr/local/bin/php /code/artisan queue:listen``` 


### demo
the file **demo.http** contains few requests in the format of PHPStorm Http client (https://www.jetbrains.com/help/phpstorm/http-client-in-product-code-editor.html)
