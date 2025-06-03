<?php
it('encrypts and decrypts correctly', function () {
  $encrypter = new Fixer112\Encrypter\Encrypter("password","password");

  $plainText = 'Hello, Pest!';

  $encrypted = $encrypter->encrypt($plainText);
  $decrypted = $encrypter->decrypt($encrypted);

  expect($decrypted)->toBe($plainText);
});