#!/bin/bash

 docker run --rm -v "${PWD}:/laravel" openapitools/openapi-generator-cli generate \
              -i https://raw.githubusercontent.com/openapitools/openapi-generator/master/modules/openapi-generator/src/test/resources/3_0/petstore.yaml \
              -g php-laravel \
              --skip-overwrite \
              -o laravel/app
