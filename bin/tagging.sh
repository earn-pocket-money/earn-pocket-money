#!/usr/bin/env bash

set -e

if [[ "false" != "$TRAVIS_PULL_REQUEST" ]]; then
  echo "Not deploying pull requests."
  exit
fi

if [[ "master" != "$TRAVIS_BRANCH" ]]; then
  echo "Not on the 'master' branch."
  exit
fi

if [[ "7" != "$TRAVIS_PHP_VERSION" ]]; then
	echo "deploy only PHP 7"
	exit
fi

TAGNAME=$(grep -E "\Version: .+$" style.css | sed -e 's/Version: //')
GIT_TAG_EXISTS=$(git tag -l '$TAGNAME')
if [ -n "$GIT_TAG_EXISTS" ]; then
  echo "tag $TAGNAME already exists."
  exit
fi

git clone -b release --quiet git@github.com:earn-pocket-money/earn-pocket-money.git release
cd release
ls | xargs rm -rf
ls -la
rsync -auz --exclude="release" ../ .
rm -rf .editorconfig .gitignore .travis.yml .travis bin src gulpfile.js package.json yarn.lock node_modules
ls -la

git add -A
git commit -m "[ci skip] release branch update from travis $TRAVIS_COMMIT"

git tag "$TAGNAME"
git push origin release --tags
