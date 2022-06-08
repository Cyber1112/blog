<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Validator;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'content' => 'required|string',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors());   
        }

        if(!Auth::check()){
            return response()->json('You are not authorized', 401); 
        }
        $article = Article::where('slug', $request->slug)->first();
        if(!$article){
            return response()->json('No such article found', 404); 
        }
        $comment = Comment::create([
            'article_id' => $article->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);
        return response()->json(['Comment created successfully.', $comment]);
    }
    public function show(){
        
    }
}
