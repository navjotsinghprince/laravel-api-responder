# ⚡ Laravel API Responder

[![License](https://img.shields.io/github/license/navjotsinghprince/laravel-api-responder)](https://github.com/navjotsinghprince/laravel-api-responder)
[![Packagist Version](https://img.shields.io/packagist/v/navjot/laravel-api-responder)](https://packagist.org/packages/navjot/laravel-api-responder)
[![Laravel Version](https://img.shields.io/badge/laravel-10%20|%2011%20|%2012-orange)](https://laravel.com)

---

A Reusable Laravel consistent API response package for web and mobile apps


## 📘 Introduction

**Laravel API Responder** is a lightweight Laravel package for generating clean, standardized API responses with minimal code.  
It includes pre-configured methods to handle HTTP status codes, success, error, validation failures, and more.

---

## ✨ Features

- ✅ Consistent and clean JSON API response format
- ✅ Predefined HTTP status codes
- ✅ Reusable trait for any controller
- ✅ Works out of the box — no configuration needed
- ✅ PSR-4 & Laravel auto-discovery support
- ✅ Compatible with Laravel 10, 11, and 12+

---

### 📦 Installation 

```bash
composer require navjot/laravel-api-responder
```

### 📥 Importing ApiResponder

```bash
use Navjot\Laravel\ApiResponder;
```

### ✅ Option 1: Use in a Single Controller

```php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Navjot\Laravel\ApiResponder;

class TestController extends Controller
{
    use ApiResponder;

    public function index(Request $request)
    {
        return $this->sendSuccess("Response message", ['foo' => 'bar']);
    }
}

```


### 🌐 Option 2: Global Import for All Controllers
To enable ApiResponder globally in every controller, add it to Laravel’s default base controller:
app/Http/Controllers/Controller.php file.

```php
<?php

namespace App\Http\Controllers;

use Navjot\Laravel\ApiResponder;

abstract class Controller
{
    use ApiResponder;
}


```


### 🧠 Usage Examples

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Navjot\Laravel\ApiResponder;
use Illuminate\Support\Facades\Validator;

//Feel Free To Visit https://github.com/navjotsinghprince
class TestController extends Controller {
    
   use ApiResponder;

    /**
     * Example 1...
     */
    public function example1(Request $request)
    {
        $collection = collect([1, 2, 3]);

        $class_obj = new \stdClass();
        $class_obj->name="Navjot Singh";

        $response = [
            "string" => "Navjot Singh",
            "int" => 1,
            "float" => 3.14,
            "boolean" => true,
            "array" => ["prince", "ferozepuria"],
            "collection" => $collection,
            "class_object" => $class_obj,
            "null_value" => null,
            "empty_string" => "",
            "empty_array" => [],
        ];

        return $this->sendSuccess(self::SUCCESS,$response);

      }


    /**
     * Example 2...
     */
    public function example2(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email'=>'required|email'
        ]);

        if ($validator->fails()) {
            return $this->validationFailed(self::ALL_FIELDS_REQUIRED, $validator->errors());
        }

      }


    /**
     * Example 3...
     * Usage With Custom Message
     */
    public function example3(Request $request)
    { 
        $data = ["name" => "Navjot Singh"];
        return $response->sendSuccess("Your custom success message here...",  $data);
    }

    
    }
```


### ⚙️ Available Methods

```php
<?php

   $response = [
      "name" => "Navjot Singh",
      "email" => "navjotsinghprince@icloud.com",
      "website" => "https://github.com/navjotsinghprince"
    ];

    return $this->sendSuccess("eg. Request completed successfully", $response);

    return $this->sendSuccessWith("eg. Request processed successfully","total",$response);

    return $this->sendFailure("eg. Unable to process your request at this time",$response);

    return $this->validationFailed("eg. Validation failed. Please check your input",$response);

    return $this->notFound("eg. The requested resource was not found",$response);

    return $this->unauthorized("eg. Authentication required. Please log in");

    return $this->forbidden("eg. You do not have permission to access this resource");

    return $this->badRequest("eg. An error occurred while processing your request");

```


## 💡 Tips
:bulb: **Tip:** Use Available Messages: SUCCESS , FAILED , ALL_FIELDS_REQUIRED , SOMETHING_WRONG , SOMETHING_WRONG_LATER.

:bulb: **Tip:** Best practice: Add the ApiResponder to app/Http/Controllers/Controller.php to avoid importing in every controller manually.


```php
<?php
    return $this->sendSuccess(self::SUCCESS, [...]);
    return $this->sendFailure(self::FAILED, [...]);
    return $this->validationFailed(self::ALL_FIELDS_REQUIRED, [...]);
    return $this->sendFailure($this::SOMETHING_WRONG, ['same work as self keyword']);
    return $this->sendFailure($this::SOMETHING_WRONG_LATER, [...]);
```


## 👨‍💻 Author & Lead Developer of Laravel API Responder
<img src="https://navjotsinghprince.github.io/navjotsinghprince/img/signature-black.png" alt="Navjot Singh" height="55">

See also the site of [contributor](https://github.com/navjotsinghprince)
who participated in this package.

## 📬 Contact
If you discover any question within package, please send an e-mail to Navjot Singh via [navjotsinghprince@icloud.com](mailto:navjotsinghprince@icloud.com). Your all questions will be answered.

## 📓 Changelog
Please see [changelog.md](changelog.md) for what has changed recently.


## ☕ Buy Me A Coffee! :coffee: 
Feel free to buy me a coffee at [__Buy me a coffee! :coffee:__]( https://ko-fi.com/navjot), I would be really grateful for anything, be it coffee or just a kind comment towards my work, that helps me a lot.

## 💰 Donation
The package is completely free to use, however, it has taken a lot of time to build. If you would like to show your appreciation by leaving a small donation, you can do so by clicking here [here](https://www.paypal.com/paypalme/navjotsinghprince). Thanks!

## 📄 License
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md)
file for details.
