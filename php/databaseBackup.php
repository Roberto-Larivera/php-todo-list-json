<?php
$backupDatabase =  file_get_contents('../database/databaseBackup.json');

file_put_contents('../database/database.json', $backupDatabase);

echo '&#9989; Data restored from backup';

die();