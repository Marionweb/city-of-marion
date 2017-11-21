if [ -d "releases/${execution.to_revision.revision}" ] && [ "${execution.refresh}" = "true" ]; then echo "Removing: releases/${execution.to_revision.revision}" && rm -rf releases/${execution.to_revision.revision}; fi
if [ ! -d "releases/${execution.to_revision.revision}" ]; then echo "Creating: releases/${execution.to_revision.revision}" && cp -dR deploy-cache releases/${execution.to_revision.revision}; fi


if [ ! -d "storage" ]; then echo "Creating: storage/backups, storage/logs, storage/runtime, storage/cpresources" && mkdir storage storage/backups storage/logs storage/runtime storage/cpresources; fi

echo "Make sure runtime folders have the correct permissions"
chmod -R 774 storage/backups
chmod -R 774 storage/logs
chmod -R 774 storage/runtime
chmod -R 774 storage/cpresources


echo "Disallow robots from indexing staging"
printf '%s\n' 'User-agent: *' 'Disallow: /' | tee releases/${execution.to_revision.revision}/web/robots.txt


echo "Running composer install"
cd releases/${execution.to_revision.revision} && composer install

echo "COMMENTED OUT: Running npm install"
echo "COMMENTED OUT: cd releases/${execution.to_revision.revision} && npm install"

echo "Running yarn install"
cd releases/${execution.to_revision.revision} && yarn install

echo "Wait for it..."
sleep 3.5s

echo "Building JS and CSS"
cd releases/${execution.to_revision.revision} && gulp build

echo "Adding symlinks to runtime folders"
ln -s /srv/users/serverpilot/apps/cityofmarion-staging/storage/backups releases/${execution.to_revision.revision}/storage/backups
ln -s /srv/users/serverpilot/apps/cityofmarion-staging/storage/logs releases/${execution.to_revision.revision}/storage/logs
ln -s /srv/users/serverpilot/apps/cityofmarion-staging/storage/runtime releases/${execution.to_revision.revision}/storage/runtime
ln -s /srv/users/serverpilot/apps/cityofmarion-staging/storage/cpresources releases/${execution.to_revision.revision}/web/cpresources

echo "Linking current to revision: ${execution.to_revision.revision}"
rm -f public
ln -s releases/${execution.to_revision.revision}/web public

echo "Removing old releases"
cd releases && ls -t | tail -n +11 | xargs rm -rf

