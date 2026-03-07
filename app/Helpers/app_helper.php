<?php

if (!function_exists('format_date')) {
    function format_date(string $date, string $format = 'd/m/Y'): string
    {
        return date($format, strtotime($date));
    }
}


if (!function_exists('formatFileSize')) {
    function formatFileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            $size = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $size = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $size = number_format($bytes / 1024, 2) . ' KB';
        } else {
            $size = $bytes . ' B';
        }
        return $size;
    }
}