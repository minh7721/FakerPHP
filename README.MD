# Faker Dữ liệu giả

## Cách sử dụng:
`composer install`

```php
<?php
require_once __DIR__."/vendor/autoload.php";
use App\Data;

// Khởi tạo Data
$data = new Data();

// Sử dụng các hàm có trong data
print_r($data->info());
print_r($data->randNumber());
print_r($data->time());
print_r($data->modifiers());
print_r($data->localization());
print_r($data->seeding());
print_r($data->internals());
```