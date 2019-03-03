
 <?php
 namespace App\Controllers;
 use \App\Models\Image as ImageModel;
 use \App\Kernel;

 class Image {


  static  function resize_img(){
    	$newimage=ImageModel::resize($image);
  }
}
