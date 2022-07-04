<?php

// 连接本地的 Redis 服务
$redis = new Redis();
// 连接的IP 地址，端口号
$redis->connect('redis', 6379);
echo "Connection to redis success";
// 查看服务是否运行
echo 'Server is running: '. $redis->ping();

