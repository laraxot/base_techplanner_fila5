#!/bin/bash

set -e
cd /home/ploi/sottana.com
sh ./bashscripts/lib/deploy_master.sh 
echo "" | sudo -S service php8.4-fpm reload

echo "🚀 Application deployed!"