<?php

namespace App\Services;

class EncryptionService
{

    private function cipher(string $ch, int $key): string
    {
        if (!ctype_alpha($ch))
            return $ch;

        $offset = ord(ctype_upper($ch) ? 'A' : 'a');
        return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
    }

    public function encrypt(string $input, int $key): string
    {
        $output = "";

        $inputArr = str_split($input);
        foreach ($inputArr as $ch)
            $output .= $this->cipher($ch, $key);

        return $output;
    }

    public function decrypt(string $input, int $key): string
    {
        return $this->encrypt($input, 26 - $key);
    }
}
