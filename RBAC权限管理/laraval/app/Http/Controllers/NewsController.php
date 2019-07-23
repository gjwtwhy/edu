<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
class NewsController extends Controller
{
    //
    public function index(Request $request){
        $title = $request->get('title');
        $author = $request->get('author');

        if (empty($title) && empty($author)) {
            $news = News::orderBy('id', 'desc')->paginate(2);
        } else {
            $news = News::orderBy('id','desc');
            if ($title){
                $news->where('title','like','%'.$title.'%');
            }
            if ($author){
                $news->where('author','like','%'.$author.'%');
            }
            $news = $news->paginate(2);
        }
        //渲染视图页面
        return view('news',['list'=>$news]);
    }

    /**
     * 保存
     */
    public function save(Request $request){
        $this->validate($request, [
            'title' => 'required|max:15',
            'content' => 'required',
        ],[
            'title.required'=>'标题不能为空',
            'title.max'=>'标题最大长度不能超过7个汉字',
            'content.required'=>'内容不能为空'
        ]);

        //接收参数
        $title = $request->post('title');
        $content = $request->post('content');
        $author = $request->post('author');
        $id = $request->post('id');

        //数据入库
        if ($id){
            $objnews = News::find($id);
        } else {
            $objnews = new News();
        }

        $objnews->title = $title;
        $objnews->content = $content;
        $objnews->author = $author;
        $objnews->save();

        //跳转
        return redirect('/news');
    }

    /**
     * 修改
     * @param $id
     */
    public function update($id){
        //查该id数据
        $info = News::find($id);
       // var_dump($info);exit;
        return view('news.update',['info'=>$info]);
    }

    public function delete($id){
        News::destroy($id);
        return redirect('/news');
    }

    /**
     * 修改标题
     * @param Request $request
     */
    public function updateTitle(Request $request){
        //接值
        $id = $request->id;
        $title = $request->title;

        //修改
        $objnews = News::find($id);
        $objnews->title = $title;
        $objnews->save();

        //返回
        return response()->json(['code'=>200]);
    }
}
