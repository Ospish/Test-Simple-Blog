<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessComment;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function like(Request $request): JsonResponse
    {
        $content = json_decode($request->getContent());

        $id = $request->id;
        $article = Article::find($id);

        $likes = $article->likes+1;
        $article->likes = $likes;

        $article->save();
        return response()->json(['id' => $id, 'likes' => $likes]);
    }

    public function view(Request $request): JsonResponse
    {
        $id = $request->id;
        $article = Article::find($id);

        $views = $article->views+1;
        $article->views = $views;

        $article->save();
        return response()->json(['id' => $id, 'views' => $views]);
    }

    /**
     * @throws ValidationException
     */
    public function comment(Request $request): JsonResponse
    {
        $content = json_decode($request->getContent());
        if ($content->title === "" || $content->body === "") {
            throw ValidationException::withMessages(['error' => 'Поле не заполнено']);
        }
        ProcessComment::dispatch($request->id, $content->title, $content->body);
        return response()->json(['id' => $request->id]);
    }
}
