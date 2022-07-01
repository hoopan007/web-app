# web-app

## 部署 PHP 项目容器
使用当前仓库运行docker-compose命令一键部署 PHP 项目服务容器。

### 拉取代码

```
git clone https://github.com/hoopan007/web-app.git
```

### 运行部署

```
# 进入项目目录
cd web-app

# 执行部署命令
docker-compose up -d

```

### 访问测试
服务容器全部部署启动后，本地访问连接测试各类服务运行情况

```
# nginx是否运行
http://127.0.0.1:8202/test.txt

# php是否运行
http://127.0.0.1:8202

# mysql是否运行
http://127.0.0.1:8202/db.php

# redis是否运行
http://127.0.0.1:8202/redis.php


```


