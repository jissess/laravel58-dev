#### 新拉下来后需要执行以下操作才可顺利执行
```$xslt
php artisan key:generate    //生成app_key
php artisan jwt:secret      //生成jwt-secret
php artisan migrate         //迁移文件创建表
php artisan db:seed         //填充数据到新创建的表里
```