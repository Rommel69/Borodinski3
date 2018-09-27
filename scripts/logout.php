<?php

require_once 'app_config.php';

destroySession();

header("Location: ../index.php?home");