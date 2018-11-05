<?php

use HanhChinh\HanhChinh\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTable extends Seeder {

    protected $_url = null;
    protected $_data = null;

    public function __construct() {
        $this->_url = 'https://gistcdn.githack.com/trungx/cd78b717457764a90415f3924d1ab3f2/raw/fc41639feb681487f358837dc74c6f60547ac32c/hanhchinh.json';
        $this->_data = json_decode(file_get_contents($this->_url));
        \DB::table('regions')->truncate();
    }
    public function run()
    {
        foreach($this->_data as $rs) {
            //$arr = (array) $rs;
            $region = new Region();
            $region->id = $rs->id;
            $region->parent_id = $rs->parent_id;
            $region->ancestor_id = $rs->ancestor_id;
            $region->order = $rs->order;
            $region->visibility = $rs->visibility;
            $region->title = $rs->title;
            $region->type = $rs->type;
            $region->full_title = $rs->full_title;
            $region->code = $rs->code;
            $region->slug = $rs->slug;
            $region->short_description = $rs->short_description;
            $region->filename = $rs->filename;
            $region->page_image = $rs->page_image;
            $region->description = $rs->description;
            $region->save();
            //dd((array) $rs);
        }
    }
}