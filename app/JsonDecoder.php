<?php
namespace App;

class JsonDecoder
{
    public function jsonFileRead(string $filename): ?array
    {
        if (!file_exists($filename)) {
            throw new \InvalidArgumentException("File not found: $filename");
        }
        $jsonData = file_get_contents($filename);
        if ($jsonData === false) {
            throw new \RuntimeException("Failed to read JSON file: $filename");
        }
        $decodedData = json_decode($jsonData, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Failed to decode JSON: " . json_last_error_msg());
        }
        return $decodedData;
    }
}