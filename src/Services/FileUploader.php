<?php

namespace Baimo\Core\Services;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class FileUploader
{
    public function handle(UploadedFile $file, string $path = 'images', ?string $disk = 'public', ?string $filenameWithoutExtension = null): array
    {
        if ($disk === null) {
            $disk = config('filesystems.default');
        }
        $extension = mb_strtolower($file->getClientOriginalExtension());
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            $extension = 'jpg';
            $this->correctImageOrientation($file);
        }
        $filesize = $file->getSize();
        $mimetype = $file->getClientMimeType();
        if ($filenameWithoutExtension === null) {
            $filenameWithoutExtension = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        } else {
            $filenameWithoutExtension = Str::slug($filenameWithoutExtension);
        }
        $filename = "{$filenameWithoutExtension}.{$extension}";
        list($width, $height) = getimagesize($file);

        $filecounter = 1;
        //$upload_path = '/public/'.$path;
        $path = $path.'/'.Carbon::now()->format('Ymd');
        while (Storage::disk($disk)->exists($path.'/'.$filename)) {
            $filename = $filenameWithoutExtension.'_'.$filecounter++.'.'.$extension;
        }
        $path = $file->storeAs($path, $filename, $disk);
        $location = '/storage/'.$path;
        Log::info($location);

        $type = Arr::get(config('file.types'), $extension, 'd');

        return compact('filesize', 'mimetype', 'extension', 'filename', 'width', 'height', 'path', 'type', 'location');
    }

    private function correctImageOrientation(UploadedFile $file): void
    {
        if (!function_exists('exif_read_data')) {
            return;
        }
        $exif = exif_read_data($file);
        if (empty($exif) || !isset($exif['Orientation'])) {
            return;
        }
        $orientation = $exif['Orientation'];
        if ($orientation !== 1) {
            $img = imagecreatefromjpeg($file);
            $deg = 0;

            switch ($orientation) {
                    case 3:
                        $deg = 180;

                        break;

                    case 6:
                        $deg = 270;

                        break;

                    case 8:
                        $deg = 90;

                        break;
                }
            if ($deg) {
                $img = imagerotate($img, $deg, 0);
            }
            imagejpeg($img, $file->getPath().DIRECTORY_SEPARATOR.$file->getFilename(), 100);
        }
    }
}
