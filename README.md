# sunPHP

## 简述

**sunphp**是一款简单的PHP MVC框架

要求：

* PHP 5.4.0+

## 目录说明

```
sunphp                 根目录
├─application           应用目录
│  ├─controllers        控制器目录
│  ├─models             模块目录
│  ├─views              视图目录
├─config                配置文件目录
├─sunphp               框架核心目录
├─static                静态文件目录
├─index.php             入口文件
```

## 使用

### 1.克隆代码

```
git clone https://github.com/Sunnnnnnnn/sunphp.git

```

### 2. 创建数据库

在数据库中创建名为 mydb 的数据库，并插入两条记录，命令：

```
CREATE DATABASE `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mydb`;

CREATE TABLE `item` (
    `id` int(11) NOT NULL auto_increment,
    `item_name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
 
INSERT INTO `item` VALUES(1, 'sunphp');
INSERT INTO `item` VALUES(2, 'sunphp');
```

### 3.修改数据库配置文件

打开配置文件 config/config.php ，使之与自己的数据库匹配

```
$config['db']['host'] = '';
$config['db']['username'] = '';
$config['db']['password'] = '';
$config['db']['dbname'] = '';
```

### 4.配置Nginx或Apache
在Apache或Nginx中创建一个站点，把 mydb 设置为站点根目录（入口文件 index.php 所在的目录）。

然后设置单一入口， Apache服务器配置：
```
<IfModule mod_rewrite.c>
    # 打开Rerite功能
    RewriteEngine On

    # 如果请求的是真实存在的文件或目录，直接访问
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d

    # 如果访问的文件或目录不是真事存在，分发请求至 index.php
    RewriteRule . index.php
</IfModule>
```
Nginx服务器配置：
```
location / {
    # 重新向所有非真是存在的请求到index.php
    try_files $uri $uri/ /index.php$args;
}
```

### 5.测试访问

然后访问站点域名：http://localhost/ 就可以了。
