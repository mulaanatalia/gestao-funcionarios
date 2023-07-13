<?php
    class Extras{

        public function date_format($date=""){
            $response = "";
            if(!empty($date)){
                $DataEspecifica = new DateTime($date);
                $response = $DataEspecifica->format('d-m-Y H:i:s');
            }
            return $response;
        }

        public function date_format2($date=""){
            $response = "";
            if(!empty($date)){
                $DataEspecifica = new DateTime($date);
                $response = $DataEspecifica->format('d-m-Y');
            }
            return $response;
        }

        public function date_format3($date=""){
            $response = "";
            if(!empty($date)){
                $DataEspecifica = new DateTime($date);
                $response = $DataEspecifica->format('Y-m-d');
            }
            return $response;
        }
    }
?>