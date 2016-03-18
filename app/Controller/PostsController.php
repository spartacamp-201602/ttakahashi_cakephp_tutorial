<?php
// コントローラ。。クラスの中でもXXXXControllerで定義
class PostsController extends AppController
{
    public $helpers = array ('Html','Form');


    public function index()
    {
        // $this->set をすることによって
        // view の中で下記のように変数が使えるようになる

        $options = array('limit'=>'');
        $this->set('posts',$this->Post->find('all',$options));
    }

// メソッドの中に$idを定義すると
// URLの後ろに記載されたデータが取得できる
// 例 /posts/show/123 => $idの中身が123と代入される
    public function show($id)
    {
        $post = $this->Post->findById($id);
        $this->set('post',$post);

    }

}