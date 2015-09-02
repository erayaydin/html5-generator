<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Response;

class ResponseHelper extends Response
{
    static public function downloadAndDelete($fileName, $name = null, array $headers = array())
    {
        $file = new File((string) $fileName);
        $base = $name ?: basename($fileName);
        $content = file_get_contents($fileName);
        $response = Response::make($content);
        if (!isset($headers['Content-Type']))
        {
            $headers['Content-Type'] = $file->getMimeType();
        }
        if (!isset($headers['Content-Length']))
        {
            $headers['Content-Length'] = $file->getSize();
        }
        if (!isset($headers['Content-disposition']))
        {
            $headers['Content-disposition'] = 'attachment; filename=' . $base;
        }
        foreach ($headers as $headerName => $headerValue)
        {
            $response->header($headerName, $headerValue);
        }
        unlink($fileName);
        return $response;
    }
}