# Migrating modules from MunkiReport v2

This document provides a high level overview of the steps you should take when migrating a module from MunkiReport v2
to MunkiReport v3.

Knowledge of [Laravel](https://laravel.com) and [VueJS](https://vuejs.org) is Ideal but I'll be linking to all the 
relevant documentation sections when we hit a point of interest.

## Create the basic structure

All modules (except core modules like the check-in code) are located in the `mr_module` directory.
You need to create the following directory structure to start:

    mr_module/<Module name>  -- Module name does not have to be lowercase as with MR2
      assets/
        js/
          components/
      migrations/
      scripts/
      views/
      

## Procedure

- database-migrations.md
- models.md
- service-provider.md





