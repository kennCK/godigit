<?php
/* Add the undescore case of the controller, no need to specify crud operations*/
$apiResources = [
  'modules',
  'business_type',
  'company',
  'company_logo',
  'company_branch',
  'company_employees',
  'department',
  'department_members',
  'position',
  'position_history',
  'api_test_results',
  'account',
  'account_types'
];
api_resource($apiResources);

?>