<?php

Class Settings_INI {

    function loadProperty ($property) {

        $ini = parse_ini_file('settings.ini');

        foreach ($ini as $key => $line){
            if($key == $property){
                return $line;
            }
        }

        return "";
    }

    function modifyProperty ($property, $value) {

        $ini = parse_ini_file('settings.ini');

        $handle = fopen('settings.ini','w');
        if($handle){
            foreach ($ini as $key => $line){
                if($key == $property){
                    fwrite($handle,$key.' = '.$value);
                }else {
                    fwrite($handle,$key.' = '.$line);
                }
            }
            fclose($handle);
        }

    }
}