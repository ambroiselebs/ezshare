Ez share is a website to share files quickly and easily.

**------------------------------------------------**

Languages : 

PHP
HTML
CSS
JS

**------------------------------------------------**

đ - https://ezshare.tk/
đšī¸ - https://discord.me/ezcorp/

**------------------------------------------------**

/!\ automatic deletion is done with a server-side bash script /!\

đī¸ - delete.sh
```

find /var/www/html/ezshare/files/ -type f -mtime +2 -delete

```

â˛ī¸ - run.sh
```

while true
do
    /var/www/html/ezshare/delete.sh
    sleep 172800 #2 days
done

```

**------------------------------------------------**
