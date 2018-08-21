# 構築手順

vagrant立ち上げ

```
# 初回起動
vagrant up --provision
vagrant ssh

# 二回目以降
vagrant up
vagrant ssh
```

## 環境変数

.env.sampleを.envにリネーム
設定を環境に合わせて変える

## DB作成

```
cd /vagrant
mysql -uroot -proot < ./database/20180521_create_database_take_it_easy.sql
```

## マイグレーション&シーディング

```
php artisan migrate
php artisan db:seed
```

## DocumentRoot変更

下記を変更

```httpd.conf
# 変更前
DocumentRoot "/var/www/html"
# 変更後
DocumentRoot "/vagrant/public"
```

## VirtualHost設定

一番下に追記

```httpd.conf
# VirtualHost
<virtualhost *:80>
    DocumentRoot "/vagrant/public"
    ServerName myblog.local.com
    ErrorLog "/var/log/httpd/myblog.local.com-error_log"
    CustomLog "/var/log/httpd/myblog.local.com-access_log" common
    <Directory /vagrant/public>
        Require all granted
        AllowOverride All
    </Directory>
</virtualhost>
```

## Apache再起動

```
systemctl restart httpd
```