<?php
/* Add the undescore case of the controller, no need to specify crud operations*/
$apiResources = [
  'modules',
  'business_type',
  'company',
  'company_logo',
  'company_branch',
  'company_employee',
  'department',
  'department_member',
  'position',
  'position_history',
  'api_test_results',
  'account',
  'account_type',
  'account_information',
  'account_profile_picture'
];
api_resource($apiResources);

?>