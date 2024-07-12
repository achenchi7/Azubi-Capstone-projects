FROM php:8.1-apache

COPY index1.html /var/www/html/
COPY uploader.php /var/www/html/

RUN mkdir -p /var/www/html/uploads

RUN chown -R www-data:www-data /var/www/html/uploads \
    && chmod -R 755 /var/www/html/uploads \
    && chgrp -R www-data /var/www/html \
    && find /var/www/html -type d -exec chmod g+rx {} + \
    && find /var/www/html -type f -exec chmod g+r {} + 


EXPOSE 80

CMD ["apache2-foreground"]