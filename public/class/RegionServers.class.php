<?php

    class RegionServers{

        function getRegionAddress($region){

            switch ($region) {

                case "eu":
                    return 'http://status.riftgame.com/eu-status.xml';
                    break;

                case "na":
                    return 'http://status.riftgame.com/na-status.xml';
                    break;

                default:
                    return '';
                    break;

            }
        }

    }