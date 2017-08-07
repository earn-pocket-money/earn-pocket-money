#!/usr/bin/env bash

set -e

if [[ "false" != "$TRAVIS_PULL_REQUEST" ]]; then
  echo "Not deploying pull requests."
  exit
fi

if [[ "master" != "$TRAVIS_BRANCH" ]]; then
  echo "Not on the 'master' branch."
  #exit
fi

if [[ "7" != "$TRAVIS_PHP_VERSION" ]]; then
	echo "deploy only PHP 7"
	exit
fi

git clone -b release --quiet https://github.com/earn-pocket-money/earn-pocket-money.git release
cd release
ls | xargs rm -rf
ls -la
rsync -auz --exclude="release" ../ .
rm -rf .editorconfig .gitignore .travis.yml src gulpfile.js package.json yarn.lock
ls -la

git add -A
git status
git commit -m "[ci skip] release branch update from travis $TRAVIS_COMMIT"
git push origin release

git tag $(wp theme get earn-pocket-money --field=version)
git push origin --tags
