<?php
    class ParseXML{

        function parse($url, $available){

            $ShardArr = array();

            if($available){

                $sxml = simplexml_load_file($url);

                foreach($sxml as $shard){

                    $shardObj = array(
                        "name" => (string)$shard->attributes()->name,
                        "online" => (boolean) filter_var($shard->attributes()->online, FILTER_VALIDATE_BOOLEAN),
                        "locked" => (boolean) filter_var($shard->attributes()->locked, FILTER_VALIDATE_BOOLEAN),
                        "population" => (string)$shard->attributes()->population,
                        "queued" => (int)$shard->attributes()->queued,
                        "language" => (string)$shard->attributes()->language,
                        "pvp" => (boolean) filter_var($shard->attributes()->pvp, FILTER_VALIDATE_BOOLEAN),
                        "rp" => (boolean) filter_var($shard->attributes()->rp, FILTER_VALIDATE_BOOLEAN),
                        "recommend" => (boolean) filter_var($shard->attributes()->recommend, FILTER_VALIDATE_BOOLEAN)
                    );

                    array_push($ShardArr, $shardObj);

                }
            } else{

                $shardObj = array(
                    "name" => "none",
                    "online" => false,
                    "locked" => false,
                    "population" => "none",
                    "queued" => "none",
                    "language" => "none",
                    "rp" =>  false
                );

                array_push($ShardArr, $shardObj);

            }

            return $ShardArr;

        }
    }