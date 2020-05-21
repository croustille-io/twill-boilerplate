# Croustille Boilerplate

## Homestead

[Larger file uploads](https://murfitt.net/blog/getting-laravel-homestead-work-larger-file-uploads)

```
sudo vi /etc/nginx/nginx.conf
```

`sendfile off;`

`client_max_body_size 128M;`

```
nginx -s reload
```

## Hints

-   https://github.com/Astrotomic/laravel-translatable
