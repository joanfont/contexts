FROM library/php:7.1-alpine
MAINTAINER Joan Font <joanfont@gmail.com>

WORKDIR /code/

RUN apk --update add curl git zip unzip && \
    rm -f /var/cache/apk/*

ADD . /code/

ENTRYPOINT ["php"]
CMD ["-h"]
