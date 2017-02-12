#!/usr/bin/env bash
# Temporary fake DB record build step

PHP=$(which php)

# ${PHP} ./artisan db:seed --class=FakeARDSeeder
# ${PHP} ./artisan db:seed --class=FakeBluetoothSeeder
${PHP} ./artisan db:seed --class=FakeCertificateSeeder
