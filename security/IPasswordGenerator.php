<?php

interface IPasswordGenerator{
    public static function encrypt(string $plainPassword): string;

}