<?php

    require '../Slim/Slim.php';
    require 'class/DomainCheck.class.php';
    require 'class/ParseXML.class.php';
    require 'class/RegionServers.class.php';

    use \Slim\Slim;

    Slim::registerAutoloader();

    $app = new Slim();

    $app->group('/region', function ()  use ($app) {

        $app->get('/:region', function ($region){

            $domainCheck = new DomainCheck();
            $parseXML = new ParseXML();
            $regionServers = new RegionServers();

            $address = $regionServers->getRegionAddress($region);

            if ($domainCheck->checkAvailability($address)) {

                $shardArray = $parseXML->parse($address, true);
                echo json_encode($shardArray);

            } else {

                echo json_encode($parseXML->parse($address, false));

            }

        });

        $app->get('/:region/:shard', function ($region, $realm){

            $domainCheck = new DomainCheck();
            $parseXML = new ParseXML();
            $regionServers = new RegionServers();

            $address = $regionServers->getRegionAddress($region);

            $shardArray = $parseXML->parse($address, false);

            if ($domainCheck->checkAvailability($address)) {
                $flag = true;
                foreach ($shardArray as $shard) {
                    if (strtolower($shard["name"]) == strtolower($realm)) {
                        echo json_encode($shard);
                        $flag = false;
                        break;
                    }
                }
                if ($flag) {
                    echo json_encode($parseXML->parse($address, false));
                }
            } else {
                echo json_encode($parseXML->parse($address, false));
            }

        });

    });

    $app->run();