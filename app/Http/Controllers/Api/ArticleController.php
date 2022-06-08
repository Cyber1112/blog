<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Validator;
use App\Http\Resources\ArticleResource;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(){
        $data = Article::orderBy('updated_at', 'DESC')->get();
        return response()->json([$data, 'Articles fetched.']);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors());   
        }

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        // $files = $request->file('image');
        // $extension = $files->getClientOriginalExtension();
        // $path = $request->image->store('public/images');
        // $name = $request->image->getClientOriginalName();

        $article = Article::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'image_path' => $newImageName,
            'user_id' => Auth::id(),
        ]);
        return response()->json(['Article created successfully.', $article]);
    }

    public function show($id){
        $articles = Article::with(['comments'])->find($id);
        return response()->json($articles);
    }

    public function update(Request $request, Article $article){
        $article->update($request->all());
        return response()->json(['Article updated successfully.', $article]);
    }

    public function destroy(Article $article){
        $article->delete();

        return response()->json('Article deleted successfully');
    }
    
}
