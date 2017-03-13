Feel free to use docker if you want, it has the setup for it.

If you choose to do so I was a little lazy so steps:

1) docker-compose up -d

2) docker exec -it nameofcontainer bash

3) php7.0-fpm start

4) find nginx.conf change sendfile off

This runs on nginx using PHP7 with dockerfiles

(May need to give permissions to storage if you get a blank page and 500 error)