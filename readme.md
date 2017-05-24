# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


## HOW TO INSTALL ##
1. Goto foler application from cmd
   type command :
   - php artisan migrate
   - composer dump-autoload
   - php artisan migrate:refresh --seed
   - php -S localhost:8000 -t public
3. Open Application Api for testing Rest API (ex Postman)
4. Test REST API
	- Login
	  http://localhost:8000/login
	  http://localhost:8000/logout	

	- User
	  http://localhost:8000/user/1
	  http://localhost:8000/user/save
	  http://localhost:8000/user/delete/1
	  http://localhost:8000/user/update/1

	- School
	  http://localhost:8000/school/1
	  http://localhost:8000/school/save
	  http://localhost:8000/school/delete/1
	  http://localhost:8000/school/update/1

	- Student
	  http://localhost:8000/student/1
	  http://localhost:8000/student/save
	  http://localhost:8000/student/delete/1
	  http://localhost:8000/student/update/1

	- Payment
	  http://localhost:8000/student/create
	  http://localhost:8000/student/pay/1
	  http://localhost:8000/student/info/1
	  http://localhost:8000/student/delete/1
