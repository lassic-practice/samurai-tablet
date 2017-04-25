FROM mysql:5.6

# utf8サポート
RUN { \
    echo '[mysqld]'; \
    echo 'character-set-server = utf8'; \
    echo 'skip-character-set-client-handshake'; \
    echo 'collation-server = utf8_unicode_ci'; \
    echo 'init-connect=SET NAMES utf8'; \
    echo 'user=mysql'; \
    echo '[client]'; \
    echo 'default-character-set=utf8'; \
} > /etc/mysql/conf.d/charset.cnf

COPY ./db/samurai.sql /docker-entrypoint-initdb.d/samurai.sql
# setupを追記したentrypoint
COPY ./initdb.d/docker-entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
