<h1 align="center"> BaimoCMS core Module</h1>

<p align="center"> .</p>


### 安装扩展包

```shell
$ composer require baimo/core -vvv
```

### 安装BaimoCMS
```shell
$ php artisan baimocms:install
```

### 安装过程中遇到的问题:
1. 如果指定的Mysql没有权限,尝试执行下面的语句
    ```mysql
    GRANT ALL PRIVILEGES ON *.* TO `admin`@`%`
    ```
### 遗留问题
1. 清除数据库默认的迁移文件
2. 数据库迁移文件发布
3. 命令行安装完成后修改.env文件的数据库相关内容
4. 删除不需要发布的文件的相关逻辑,在src/Providers/ModulesServiceProvider.php文件里(删除没用的逻辑)


### 贡献

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/baimo/core/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/baimo/core/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT