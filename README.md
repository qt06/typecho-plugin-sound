# typecho-plugin-sound
强大的 typecho 自定义提示音效插件
## 用法

1. 上传`Sound`文件夹到`usr/plugins`目录
2. 后台插件管理，启用即可

## 说明

根据页面类型、页面别名或者文章 ID 来调用不同的提示音效。
只要准备好相应的声音文件即可。

声音文件命名规则如下：
1. 基本原则是遵循 typecho 的 `is()`方法的规则
2. 首页的文件名为 `index.mp3`
3. 归档页面的文件名为 `archive.mp3`
4. 自定义页面的文件名为 `page_{slug}.mp3`， 其中`{slug}`是页面的别名，省略别名可以直接命名为 `page.mp3`
5. 文章页面的文件名为 `post_{cid}.mp3`， 其中 `{cid}` 是文章的 ID， 省略 ID 的话，可以命名为 `post.mp3`
6. 其他页面参考 `is()`方法

