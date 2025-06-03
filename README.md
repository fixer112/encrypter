# Fixer112 Encrypter

Simple AES-256-CBC encryption/decryption PHP library using fixed key and IV loaded from environment variables.

---

## Installation

Install via Composer:

```bash
composer require fixer112/encrypter
```
## Environment Setup

Create a `.env` file in your project root with these variables:

```env
ENCRYPTER_KEY=your-secret-key-here
ENCRYPTER_IV=your-iv-here
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use Fixer112\Encrypter\Encrypter;

// Load .env (if not using Laravel, you need to load it manually)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $encrypter = new Encrypter();

    $plaintext = "Hello, world!";
    $encrypted = $encrypter->encrypt($plaintext);
    echo "Encrypted: " . $encrypted . PHP_EOL;

    $decrypted = $encrypter->decrypt($encrypted);
    echo "Decrypted: " . $decrypted . PHP_EOL;

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

## Notes
- This package depends on your .env file to provide ENCRYPTER_KEY and ENCRYPTER_IV.

- Make sure to keep your key and IV secret and do not commit them to public repositories.
