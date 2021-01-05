<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagFormRequest;
use App\Http\Resources\TagResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\TagService;
use Dev\Infrastructure\Models\Tag;

/**
 * Class TagController
 * @package App\Http\Controllers
 */
class TagController extends Controller
{
    /**
     * @var TagService $tagService
     */
    private $tagService;

    /**
     * TagController constructor.
     * @param TagService $tagService
     */
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $tags = $this->tagService->index();
        return TagResource::collection($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TagFormRequest $request
     * @return TagResource
     */
    public function store(TagFormRequest $request)
    {
        $tag = $this->tagService->create($request->validated());
        return (new TagResource($tag))
            ->additional(ResponseType::simpleResponse('Tag has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  Tag $tag
     * @return TagResource
     */
    public function show(Tag $tag)
    {
        $tag = $this->tagService->show($tag->id);
        return new TagResource($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagFormRequest $request
     * @param  Tag $tag
     * @return TagResource
     */
    public function update(TagFormRequest $request, Tag $tag)
    {
        $tag = $this->tagService->update($tag->id, $request->validated());
        return (new TagResource($tag))->additional(ResponseType::simpleResponse('Tag has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag $tag
     * @return TagResource
     */
    public function destroy(Tag $tag)
    {
        $this->tagService->delete($tag);
        return new TagResource(ResponseType::simpleResponse('Tag has been deleted', true));
    }
}
