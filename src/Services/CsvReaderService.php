<?php

namespace App\Services;

use App\Services\AdapterInterface;


class CsvReaderService implements AdapterInterface
{

    public function getAll($request)
    {

        //this parameters retrieve query values
        $page = $request['page'];
        $limit = $request['limit'];

        //get the source path
        $source = \dirname(__DIR__) . '/csv/flyers_data.csv';

        //check if file exist
        if (!file_exists($source)) {
            throw new \FileNotFoundException("File not found!");
        }

        //check if file is readable
        if (($handler = @fopen($source, "r")) === FALSE) {
            throw new \Exception("Could not open the file!");
        }

        //take the header from the csv and count the number of occurencies
        $headers = fgetcsv($handler, 1000, ",");
        $count = count($headers);

        //set the pointer 
        for ($skip = 0; $skip < ($page - 1) * $limit; $skip++) {
            $data = fgetcsv($handler, 1000, ",");
        }

        //Get the needed entries from the CSV.
        for ($line = 0; $line < $limit; $line++) {
            //exclude lines with past end_date and is_published false
            $endof = date('Y-m-d', time());            
            $data = fgetcsv($handler, 1000, ",");
            if ( $data[0] == 0 || $endof < $data[3]  ) continue;

            //make the right number of key=>value 
            for ($x = 0; $x < ($count); $x++) {
                $headers[$x];
                $data[$x];
            }


            //Generate the array
            yield $this->CombineKeyValues($headers, $data);
        }
        // Close the file
        fclose($handler);
    }


    //combine the data to make dynamically the end result array
    private function CombineKeyValues($title, $data)
    {

        $key = implode(",", $title);
        $value = implode(",", $data);
        return array_combine(explode(",", $key), explode(",", $value));
    }
}
