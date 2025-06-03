<?php
namespace Fixer112\Encrypter;

use Exception;

class Encrypter
{
    /**
     * The encryption key.
     *
     * @var string
     */
    private $key;

    /**
     * The initialization vector.
     *
     * @var string
     */
    private $iv;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $key = env('ENCRYPTER_KEY');
        $iv = env('ENCRYPTER_IV');

        if (empty($key) || empty($iv)) {
            throw new Exception('ENCRYPTER_KEY and ENCRYPTER_IV must be set.');
        }

        $this->key = substr(hash('sha256', $key, true), 0, 32);
        $this->iv = substr(hash('md5', $iv), 0, 16);
    }

    /**
     * Encrypts text with AES-256-CBC using a fixed key and IV.
     */
    public function encrypt(string $plaintext)
    {
        return base64_encode(openssl_encrypt($plaintext, 'aes-256-cbc', $this->key, OPENSSL_RAW_DATA, $this->iv));
    }

    /**
     * Decrypts text with AES-256-CBC using a fixed key and IV.
     */
    public function decrypt(string $ciphertext)
    {  
        return openssl_decrypt(base64_decode($ciphertext), 'aes-256-cbc', $this->key, OPENSSL_RAW_DATA, $this->iv);
    }
}