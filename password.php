<?php
$password = 123456;
$ss = md5(crypt($password, md5('wuif1907-2')));
echo $ss;