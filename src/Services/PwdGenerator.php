<?php

namespace App\Services;

class PwdGenerator {
    public function generateRandomStrongPwd(int $length): String
    {
        $uppercaseLetters = $this->generateCharWithCharCodeRange([65, 90]);
        $lowercaseLetters = $this->generateCharWithCharCodeRange([97, 122]);
        $numbers = $this->generateCharWithCharCodeRange([48, 57]);
        $symbols = $this->generateCharWithCharCodeRange([33, 47, 58, 64, 91, 96, 123, 126]);

        $allChar = array_merge($uppercaseLetters, $lowercaseLetters, $numbers, $symbols);

        $isArrayShuffled = shuffle($allChar);
        if (!$isArrayShuffled) {
            //throw new Exeption("Génération d'un mot de passe aléatoire échoué, veuillez rééssayez.");
            throw $this->$this->addFlash(
               'alert',
               'Génération d\'un mot de passe aléatoire échoué, veuillez rééssayez.'
            );
        }

        $pwdArray = array_slice($allChar, 0, $length);
        return implode('', $pwdArray);
    }

    private function generateCharWithCharCodeRange(array $range): array
    {
        if(count($range) == 2) {
            return range(chr($range[0]), chr($range[1]));
        } else {
            $chunkAsciiCodes = array_chunk($range, 2); // on met en tableau tous les ascii codes
            $specialCharChunks = array_map(fn($range)=>range(chr($range[0]), chr($range[1])), $chunkAsciiCodes); // on transforme le ascii code en character
            $allSpecChar = array_merge(...$specialCharChunks); // on réunis dans un seul tableau tous les character
            /*************************************************************************************************************** */
            return array_merge(...array_map(fn($range)=>range(chr($range[0]), chr($range[1])), array_chunk($range, 2))); // faire les 3 trois du dessus en une seul
        }
    }
}