<?php

/**
 * 用户Model
 */
class IndexModel extends Model
{
    /**
     * 自定义当前模型操作的数据库表名称，
     * 如果不指定默认为类名称的小写字符串，
     * 这里就是 item 表
     * @var string
     */
    public $_table = 'item';

    /**
     * 搜索功能，因为Sql父类里面没有现成的like搜索，
     * 所以需要自己写SQL语句，对数据库的操作应该都放
     * 在Model里面，然后提供给Controller直接调用
     * @param $title string 查询的关键词
     * @return array 返回的数据
     */
    public function search($keyword)
    {
        $sql = "select * from `$this->_table` where `item_name` like '%$keyword%'";
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }
}