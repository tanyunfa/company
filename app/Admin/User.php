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


    protected $fillable = ['username', 'password', 'sex', 'email'];

    /**
     * 新增管理员
     * @param $data
     * @return array
     */
    public function createUser ($data) {

        $validateCode = $this -> checkCreate($data);

        if (!$validateCode['code']){
            return $validateCode;
        }

        $data['password']  = bcrypt($data['password']);
        $this -> fill($data);
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


    /**
     * 编辑管理员
     * @param $data
     * @return array
     */
    public function editUser ($data) {

        $validateCode = $this -> checkCreate($data);

        if (!$validateCode['code']){
            return $validateCode;
        }

        $model = $this->find($data['id']);
        $data['password']  = bcrypt($data['password']);
        $model -> fill($data);
        $result = $model -> save();

        if ($result) {
            return [
                'code' => 1,
                'message' => '编辑成功'
            ];
        }else{
            return [
                'code' => 0,
                'message' => '编辑失败'
            ];
        }
    }

    /**
     * 字段验证
     * @param $data
     * @return array
     */
    public function checkCreate ($data) {
        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
            'sex' => 'required',
            'email' => 'required|email',
        ], [
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'confirm_password.required' => '确认密码不能为空',
            'password.same' => '两次密码不一致',
            'sex.required' => '性别不能为空',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
        ]);
        $result = [
            'code' => 1,
            'message' => '验证通过'
        ];
        if($validator->fails()){
            $result['code'] = 0;
            $result['message'] = $validator->messages()->first();
        }
        return $result;
    }

    /**
     * 更新用户状态
     * @param $id
     * @return array
     */
    public function updateStatus ($data) {
        if ($data['status']) {
            $data['status'] = 0;
        }else{
            $data['status'] = 1;
        }
        $result = $this ->where('id',$data['id']) -> update([
            'status' => $data['status']
        ]);

        if ($result) {
            return [
                'code' => 1,
                'message' => '编辑成功'
            ];
        }else{
            return [
                'code' => 0,
                'message' => '编辑失败'
            ];
        }
    }
}
