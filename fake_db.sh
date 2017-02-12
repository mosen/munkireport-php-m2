#!/usr/bin/env bash
# Temporary fake DB record build step

PHP=$(which php)

# ${PHP} ./artisan db:seed --class=FakeARDSeeder
# ${PHP} ./artisan db:seed --class=FakeBluetoothSeeder
# ${PHP} ./artisan db:seed --class=FakeCertificateSeeder
${PHP} ./artisan db:seed --class=FakeCommentSeeder
${PHP} ./artisan db:seed --class=FakeCrashPlanSeeder
${PHP} ./artisan db:seed --class=FakeDeployStudioSeeder
