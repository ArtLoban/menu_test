<?php

namespace App\Observers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageObserver
{
    /**
     * Handle the image "deleted" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function deleted(Image $image)
    {
        $editedPath = $this->editPath($image->path);
        Storage::delete($editedPath);
    }

    /**
     * @param string $path
     * @return string
     */
    public function editPath(string $path): string
    {
        return str_replace('storage', 'public', $path);
    }
}
