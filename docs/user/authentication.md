# Authentication

There are several authentication providers to suit your environment.

The default method of authentication is the database adapter, which means that
MunkiReport will maintain the list of users and groups that are allowed access.

Supported Providers:

- Eloquent/Database (Built-in)
- Active Directory/LDAP (via [Adldap2-laravel](https://github.com/Adldap2/Adldap2-laravel))
- Many many 3rd party sites via [Socialite](https://github.com/laravel/socialite).
  *Not included in distribution*
  
## Local Users and Groups

This is the default method of authentication so you won't need to add any special
configuration. You are responsible for adding users and groups to MunkiReport.

## Active Directory

AD configuration options are listed in `.env.example` which you can add to your `.env`
file. You can see descriptions of the configuration options within the `config/adldap.php` file.

