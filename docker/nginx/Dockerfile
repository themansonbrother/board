FROM nginx:alpine

ADD ./default.conf /etc/nginx/conf.d/default.conf

RUN apk update \
    && apk upgrade \
    && apk add --no-cache bash

RUN apk add --no-cache curl

EXPOSE 80 433
