MunkiReport v3 Modules
======================

This document outlines the module structure.

Each module is part of the `MrModule` namespace. Only core parts of the application are part of the `Mr` namespace.

Each module exists as a [Laravel package](https://laravel.com/docs/5.4/packages) inside the `mr_module` directory.

The directory structure looks something like this, but may not include everything listed here:

    mr_module/Modulename
        assets - Frontend assets
            js - Javascript
              components - VueJS components
            scss - SASS stylesheets
            images
           
        config/*.php - Published configuration file
        migrations/*.php - Laravel migrations
        
        Events/*.php - Events fired by this module
        
        Providers
             ModulenameServiceProvider.php - Service Provider, the main extension point.
          
        Modulemodel.php - Eloquent model
        FakeModulenameSeeder.php - Optional fake data seeder for testing rows of fake data.
        CheckInHandler.php - The check in handler which processes reports sent from the client.
        routes.php - Routes for this module.
        README.md
        
*See also:* [Laravel Service Providers](https://laravel.com/docs/5.4/providers) for more information on how Service 
Providers work.

