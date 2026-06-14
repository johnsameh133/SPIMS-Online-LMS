<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mariadb';
$CFG->dblibrary = 'native';
$CFG->dbhost    = getenv('MARIADB_HOST')     ?: 'db';
$CFG->dbname    = getenv('MARIADB_DATABASE') ?: 'moodle';
$CFG->dbuser    = getenv('MARIADB_USER')     ?: 'moodleuser';
$CFG->dbpass    = getenv('MARIADB_PASSWORD') ?: 'moodlepass';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => 3306,
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->sslproxy  = true;  // Nginx handles SSL termination; tell Moodle to trust it
$CFG->wwwroot   = 'https://online-lms.spims.site';
$CFG->dataroot  = '/var/www/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
