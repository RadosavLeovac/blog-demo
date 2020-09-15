<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel / Vue.js / Axios / Tailwind / Toastr
Simple, one page, blogging template!

Clicking on New Post button modal is opened.
In opened modal we can input the title and the body of our post and publish it, or cancel and close the modal.
After publishing modal is closed and success toastr notification is displayed and auto closed in 6 seconds.
After post submit the new post is displayed on the main page without page reload.
Each post can be deleted and after delete operation delete toastr message is displayed.
Posts on the main page are paginated to 8 per page. 

Live demo <a href="http://165.232.78.217/" target="_blank">HERE</a>

Installation guide:
<ul>
    <li>Download or clone</li>
    <li>composer update</li>
    <li>create database, edit and rename .env.example to .env</li>
    <li>php artisan migrate</li>
    <li>php artisan db:seed</li>
    <li>npm install</li>
</ul>

Laravel v8
- Views in resources/views/
- Vue.js component in resources/js/components
- routes in route/api.php file / take note in laravel 8 default routing is changed Route::get('/posts' ,[App\Http\Controllers\PostController::class, 'index'] ); - read more in laravel 8 upgrade documentation.
