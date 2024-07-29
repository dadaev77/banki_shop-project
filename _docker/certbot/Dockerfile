FROM certbot/certbot:latest

# Создание директорий и установка прав доступа
RUN mkdir -p /var/certbot/conf /var/certbot/www && \
    chmod -R 755 /var/certbot/conf /var/certbot/www

# Остальные команды
ENTRYPOINT ["/bin/sh", "-c", "trap exit TERM; while :; do certbot renew; sleep 12h & wait $${!}; done;"]
