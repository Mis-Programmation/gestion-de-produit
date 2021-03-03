<?php

require_once "vendor/autoload.php";
require_once "config/bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
