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
3. Commit the the message `chore: bump version to X.Y.Z`
4. Tag the release
```
git tag -a vX.Y.Z -m "vX.Y.Z"
git push origin master
git push origin --tags
```
5. Create a zip file for WordPress by running `git archive master -o zuari.zip` and [upload](https://wordpress.org/themes/upload/)
