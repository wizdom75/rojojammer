<?php
namespace App;

use App\Category;

class Helper {
    /**
     * Method that strips strings of non-alphanumeric 
     * characters and turn them into a slug
     * @param $string
     * 
     * @return $slug
     */
    public static function makeSlug($string)
    {
        return preg_replace('#\s+#','-',strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $string)));
    }

    /**
     * Get the categories bread crumb
     */
     
    public static function makeBreadCrumb($id)
    {
        $cat = Category::find($id);
        if(Request()->slug === @$cat->slug){
            $breadcrumb = "<li class='breadcrumb-item  active'  aria-current='page'>$cat->title</li>";
        }else{
            $slug = @$cat->slug;
            $title = @$cat->title;
            $breadcrumb = "<li class='breadcrumb-item'><a  class='text-dark' href='/browse/$slug'>$title</a></li>";
        }
        $parent = @$cat->parent_id;
        if($parent !== 0){
           self::makeBreadCrumb($parent);

        }
        print($breadcrumb);
    }

    /**
     * Get remote file for processing
     */
    public static function getRemoteFile($source, $destination)
    {
        set_time_limit(0);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec ($ch);
        curl_close ($ch);

        $file = fopen($destination, "w+");
        fputs($file, $data);
        fclose($file);
    }
}
