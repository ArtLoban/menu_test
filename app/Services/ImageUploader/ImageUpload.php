<?php

namespace App\Services\ImageUploader;

use Illuminate\Http\UploadedFile;

class ImageUpload
{
    const DEFAULT_MO_IMAGE_PATH = '/storage/uploads/no_image.png';

    /**
     * @param $request
     * @return string
     */
    public function getImagePath($request) : ?string
    {
       $path = ($request->hasFile('image')) ? $this->getPath($request->file('image')) : null;

       return $path;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @return string
     */
    private function getPath(UploadedFile $uploadedFile) :string
    {
        $path =  $uploadedFile->store('public/uploads');
//        dd($path);
//        dd($this->editStoragePath($path));
        return $this->editStoragePath($path);
    }

    /**
     * Edit the path to storage folder
     *
     * @param string $path
     * @return string
     */
    private function editStoragePath(string $path) :string
    {
        return str_replace('public', 'storage', $path);
    }
}