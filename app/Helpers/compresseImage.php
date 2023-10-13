<?php

use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;

function imageUsage($folder, UploadedFile $image)
{

    $path=public_path('images'. $folder);
    // Assurez-vous que le répertoire "public/images" existe, sinon, créez-le
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    // Générer un nom de fichier unique pour l'image compressée
    $filename = uniqid() . '.' . $image->getClientOriginalExtension();

    // Ouvrir l'image avec Intervention Image
    $img = Image::make($image->getRealPath());

    // Compression itérative en ajustant la qualité
    $quality = 90; // Valeur de qualité initiale
    $maxFileSize = 1024 * 1024; // 1 Mo en octets

    // Tant que la taille de l'image compressée est supérieure à 1 Mo, réduisez la qualité
    while ($img->filesize() > $maxFileSize && $quality >= 10) {
        // Diminuez la qualité de 10 unités
        $quality -= 10;
        // Enregistrez l'image avec la nouvelle qualité
    }

    
    
    $img->save($path . '/' . $filename, $quality);
    
    return 'images/'. $filename;
    // Retourner le chemin complet de l'image compressée
}



function imagesUsage($folder, array $images)
{
    $imagePaths = [];

    // Taille maximale autorisée en octets (1 Mo)
    $maxFileSize = 1024 * 1024; // 1 Mo en octets

    // Chemin complet pour le répertoire "public/images"
    $destinationPath = public_path('images/' . $folder);

    foreach ($images as $image) {

        // Assurez-vous que le répertoire "public/images" existe, sinon, créez-le
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // Générer un nom de fichier unique pour chaque image compressée
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();

        // Ouvrir l'image avec Intervention Image
        $img = Image::make($image->getRealPath());

        // Compression itérative en ajustant la qualité
        $quality = 90; // Valeur de qualité initiale

        // Tant que la taille de l'image compressée est supérieure à 1 Mo, réduisez la qualité
        while ($img->filesize() > $maxFileSize && $quality >= 10) {
            // Diminuez la qualité de 10 unités
            $quality -= 10;

            // Rechargez l'image à partir du fichier d'origine
            $img = Image::make($image->getRealPath());

            // Enregistrez l'image avec la nouvelle qualité
            $img->encode($image->getClientOriginalExtension(), $quality);
        }

        // Enregistrer l'image compressée dans le répertoire "public/images"
        $img->save($destinationPath . '/' . $filename);

        // Ajouter le chemin complet de l'image compressée au tableau
        $imagePaths[] = 'images/' . $folder . '/' . $filename;
    }

    // Retourner un tableau de chemins complets des images compressées
    return $imagePaths;
}


 function videoStatement($emplacement,$video){
    // ici file est le nom de l'input
    if(isset($_FILES[$video])){
        $tmpName = $_FILES[$video]['tmp_name'];

        $name = $_FILES[$video]['name'];
        $size = $_FILES[$video]['size'];
        $error = $_FILES[$video]['error'];
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
    
        $extensions = ['mp4', 'AVI', 'MKV', 'webm'];
        
        $maxSize = 1000000000; // pour 100mb
        // $maxSize = 20000000; POUR 2MB 
        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
    
            $uniqueName = uniqid('Vid', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName.".".$extension;
            while(file_exists(public_path('videos/').$emplacement.$file)){
                $file = $uniqueName.".".$extension;
            }

            // A cet androit ./photo/ est l'emplacement de ma photo
            move_uploaded_file($tmpName, public_path('videos/')."$emplacement".$file);
            // echo "Image bien convertie";
        }
        else{
            // echo "Une erreur est survenue";
            $file=NULL;
        }
        return $file;
    }
}

function DocStatement($doc, $emplacement){
    // ici file est le nom de l'input
    if(isset($_FILES[$doc])){
        $tmpName = $_FILES[$doc]['tmp_name'];

        $name = $_FILES[$doc]['name'];
        $size = $_FILES[$doc]['size'];
        $error = $_FILES[$doc]['error'];
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
    
        $extensions = ['pdf', 'txt', 'doc', 'docx'];
        $maxSize = 20000000;
    
        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
    
            $uniqueName = uniqid('Eval', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName.".".$extension;
            while(file_exists($emplacement.$file)){
                $file = $uniqueName.".".$extension;
            }

            // A cet androit ./photo/ est l'emplacement de ma photo
            move_uploaded_file($tmpName, "$emplacement".$file);
            // echo "Image bien convertie";
        }
        else{
            // echo "Une erreur est survenue";
            $file=NULL;
        }
        return $file;
    }
}

?>