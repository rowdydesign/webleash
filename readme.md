# WebLeash

## Installation
Review all of the requirements and their version recommendations below. You could run into a lot of trouble when compiling the fronted assets if you stray from the recommended versions.

### Requirements

* [Composer](https://getcomposer.org/) (latest) - [global installation](https://getcomposer.org/doc/00-intro.md#globally) recommended
* [Node.js](https://nodejs.org) (v0.12.7 strongly recommended) - If you have trouble make sure you are using v0.12.7 or have a strong background in Node.js to use any other version. Only other version I have been able to get everything to compile with was v0.10.40
* [npm](https://www.npmjs.com) (3.3.x strongly recommended)
* [bower](http://bower.io/) (latest) - [global installation](http://bower.io/#install-bower) recommended
* [gulp.js](http://gulpjs.com/) (latest) - [global installation](https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md#1-install-gulp-globally) recommended

### Setup Directions

* Run "composer install" in the root folder of the application
* Run "npm install" in the root folder of the application
* Run "bower install" in the root folder of the application
* Edit .env with the appropriate values (review .env.example)
* Make sure the folder storage and it's sub folders are writable by you and your web server (777 may be necessary)

We are using gulp to compile the frontend assets. Currently the "watch" directive is broken, so "gulp" will need to be executed when a SASS or JS file is changed, along with when a new package is added via bower.
