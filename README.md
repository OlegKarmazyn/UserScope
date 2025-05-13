# UserScope

<h1>to add a new user</h1>


1. do it
php bin/console security:hash-password yourpassword

2. add "\" before "$"
$2y$13$JGOdwGVdEntbNkoYsPNXF.acG02rFLAbfG9x4mJYCNEmd0JgV1DOC - > \$2y\$13\$JGOdwGVdEntbNkoYsPNXF.acG02rFLAbfG9x4mJYCNEmd0JgV1DOC

3. do it
php bin/console doctrine:query:sql "INSERT INTO user (username, password, roles) VALUES ('newuser', '\$2y\$13\$JGOdwGVdEntbNkoYsPNXF.acG02rFLAbfG9x4mJYCNEmd0JgV1DOC', '[\"ROLE_USER_LIST\", \"ROLE_USER_EDIT\"]')"



