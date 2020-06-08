<?php
/**
 * This file contains class to handle generated file.
 *
 * @author KoolPHP Inc (support@koolphp.net)
 * @link https://www.koolphp.net
 * @copyright KoolPHP Inc
 * @license https://www.koolreport.com/license#regular-license
 * @license https://www.koolreport.com/license#extended-license
 */

namespace koolreport\excel;
use \koolreport\core\Utility;

class ExcelFile
{
    protected $path;
    public function __construct($path)
    {
        $this->path = $path;
    }
    
    protected function mime_type($filename)
    {
        $dotpos =strrpos($filename,".");
        $ext = strtolower(substr($filename,$dotpos+1));
        $map =array(
            "xls"=>"application/vnd.ms-excel",
            "xlsx"=>"application/vnd.ms-excel",
        );
        return Utility::get($map,$ext);
    }
    
    public function toBrowser($filename)
    {
        
        $source = realpath($this->path);
        
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Type: ".$this->mime_type($filename));
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . filesize($source));
        
        $file = @fopen($source,"rb");
        if ($file) {
          while(!feof($file)) {
            print(fread($file, 1024*8));
            flush();
            if (connection_status()!=0) {
              @fclose($file);
              die();
            }
          }
          @fclose($file);
        }
        return $this;
    }
    public function saveAs($filename)
    {
        if(copy($this->path,$filename))
        {
            return $this;
        }
        else
        {
            throw new \Exception("Could not save file $filename");
            return false;
        }
    }
}
