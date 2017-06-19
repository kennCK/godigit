<?php
/* Add the undescore case of the controller, no need to specify crud operations*/
$apiResources = [
  'modules',
  'company',
  'company_branch',
  'company_employees',
  'department',
  'department_members',
  'position',
  'position_history'
];
api_resource($apiResources);

?>