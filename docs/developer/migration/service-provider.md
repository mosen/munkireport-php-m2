# Service Provider

Every "Package" in Laravel needs to have a Service Provider class.
This class is used to inform Laravel of the objects that your module provides. It's what glues all the parts together!

You can read more about the [Service Container](https://laravel.com/docs/5.4/container) and 
[Service Providers](https://laravel.com/docs/5.4/providers).

## Create a Service Provider

Inside your module directory create a Service Provider class that extends `Illuminate\Support\ServiceProvider`.

Eg. in `mr_module/<Modulename>/<Modulename>ServiceProvider.php`.

Each service provider typically uses two methods, `boot()` and `register()`.
In most cases we will only use `boot()` as we are not registering anything with the Service Container.

## Register your migrations

Laravel won't know to use our migrations unless we tell it. In the boot method you want something like this:

    $this->loadMigrationsFrom(__DIR__.'/migrations');
    
## Register your views

The same goes for view templates:

    $this->loadViewsFrom(__DIR__.'/views', 'bluetooth');
    
The second parameter is a namespace. It prevents a name clash from happening if there is another module with views with
the same name.

The namespace should be your module name.

## Register your controllers/routes

This is where you specify which URLs will be dedicated to your module.

I would like to keep all the API routes under `/xapi/` and all of the module routes under `/x/` so that they don't
interfere with the core application.

