<?php
    class FormSanitizer {

        public static function sanitizeFormString($inputText) {

            $inputText = strip_tags($inputText); //Remove tags HTML ou PHP na strings
            $inputText = str_replace(" ", "", $inputText); //Remove espaços entre palavras
            //$inputText = trim($inputText);
            $inputText = strtolower($inputText); //Modifica todas as letras da string para minusculas
            $inputText = ucfirst($inputText); //Modifica a primeira letra da string para maiuscula
            return $inputText;

        }

        public static function sanitizeFormUsername($inputText) {

            $inputText = strip_tags($inputText);
            $inputText = str_replace(" ", "", $inputText);
            return $inputText;

        }

        public static function sanitizeFormPassword($inputText) {

            $inputText = strip_tags($inputText);
            return $inputText;

        }

        public static function sanitizeFormEmail($inputText) {

            $inputText = strip_tags($inputText);
            $inputText = str_replace(" ", "", $inputText);
            return $inputText;

        }
    }
?>