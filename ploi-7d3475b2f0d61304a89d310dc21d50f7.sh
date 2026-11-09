#!/bin/bash

set -e
cd /home/ploi/sottana.com
git add -A && git commit -am . && git fetch origin master && (git merge origin/master --allow-unrelated-histories -s resolve || git merge origin/master --allow-unrelated-histories) && git push -u origin HEAD:master ||  git fetch origin master && (git merge origin/master --allow-unrelated-histories -s resolve || git merge origin/master --allow-unrelated-histories) && git push -u origin HEAD:master
./bashscripts/lib/deploy.sh 
echo "" | sudo -S service php8.4-fpm reload

echo "🚀 Application deployed!"