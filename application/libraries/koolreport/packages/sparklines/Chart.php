<?php
/**
 * This file contains Chart widget
 *
 * @author KoolPHP Inc (support@koolphp.net)
 * @link https://www.koolphp.net
 * @copyright KoolPHP Inc
 * @license https://www.koolreport.com/license
 */
namespace koolreport\sparklines;
use \koolreport\core\Widget;
use \koolreport\core\Utility;

class Chart extends Widget
{
    protected $id;
    protected $type;
    protected $data;
    protected $column;
    protected $options;
    protected $width;
    protected $height;

    protected function resourceSettings()
    {
        return array(
            "folder"=>"clients",
            "js"=>array(
                "jquery.sparkline.min.js",
            ),
        );        
    }
    
    protected function onInit()
    {
        $this->id = "sparkline_".Utility::getUniqueId();
        $this->useDataSource();
        $this->data = Utility::get($this->params,"data");
        if($this->data==null)
        {
            $this->column = Utility::get($this->params,"column");
            if($this->dataStore)
            {
                $this->data = array();
                $this->dataStore->popStart();
                while($row = $this->dataStore->pop())
                {
                    if(!$this->column)
                    {
                        $this->column = Utility::get(array_keys($row),0);
                    }
                    if($this->column)
                    {
                        array_push($this->data,$row[$this->column]);
                    }
                    
                }
            }
        }
        if($this->data==null)
        {
            throw new \Exception("There is no data for sparklines chart");
        }
        //Type
        if($this->type===null)
        {
            $this->type = Utility::get($this->params,"type");
        }
        $this->options = Utility::get($this->params,"options",array());
        $this->options["type"] = $this->type;

        //Width height
        $this->width = Utility::get($this->params,"width");
        $this->height = Utility::get($this->params,"height");
        if($this->width)
        {
            $this->options["width"] = $this->width;
        }
        if($this->height)
        {
            $this->options["height"] = $this->height;
        }
    }
    public function render()
    {
        if($this->type===null)
        {
            throw new \Exception("Type of chart is not specified");
        }
        $this->template("Chart");
    }
}