Activism
========

A stand alone PHP 'Active Record' based library.

Aim
====

In PHP there is a heavy reliance on Doctrine which is a 'Data Mapper' implementation of ORM.
There are only few 'Active Record' libraries available in PHP.

Configuration
========
```
use Mackstar/Activism/Base/Config;

Config::add('development|all|test', 'default', array(
  'adapter' => 'Mackstar/Activism/Adapters/DBAL',
  'dbname' => 'mydb',
  'user' => 'user',
  'password' => 'secret',
  'host' => 'localhost',
  'driver' => 'pdo_mysql'
));
```
Examples
========

Find / Update
```
$user = User::find($id)->use('primary');
$user->update(['name' => 'Richard', 'age' => 21]);
```
Getters / Setters
```
echo $user->getName();
$user->setName('Another Name');
$user->save();
```

Class Specification
===================
```
namespace Project\Models;

class User extends Mackstar/Activism/Base/Model
{
  protected $hasMany = [
    'comments'
  ];
}

class Comments extends Mackstar/Activism/Base/Model
{
  protected $belongsTo = [
    'user'
  ];
}
```


Callbacks
=========

Relationships
=============
```
$user->getCompany()->getName();
```

Adapters
=============
DBAL, REST, FileSystem (for mocking), Memory.
