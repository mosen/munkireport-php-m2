# Database Migrations

Laravel provides its own system for updating the database schema, as described [here](https://laravel.com/docs/5.4/migrations).

To convert a MunkiReport v2 migration to a Laravel one, let's take a look at an example schema in the **bluetooth** module.
[bluetooth_model.php on GitHub](https://github.com/munkireport/munkireport-php/blob/master/app/modules/bluetooth/bluetooth_model.php#L8)

First we need a new migration file.

## Create a new migration

To begin a new migration file I recommend using the command line tool included with Laravel: artisan.
You can also do this manually.

**With artisan:**

    $ php artisan make:migration name_of_table
    
Will generate a new migration in the main app directory which you can move.
Move the file `database/migrations/XXXXXXXXX_name_of_table.php` to your module directory under `migrations`.

**Manually:**

Create a PHP file in your module `migrations` directory with the following name format:

    YYYY_MM_DD_HHMMNN_table_name.php
    
Where YYYY = Year, MM = Month, DD = Day, HH/MM = Hours/Minutes and NN is just a number starting from 00.

## Write the migration

The contents should be a class that extends `Illuminate\Database\Migrations\Migration`.

There are two methods in the class, one for upgrading one for downgrading, which are `public function up()` and
`public function down()` respectively.

`up()` most of the time will include a single `Schema::create()` function like this:

    Schema::create('bluetooth', function (Blueprint $table) {
        // Specify the structure of the table here
    });
    
Let's take another look at `bluetooth_model.php` and convert it line by line.

    parent::__construct('id', 'bluetooth'); //primary key, tablename
    
We already specified the table name in Schema::create. To add a primary key called `id` that auto increments we just
need:

    $table->increments('id');
    
Next

    $this->rs['id'] = 0;
    
MunkiReport2 deals with "default values" very differently. Basically when you create a model like `bluetooth_model` in
MunkiReport2 it comes with a set of values already set. This is not the case with Laravel. We CAN however instruct the
database to have a default value if none was set on the model. This is a totally different behaviour but it is worth
keeping in mind.

    $this->rs['serial_number'] = $serial;
    
We know that we need a new column called `serial_number`, but the type of that column isn't specified here.
In MunkiReport2 the KISS MVC framework tries to work out what the column type would be 
[here](https://github.com/munkireport/munkireport-php/blob/master/system/kissmvc.php#L422).

It does this by just looking at the PHP Type and making an assumption based on that.
Unfortunately with Laravel you have to be more specific.

In this instance I know that `serial_number` is a string so I add:

    $table->string('serial_number')->unique();
    
The `->unique()` method creates a UNIQUE constraint meaning that there can only be one row with that serial number.

    $this->rs['battery_percent'] = -1; //-1 means unknown
    
Ok battery_percent looks like a number and we know that it should be **-1** by default so:

    $table->integer('battery_percent')->default(-1);
    
Next

    $this->rs['device_type'] = ''; // status, kb, mouse, trackpad
    
device_type has to be an empty string, so I would use this:

    $table->string('device_type');
    
You might also use:

    $table->string('device_type')->nullable();
    
If you think that a client might report back with nothing in that field. That way you won't see a NOT NULL constraint
violation in your logs when you try to save a bluetooth model with nothing in device_type.

    $this->schema_version = 2;
    
We don't care about the MR2 schema version so this is left out.

    // Add indexes
    $this->idx[] = array('serial_number');
    $this->idx[] = array('device_type');
    
It's not necessary to create an INDEX on everything unless you feel like your queries are too slow. This is a pretty
big topic so I'll just use a rule of thumb: If you are JOINing to that column then create an index. I didn't create
any additional index here because serial_number is already indexed.

Finally:

    $table->timestamps();
    
This is a piece of Laravel magic which adds the columns `created_at`, `updated_at`, and `deleted_at`. These timestamps
are automatically managed by laravel and allow you to query for items that were created or updated on certain dates.

The `deleted_at` column allows you to delete items without removing the row, allowing you to create a sort of "Trash"
functionality where you can undelete items.

The result:

        public function up()
        {
            Schema::create('bluetooth', function (Blueprint $table) {
                $table->increments('id');
                $table->string('serial_number')->unique();
                $table->integer('battery_percent')->default(-1);
                $table->string('device_type');
                $table->timestamps();
            });
        }
        




