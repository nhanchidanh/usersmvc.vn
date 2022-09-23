<?php

setcookie('is_login', true, time() - 3600);
setcookie('user_login', "{$username}", time() - 3600);
unset($_SESSION['is_login']);
unset($_SESSION['user_login']);

redirect('?page=login');