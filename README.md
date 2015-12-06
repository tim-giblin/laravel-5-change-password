## laravel 5.* Change Password

### Introduction
This will add a change password feature for logged in users. Just pull into your application and that's it.

### Usage
Pull into application

Choose which blade template you wish to use (currently set to basic)
```php
public function getChangePassword()
{
  return view('auth.changepassword');
}
```
Or if you're using Form Facade
```php
public function getChangePassword()
{
  return view('auth.changepassword_facade');
}
```

The route will be automatically added as you can see here:
![route list](http://i.imgur.com/yKBsTB0.png)

### License

This is free software distributed under the terms of the MIT license.
