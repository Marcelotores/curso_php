<?php 
	require('_app/Config.inc.php');

        $read = new Read;
        $read->ExeRead('ws_siteviews_agent', 'WHERE agent_name = :name AND agent_views >= :views LIMIT :limit', "name=firefox&views=10&limit=2");
        $read->setPlaces("name=Chrome&views=10&limit=2");
        $read->setPlaces("name=IE&views=5&limit=2");
	print_r($read);

 ?>