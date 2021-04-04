# SynchroBundle


####routes.yaml

```
parallalax_synchro:
    resource: '@ParallalaxSynchroBundle/Resources/config/routes.yaml'
```

<br>

parallalax_synchro.yaml
```
parallalax_synchro:
    password: "%env(API_PASSWD)%"
    roles: "%env(API_ROLE)%"
```

<br>

####define API_PASSWD and API_ROLE in .env file

<br>

####security.yml
```
security:
    providers:
        api_users:
            memory:
                users:
                    api_user: { password: "%env(API_PASSWD)%", roles: ["%env(API_ROLE)%"] }
```

Add a firewall :
```
synchro:
    pattern: ^/synchro/
    provider: api_users
    http_basic:
        realm: Secured Area
```