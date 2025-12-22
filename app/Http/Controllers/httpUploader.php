<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class httpUploader extends Controller
{
    public function uploadfile($imageuploader,$path)
    {
        $bucket = "YudhistiraIndrusties";
        $serviceKey = config("supabase.serviceKey");
        $tmpPath = $imageuploader->store('tmp',"local");
        $absolutePath = storage_path("app/private/{$tmpPath}");
        $image = file_get_contents($absolutePath);
        Storage::disk("local")->delete($tmpPath);         

        $result = Http::withHeaders([
            'Authorization' => 'Bearer ' . $serviceKey,
            'apikey' => $serviceKey,
            'Content-Type' => 'image/png',
        ])->withBody($image, 'image/png')
            ->post(
                 "https://ntrtbiyiefmemqbcjsad.supabase.co/storage/v1/object/" . $bucket .  "/{$path}/{$tmpPath}"
            );
            $body = json_decode($result->body(), true);
        return "https://ntrtbiyiefmemqbcjsad.supabase.co/storage/v1/object/public/{$body["Key"]}";
    }
}
