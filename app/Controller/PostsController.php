<?php
// コントローラ。。クラスの中でもXXXXControllerで定義
class PostsController extends AppController
{
    public $helpers = array ('Html','Form');

    public $components = array('Flash');

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
    public function add()
    {
        if($this->request->is('post'))
        {
            if($this->Post->save($this->request->data))
            {   //保存に成功した場合
                // フラッシュメッセージ
                $this->Flash->success('新しい記事を追加しました');
                // リダイレクト
                return $this->redirect(array('action'=>'index'));
            }
        }else
        {
                return $this->Flash->error('保存できませんでした');
        }
    }

    public function delete($id)
    {
        if($this->request->is('get'))
        {
            // GETできた場合削除しない
            throw new MethodNotAllowedException();
        }


        if($this->Post->delete($id))
        {
            // 削除に成功した場合

            // フラッシュメッセージ
            $this->Flash->error('記事'. $id.'を削除しました');

            return $this->redirect(array('action'=>'index'));

        }


    }




}