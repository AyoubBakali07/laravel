<?php
namespace App\Http\Controllers;

use App\Services\ImageService;
use App\Models\TypeMotivation;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageMotivationController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService; // Assurez-vous d'utiliser la bonne casse
    }

    public function index()
    {
        $images = $this->imageService->getImagesWithSupport();

        foreach ($images as $image) {
            // Incrémentation des vues des images et des messages de soutien
            $this->imageService->incrementImageViews($image);
            $this->imageService->incrementSupportViews($image);

            foreach ($image->supportMotivation as $support) {
                if ($support->views > 5) {
                    // Vérifie si le type de motivation "Encouragement" existe, sinon il le crée
                    $encouragement = TypeMotivation::firstOrCreate(['name' => 'Encouragement']);

                    // Attache le type de motivation si non existant
                    if (!$support->typeMotivation->contains($encouragement->id)) {
                        $support->typeMotivation()->attach($encouragement->id);
                    }
                }
            }
        }

        return view('images.index', compact('images'));
    }
}
?>