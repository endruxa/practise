<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Comment;
use App\Article;
class CommentController extends Controller
{
    /**
     * Обработка формы - AJAX
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
	public function store(Request $request)
    {
		$data = $request->except('_token', 'comment_article_id', 'comment_parent');
		
		//добавляем поля с названиями как в таблице (модели)
		$data['article_id'] = $request->input('comment_article_id');
		$data['parent_id'] = $request->input('comment_parent');
		
		//устанавливаем статус в зависимости от настройки
		$data['status'] = config('comments.show_immediately');

		$user = Auth::user();

		if($user) {
			$data['user_id'] = $user->id;
			$data['name'] = (!empty($data['name'])) ? $data['name'] : $user->name;
			$data['email'] = (!empty($data['email'])) ? $data['email'] : $user->email;								
		}

		$validator = Validator::make($data,[
			'article_id' => 'integer|required',
			'text' => 'required|max:255',
			'name' => 'required|min:2|max:15',
			'email' => 'required|email',
		]);

		$comment = new Comment($data); 

		if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
		}

		$post = Article::find($data['article_id']);
		$post->comments()->save($comment);

		$data['id'] = $comment->id;
		$data['hash'] = md5($data['email']);
		$data['status'] = config('comments.show_immediately');

		$view_comment = view(env('THEME').'.comments.new_comment')->with('data', $data)->render();

        return response()->json(['success'=>true, 'comment'=>$view_comment, 'data'=>$data]);
	}
}
