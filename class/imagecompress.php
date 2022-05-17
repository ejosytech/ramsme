    <?php
class imageComp
{
    private $image;

    public function setImage($image)//Sets the image to compress
    {
        if (exif_imagetype($image) == IMAGETYPE_JPEG) {
            $this->image = $image;
        } else {
            throw new Exception("Error not an image");
        }
    }

    public function getSize()//Returns image filesize
    {
        $image = $this->image;
        if (exif_imagetype($image) == IMAGETYPE_JPEG) {
            return filesize($image) / 1024;//Size as KB
        } else {
            throw new Exception("Error not an image");
        }
    }

    public function compress()//Filter and compress based on filesize
    {
        $image = $this->image;
        $size = filesize($image) / 1024;//Size as KB
        if ($size >= 1000) {//Greater or equal to 1 MB
            $img = imagecreatefromjpeg($image);
            imagejpeg($img, $image, 34);
            return "$image was over 1000 KB";
        } elseif ($size >= 800) {//Greater or equal 800 KB
            $img = imagecreatefromjpeg($image);
            imagejpeg($img, $image, 36);
            return "$image was over 800 KB";
        } elseif ($size >= 600) {//Greater or equal 600 KB
            $img = imagecreatefromjpeg($image);
            imagejpeg($img, $image, 38);
            return "$image was over 600 KB";
        } elseif ($size >= 400) {//Greater or equal 400 KB
            $img = imagecreatefromjpeg($image);
            imagejpeg($img, $image, 40);
            return "$image was over 400 KB";
        } else {
            return "$image was under 400 KB";
        }
    }
}