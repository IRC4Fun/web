# IRC4Fun Website Tools

## deployment

1. clone the repo into your webroot
2. `composer install`
2. make sure inspircd has m_httpd.so m_httpd_stats.so loaded
3. add a local bind for stats on 8081:
`<bind address="127.0.0.1" port="8081" type="httpd">`
4. add gen_stats to a crontab for a user that can write in the webroot:
`* * * * * /var/www/html/gen_stats`
5. nginx config for pretty urls
