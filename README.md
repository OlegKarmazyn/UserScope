# UserScope

<h2>To add a new user</h2>

1. php bin/console security:hash-password yourpassword

2. add "\\" before "$" <br>
$2y$13$JGOdwGVdEntbNkoYsPNXF.acG02rFLAbfG9x4mJYCNEmd0JgV1DOC - > \\$2y\\$13\\$JGOdwGVdEntbNkoYsPNXF.acG02rFLAbfG9x4mJYCNEmd0JgV1DOC

3. php bin/console doctrine:query:sql "INSERT INTO user (username, password, roles) VALUES ('newuser', '\\$2y\\$13\\$JGOdwGVdEntbNkoYsPNXF.acG02rFLAbfG9x4mJYCNEmd0JgV1DOC', '[\\"ROLE_USER_LIST\\", \\"ROLE_USER_EDIT\\"]')"



