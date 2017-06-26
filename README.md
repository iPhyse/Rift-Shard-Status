Rift Shard Status RESTful API
=============================

This RESTful API makes it easier to read out the XML data, served from the Rift game server data.

<img src="http://www.slimframework.com/assets/discourse/slim-discourse-logo.png" width="40%">

`This RESTful API makes use of the Slim Framework (2.6.x) as its base. The 2.6.x version of this frameworks gives you the possibility to apply without the use of Composer`

## Installation
It's recommended that you use:

 - Php 5.5 up to 7.1
 - Any http server (httpd, nginx or equivalent)

Clone the project anywhere to your Host or VPS

    $ git clone https://github.com/iPhyse/Rift-Shard-Status-Api
	
The 'public' folder contains the index which needs to be served.

## Implemented API calls

    http://yourdomain.com/riftapi/region/eu
	http://yourdomain.com/riftapi/region/na
    http://yourdomain.com/riftapi/region/eu/Bloodiron
    http://yourdomain.com/riftapi/region/na/Seastone

## Credits
- [Slim framework team](https://github.com/slimphp/Slim)