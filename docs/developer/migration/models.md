# Models

Laravel's ORM functionality is called [Eloquent](https://laravel.com/docs/5.4/eloquent). All of the functionality
covered here is explained in the guide.

## Differences between KISS_Model and Eloquent Model.

- KISS_Model includes the Schema AND Database Queries. Eloquent models are purely used to query the database.
- KISS_Model includes methods for creating events: `store_event()` and `delete_event()`. Laravel has a separate events
  system which we will see later.
- KISS_Model sometimes adds methods to execute custom SQL queries. In Eloquent, you would usually use the 
  [Query Builder](https://laravel.com/docs/5.4/queries) to achieve the same functionality.
- Eloquent models can define [relationship methods](https://laravel.com/docs/5.4/eloquent-relationships) 
  which are a way to create a `JOIN` query without writing any SQL.
- Eloquent models can define [scopes](https://laravel.com/docs/5.4/eloquent#query-scopes) 
  which are a way to create presets for `WHERE` clauses.

## Create a model

Create a new class inside your module, usually with the same name as the module eg.

    mr_module/<Modulename>/<Modulename>.php
    
The class should extend `Illuminate\Database\Eloquent\Model`.

## Defining the table

Eloquent assumes that the name of the table will be the plural form of the model, eg. if your model is called
Bluetooth then it will attempt to use `bluetooths`. As we know, this is not the case so we have to adapt the table
name to fit MunkiReport v2.

Add a property on the model like this:

    protected $table = 'bluetooth';
    
## Defining fillable attributes

Eloquent contains a security feature against POSTing variables that were not present in a form for example, see:
[Mass Assignment](https://laravel.com/docs/5.4/eloquent#mass-assignment).
If you try to update many attributes at once, it will consider the `$guarded` or `$fillable` variables to see whether
that is allowed.

Because the MR2 CheckIn always tries to fill almost every column, we have to make every column except `id`,`created_at`,
`updated_at`, and `deleted_at` fillable, otherwise you will generate an error if you try to update everything at once.

For bluetooth, we use all other columns, eg:

    protected $fillable = [
        'serial_number',
        'battery_percent',
        'device_type',
    ];
    
## Defining relationships

You can see the full guide to Eloquent relationships [here](https://laravel.com/docs/5.4/eloquent-relationships).

As a short example let's make it easy to retrieve the `machine` that is associated with our bluetooth row.

I would add this method:

        public function machine() {
            return $this->belongsTo('Mr\Machine', 'serial_number', 'serial_number');
        }
        
This means that we have a **belongsTo** relationship where we join our serial_number field with the same field on the
`Mr\Machine` model.

Then someone would be able to use something like this:

    $machine = Bluetooth::findById(1)->machine();
    
To get the machine associated with that bluetooth entry.

## Shortcut for relationships

I have created a model called `Mr\SerialNumberModel` which automatically contains relationships for **Machine** and
**ReportData** if you have `serial_number` in your model, so you don't have to write this over and over again. Just extend
SerialNumberModel.

## Defining Scopes

You might find it handy to define query scopes for things like reporting stats, so the code seems a little clearer eg.
Instead of adding the `WHERE` clause for bluetooth.battery_percent like:

    ->where('battery_percent', '<', 20)
    
You could add a scope to make this read a bit nicer so that the controller just reads:

    ->low() // automatically gets all entries with battery_percent < 20
    
You can also add scopes that take parameters so instead of `low()` you might have something like:

    ->batteryLessThan(20)
    
Scopes are really just a way of grouping some query options into a single method.

More information on scopes [here](https://laravel.com/docs/5.4/eloquent#query-scopes)


