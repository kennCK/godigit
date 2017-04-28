<?php
/* Add the undescore case of the controller, no need to specify crud operations*/
$apiResources = [
  "product",
  "product_order",
  "user",
  "user_type"
];
api_resource($apiResources);


?>