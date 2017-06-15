<?php
/* Add the undescore case of the controller, no need to specify crud operations*/
$apiResources = [
  'position',
  'position_history'
];
api_resource($apiResources);

?>