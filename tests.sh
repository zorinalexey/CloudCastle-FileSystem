$PWD/vendor/bin/psalm --show-info=true
$PWD/vendor/bin/phpunit tests/Unit
$PWD/vendor/bin/phpmd src ansi phpmd.ruleset.xml
$PWD/vendor/bin/phpmd tests/Unit ansi phpmd.ruleset.xml
