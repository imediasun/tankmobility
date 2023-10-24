FROM debian:jessie

RUN printf "deb http://archive.debian.org/debian/ jessie main\ndeb-src http://archive.debian.org/debian/ jessie main\ndeb http://security.debian.org jessie/updates main\ndeb-src http://security.debian.org jessie/updates main" > /etc/apt/sources.list

RUN apt-get update && apt-get install -y --force-yes nginx openssl

RUN rm /etc/nginx/sites-available/default
RUN rm /etc/nginx/sites-enabled/default

RUN mkdir -p /etc/ssl/private

RUN openssl req -new -newkey rsa:4096 -nodes \
        -keyout /etc/ssl/private/app.wonderkind.test.key -out /etc/ssl/private/app.wonderkind.test.csr \
        -subj "/C=US/ST=Denial/L=Springfield/O=Dis/CN=app.wonderkind.test" \
    && openssl req -new -newkey rsa:4096 -days 365 -nodes -x509 \
           -subj "/C=US/ST=Denial/L=Springfield/O=Dis/CN=app.wonderkind.test" \
           -keyout /etc/ssl/private/app.wonderkind.test.key  -out /etc/ssl/private/app.wonderkind.test.crt

RUN openssl req -new -newkey rsa:4096 -nodes \
        -keyout /etc/ssl/private/spa.wonderkind.test.key -out /etc/ssl/private/spaa.wonderkind.test.csr \
        -subj "/C=US/ST=Denial/L=Springfield/O=Dis/CN=spa.wonderkind.test" \
    && openssl req -new -newkey rsa:4096 -days 365 -nodes -x509 \
           -subj "/C=US/ST=Denial/L=Springfield/O=Dis/CN=spa.wonderkind.test" \
           -keyout /etc/ssl/private/spa.wonderkind.test.key  -out /etc/ssl/private/spa.wonderkind.test.crt

EXPOSE 80 443

CMD ["nginx"]
