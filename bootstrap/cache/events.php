<?php return array (
  'App\\Providers\\EventServiceProvider' => 
  array (
    'Illuminate\\Auth\\Events\\Registered' => 
    array (
      0 => 'Illuminate\\Auth\\Listeners\\SendEmailVerificationNotification',
    ),
  ),
  'OwenIt\\Auditing\\AuditingEventServiceProvider' => 
  array (
    'OwenIt\\Auditing\\Events\\AuditCustom' => 
    array (
      0 => 'OwenIt\\Auditing\\Listeners\\RecordCustomAudit',
    ),
  ),
);