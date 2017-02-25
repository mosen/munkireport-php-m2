# Authentication

There are several authentication providers to suit your environment.

The default method of authentication is the database adapter, which means that
MunkiReport will maintain the list of users and groups that are allowed access.

Supported Providers:

- Eloquent/Database (Built-in)
- Active Directory/LDAP (via [Adldap2-laravel](https://github.com/Adldap2/Adldap2-laravel))

Via [Socialite](https://github.com/laravel/socialite):

*NOTE*: list of all Socialite providers is [here](https://socialiteproviders.github.io)

The most common IDaaS providers:

- Google
- [Okta](https://packagist.org/packages/tequilarapido/socialite-okta)

