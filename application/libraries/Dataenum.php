<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    

class Dataenum{
 
 public function jenistransaksi( $table , $field )
    {
        $query = "SHOW COLUMNS FROM ".$table." LIKE '$field'";
        $row = $this->query("SHOW COLUMNS FROM ".$table." LIKE '$field'")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all( $regex , $row, $enum_array );
        $enum_fields = $enum_array[1];
        foreach ($enum_fields as $key=>$value)
        {
            $enums[$value] = $value; 
        }
        return $enums;
    }
}
?>