<?php

remove($id,"department");
header("Location: ". DOMAIN_NAME. '/department/read');

exit();