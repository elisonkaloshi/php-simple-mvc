#!/bin/sh

option="${1}"
case ${option} in
   -m) CLASSNAME="${2}"
      php -r 'require "vendor/autoload.php";include "database/migrations/'${CLASSNAME}'.php";Database\Migrations\'${CLASSNAME}'::run();'
      ;;
  -s) PORT="${2}"
      php -S localhost:${PORT} -t public/
    ;;
   *)
      echo "`basename ${0}`:usage: [-m CLASSNAME]"
      echo "`basename ${0}`:usage: [-s PORT]"
      exit 1
      ;;
esac
