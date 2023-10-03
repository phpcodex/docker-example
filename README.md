# Docker Example

This example has been created for us to understand how we 
would use Docker. Docker is a container service which allows
us to create applications which will run exactly the
same - no matter the machine we run docker on.

#### Something to note
 - On Windows 7 - You must install Docker Tools
 - On Windows 10 - Standalone Docker is fine
 - On all versions of Windows - You must disable Virtualisation in
 BIOS. This would potentially stop other things from working though
 such as Vagrant virtual machine, VMWare and more.
 
 #### Docker Basics
 Everything should start with a Dockerfile. If you wish to run
 multiple services or perform multiple actions, you may want
 to back this up with a docker-compose.yml which will also
 run your Dockerfile in the build process.
 
 Docker images should be as small as possible, this also helps
 when it comes to spinning up a new container or more as smaller
 images download quicker - This is assuming we are using AWS,
 GCC or Azure.
 
 You `can` create an image with your stack entirely configured,
 however, that would also mean that a `code change` is also
 an `image change` - in effect, you double the work in order
 to make simple changes.
 
 #### This Example
 Here, we are pulling an image `php:7.2.7-fpm-alpine3.7` and letting
 the provider of that image, maintain the image. We could download
 it and upload it to a private `Docker Hub` or similar space.
 
 The docker files should be part of your project code, this
 means that someone can just `git clone` your project and run
 the follwing:
 
    docker-compose up --force-recreate --build

You can just run `docker-composer up` but in the event something
has changed on the docker files, we might as well just re-create
and re-build the environment.

By separating all the services out, we make it easier to manage
and implement future changes. For example, the services we have
are as follows

    - composer
    - php
    - apache
    - mysql
    
Each of these services will perform a function. PHP is the PHP
runtime, which will be plugged into the Apache Web Service and
composer will create our vendor folder.

As these docker files are part of our project, we don't need to
clone our project from a repository (See the composer Dockerfile)
but if we was using a cloud solution for this, we would need
to clone the project in.    
        
 #### This to always exclude
  - vendor folder
  - .env files (But you can have a .env-example)
  - test files (Such as dummy data / testing data).
  
  This is so that when someone downloads the project, they are
  always working with a fresh and clean installation. We should
  look to always include the minimal amount so there is less
  to maintain but there should also be next to nothing for the
  developer to do, except sort out the environment configuration
  to get up and running.
  
  #### On a Running Container
  
 You can login to a container by using the following, this will
 give you SSH access, you can install `vim` or another text editor
 and make changes to your `.env` file.
 
 NOTE: exporting environment variables inside the container doesn't
 work.
 
    docker exec -it [container hash] /bin/bash
    
The above command gets us in to the container and now we can
look at log files - however, if we had log files within our
containers, we should actually be piping that data outside of
the container itself.