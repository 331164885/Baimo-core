<?php

if (!function_exists('getMigrationFileName')) {
    function getMigrationFileName(string $name): string
    {
        $directory = database_path(DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR);
        $migrations = File::glob($directory.'*_'.$name.'.php');

        return $migrations[0] ?? $directory.date('Y_m_d_His').'_'.$name.'.php';
    }
}