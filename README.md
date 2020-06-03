zuari
===

A WordPress theme to log your stream of life. To get started:

```
npm install
grunt
```

## Release
To create a new release for [WordPress.org](https://wordpress.org/themes/upload/):

1. Run `grunt watch`
2. Bump the version number in `style.scss`
3. See `git log` and update changelog in `readme.txt`
4. Commit the the message `chore: bump version to X.Y.Z`
5. Tag the release:
```
git tag -a vX.Y.Z -m "vX.Y.Z"
git push origin master
git push origin --tags
```
6. Create a zip file for WordPress by running `git archive master -o zuari.zip` and [upload](https://wordpress.org/themes/upload/)
7. Cut a new release on [Github](https://github.com/prtksxna/zuari/releases), copy over changelog from `readme.txt`
