<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Validator;

/**
 * @method static count()
 * @method static paginate(int $int)
 */
class User extends Model
{
	/**
	* 关联到模型的数据表
	*
	* @var string
	*/
    protected $table = 'admin_user';

    public function createUser ($data) {

        $validateCode = $this -> checkCreate($data);

        if (!$validateCode['code']){
            return $validateCode;
        }

        $this -> username = $data['username'];
        $this -> password = $data['password'];
        $this -> sex = $data['sex'];
        $this -> email = $data['email'];
        $result = $this -> save();

        if ($result) {
            return [
                'code' => 1,
                'message' => '添加成功'
            ];
        }else{
            return [
                'code' => 0,
                'message' => '添加失败'
            ];
        }
    }

    public function checkCreate ($data) {
        $validator = Validator::make($data, [
            'username' => 'required',
        ]);
        $result = [
            'code' => 1,
            'message' => '验证通过'
        ];
        if($validator->fails()){
            $result['code'] = 0;
            $result['message'] = $validator->messages()->first();
            return $result;
        }
        return $result;
    }
}
