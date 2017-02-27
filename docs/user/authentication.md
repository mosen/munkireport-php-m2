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

To configure Active Directory authentication:

1. Set the `AUTH_DRIVER` in `.env` to read `AUTH_DRIVER=adldap`.
2. Add the hostname(s) of your domain controller(s) to `ADLDAP_CONTROLLERS`, separated by a comma.
3. Set the base DN which is usually in the form of **DC=your,DC=domain,DC=com** in `ADLDAP_BASEDN`.
4. If you don't want your users to type the domain in either the short form `DOMAIN\user` or the long form 
   `user@domain.net`, you have to add a prefix or suffix in `ADLDAP_ACCOUNT_PREFIX` or `ADLDAP_ACCOUNT_SUFFIX`.
   Eg. the prefix might be `DOMAIN` and the suffix might be `domain.net`.
5. Create an account in your AD domain that can be used for lookups.
6. Set the credentials of that account in the `ADLDAP_ADMIN_USERNAME` and `ADLDAP_ADMIN_PASSWORD` env variables.

