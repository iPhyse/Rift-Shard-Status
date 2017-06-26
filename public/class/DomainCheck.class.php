<?php

    class DomainCheck {

        function checkAvailability($domain){

            if(!filter_var($domain, FILTER_VALIDATE_URL))
            {

                return false;

            }

            $curlInit = curl_init($domain);
            curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
            curl_setopt($curlInit,CURLOPT_HEADER,true);
            curl_setopt($curlInit,CURLOPT_NOBODY,true);
            curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);


            $response = curl_exec($curlInit);
            curl_close($curlInit);

            if ($response) return true;
            return false;

        }
    }
