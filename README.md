```bash
git clone git@github.com:shanginn/spiral-with-actor-tests-bug.git
cd spiral-with-actor-tests-bug
composer install
./vendor/bin/phpunit

# 1) Tests\Endpoint\Api\UserControllerTest::testMe
# Received response status code [500 : ] but expected 200. Body: [Spiral\Auth\Exception\TransportException]
# Undefined auth transport header in vendor/spiral/framework/src/AuthHttp/src/TransportRegistry.php:34
```