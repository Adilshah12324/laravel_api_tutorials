<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use http\Env\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     * @return PostResource
     */
    public function index()
    {
        $post = Post::query()->paginate(10);

        return PostResource::Collection($post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return PostResource
     */
    public function store(StorePostRequest $request): PostResource
    {
        $created = Post::query()->create([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return new PostResource($created);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post): PostResource
    {

        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return JsonResponse
     */
    public function update(UpdatePostRequest $request, Post $post, $id): JsonResponse
    {
//        $updated = $post->update($request->only(['title','body']));

        $updated = $post->find($id)->update([
            'title' => $request->title ?? $post->title,
            'body' => $request->body ?? $post->body
        ]);

        if (!$updated){
            return new JsonResponse([
                'error' => [
                    'Failed to update'
                ],
            ],400);
        }
        return new JsonResponse([
               'data' => 'Data Updated Successfully',
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return JsonResponse
     */
    public function destroy(Post $post, $id): JsonResponse
    {
        $deleted = $post->find($id)->forceDelete();
        if (!$deleted){
            return new JsonResponse([
                'error' => [
                    'Failed to Delete'
                ],
            ],400);
        }
        return new JsonResponse([
            'data' => 'Data Deleted Successfully',
        ],200);

    }
}
