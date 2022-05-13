#!/bin/bash

# https://orchid.software/en/docs/installation/#updating

composer update orchid/platform --with-dependencies \
  && php artisan orchid:publish \
  && php artisan view:clear