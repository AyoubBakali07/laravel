<?php
namespace App\Services;

use App\Models\Image;
use App\Models\ImageMotivation;

class ImageService
{
    public function getImagesWithSupport()
    {
        return ImageMotivation::with(['employe', 'supportMotivation', 'supportMotivation.typeMotivation'])->get();
    }

    public function incrementImageViews(ImageMotivation $image)
    {
        $image->views += 1;
        $image->save();
    }

    public function incrementSupportViews(ImageMotivation $image)
    {
        foreach ($image->supportMotivation as $support) {
            $support->views += 1;
            $support->save();
        }
    }
}
?>
