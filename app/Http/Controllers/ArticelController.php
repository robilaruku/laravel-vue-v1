<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticleRepository;

class ArticelController extends Controller
{
    private $ArticleRepository;

    public function __construct(ArticleRepository $ArticleRepository)
    {
        $this->ArticleRepository = $ArticleRepository;
    }


    public function index()
    {
        $articles = $this->ArticleRepository->all();

        return $articles->toJson();
    }

    public function store(ArticleRequest $request)
    {
        $input = $request->all();

        $this->ArticleRepository->create($input);

         $msg = [
             'success' => true,
             'message' => 'Articel has been saved',
         ];

         return response()->json($msg);
    }


    public function getArticle($id)
    {
        $article = $this->ArticleRepository->findOrFail($id);

        return $article->toJson();
    }

    public function update($id, ArticleRequest $request)
    {
        $article = $this->ArticleRepository->find($id);

        if (empty($article)) {
            $msg = [
                'success' => false,
                'message' => 'Article deleted failed!'
            ];
            return response()->json($msg);
        }

        $input = $request->all();

        $article = $this->ArticleRepository->update($input, $id);

        $msg = [
            'success' => true,
            'message' => 'Articel has been updated',
        ];

        return response()->json($msg);

    }

    public function delete($id)
    {
        $article = $this->ArticleRepository->find($id);

        if (empty($article)) {
            $msg = [
                'success' => false,
                'message' => 'Article deleted failed!'
            ];
            return response()->json($msg);
        }

        $this->ArticleRepository->delete($id);

        $msg = [
            'success' => true,
            'message' => 'Articel has been deleted',
        ];

        return response()->json($msg);

    }
}
