<?php

namespace App\Validation;

class FileRulesCustom
{
    /**
     * Prevent files with double extensions like .doc.php
     */
    public function no_double_extension($file): bool
    {
        if (!is_array($file) || !isset($file['name'])) {
            return false;
        }

        $filename = strtolower($file['name']);

        // List of dangerous extensions that shouldn't appear in middle
        $blacklist = ['php', 'exe', 'js', 'sh', 'py', 'jsp', 'asp'];

        // Explode the filename into parts
        $parts = explode('.', $filename);

        // If only one part, it means no extension — optional: block or allow
        if (count($parts) < 2) {
            return false; // No extension
        }

        // Remove the last extension (assumed safe)
        $ext = array_pop($parts);

        // Check if any middle part is in the blacklist
        foreach ($parts as $part) {
            if (in_array($part, $blacklist)) {
                return false; // Double extension attempt
            }
        }

        return true; // Safe
    }
}
