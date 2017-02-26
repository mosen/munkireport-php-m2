MunkiReport v3 Modules
======================

This document outlines the module structure.

Each module is part of the `MrModule` namespace. Only core parts of the application are part of the `Mr` namespace.

Each module exists as a [Laravel package](https://laravel.com/docs/5.4/packages) inside the `mr_module` directory.
Although normally those packages would be registered separately in packagist/composer, they are part of the main project.

The directory structure looks something like this, but may not include everything listed here:

    mr_module/Modulename
        assets - Frontend assets
            js - Javascript
              listing.js - Entry point for listing
              widgets.js - Global registration of all widgets
              
              components - VueJS components
                ModulenameTable.vue - Listing table component
                ModulenameTable.i18n.json - Listing table i18n
                SomethingWidget.vue - A widget component
                
            scss - SASS stylesheets
            images
           
        config/*.php - Published configuration file
        migrations/*.php - Laravel migrations
        
        Events/*.php - Events fired by this module
        

        ModulenameServiceProvider.php - Service Provider, the main extension point.  
        Modulemodel.php - Eloquent model
        FakeModulenameSeeder.php - Optional fake data seeder for testing rows of fake data.
        CheckInHandler.php - The check in handler which processes reports sent from the client.
        routes.php - Routes for this module.
        README.md
        
*See also:* [Laravel Service Providers](https://laravel.com/docs/5.4/providers) for more information on how Service 
Providers work.

Migrations
----------

To load migrations from your module you must use the `loadMigrationsFrom()` method in the Service Provider's `boot()`
method eg:

    $this->loadMigrationsFrom(__DIR__.'/../migrations');
    
Usually i use `artisan make:migration <tablename>` to generate a migration in `app/database/migrations` and move it
into the appropriate module directory.

Faker Factory and Seeds
-----------------------

It can be helpful to have demo data for testing.

I have created a Factory class in `/database/factories` for every available class.
For each faker factory there is also a seeder class which inserts these fake records.

Add your seeder to `FakeSeeder.php` so that your fake data is seeded with the rest.

You can seed fake data using the artisan command:

    $ php artisan db:seed --class=FakeSeeder
    
Note that the intention of having a Faker class for your model is to use it within unit tests.

Routes
------

API / JSON based routes must be registered with the `xapi` prefix to distinguish module API's from core API's.
Normally rendered pages eg. with blade templates should use the `x` prefix.

In your service provider you should add two methods for registering routes `mapApiRoutes()` and `mapWebRoutes()` eg:

        // Required to resolve controllers
        protected $namespace = 'MrModule\Modulename';

        protected function mapApiRoutes()
        {
            Route::group([
                'prefix' => 'xapi',
                'middleware' => 'api',
                'namespace' => $this->namespace
            ], function () {
                Route::resource('ard', 'ARDController');
            });
        }
        
        protected function mapWebRoutes()
        {
            Route::group([
                'prefix' => 'x',
                'middleware' => 'web',
                'namespace' => $this->namespace
            ], function () {
                Route::get('ards', 'ARDController@listing');
            });
        }

For simplicity, routes are added in the service provider, but you can create a separate `routes.php` if you feel like
the service provider is getting too large to manage.

Aggregate information such as the type used for widgets like counts usually comes under the `/xapi/stats/<modulename>`
prefix.

Scripts
-------

Install and Uninstall scripts are defined using the `ModuleManager` instance available in the service container.
If you type hint it within the `boot()` method you can add your module install and uninstall scripts.

I18n
----

All of the i18n is performed client side using [vue-i18n](https://kazupon.github.io/vue-i18n/).

This means that you can usually translate strings within VueJS components by calling the `$t()` function to look up
the string from the current locale.

At the moment locales are only located within the core app.

Ajax
----

The client side ajax library is [Axios](https://github.com/mzabriskie/axios) along with 
[vue-axios](https://github.com/imcvampire/vue-axios) to make **axios** available as a property on each VueJS component.

Widgets
-------

Widgets are [VueJS](https://vuejs.org) components.

Specifically they are files with the **.vue** extension which are 
[Single File Components](https://vuejs.org/v2/guide/single-file-components.html)

When you are writing components, you would normally compose them by importing dependencies and then specifying that
inside your `components` property as described in [Components](https://vuejs.org/v2/guide/components.html).

We don't want to create a dependency between the main application and each module. Our app shouldn't know about modules
until runtime, so there's a slightly different procedure.

We still use single file components, but in addition, we can use `Vue.component()` to register them into the 
**GLOBAL** scope. You can see how this is performed by looking at the `widget.js` file in each module.

More information about the `.vue` component format can be found in the vue-loader docs
[Vue Component Spec](http://vue-loader.vuejs.org/en/start/spec.html)

### Fetching data ###

Use the axios instance available at `this.axios` to perform ajax requests.

### Error handling ###

Two properties are defined on widgets to store state information about errors that happened during the data fetch
process:

- `error`: true or false
- `errorDetails`: contains a message property which explains the last transport error.
    also contains a status property with the HTTP status code.
 

