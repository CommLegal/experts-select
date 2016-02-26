<?php
define("_PWD_SALT", "'RDYOVKL5CTRLYANJTXKVZ9OHPW98ES'");
echo md5(_PWD_SALT . "test" . _PWD_SALT);

?>