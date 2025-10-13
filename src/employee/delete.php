<?php
remove($id,'employees');
header("Location: ". DOMAIN_NAME. '/employee/read');
exit();