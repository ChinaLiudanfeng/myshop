<?php

namespace App\Http\Home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	
     /**
     * 模型的连接名称
     *
     * @var string
     */
    protected $connection = 'myshop';
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'user';
    //主键ID
    protected $primaryKey = 'id';
    /**
     * 指示模型是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;
   
}
