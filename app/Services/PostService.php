<?php

declare(strict_types=1);

namespace App\Services;


use App\Contracts\Repositories\PostRepositoryContract;
use App\Contracts\Services\FileServiceContract;
use App\Contracts\Services\PostServiceContract;
use App\Contracts\Services\TagServiceContract;
use App\DataTransferObjects\PostDto;
use App\Models\Post;
use App\Repositories\RepositoryManager;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostService extends Service implements PostServiceContract
{
    public function __construct(
        private readonly PostRepositoryContract $repository,
        private readonly RepositoryManager      $manager,
        private readonly FileServiceContract    $fileService,
        private readonly TagServiceContract     $tagService,
    )
    {
        //
    }

    public function getItems(): Collection
    {
        return $this->repository->getItems();
    }

    public function getItemsWithPagination(): LengthAwarePaginator
    {
        return $this->repository->getItemsWithPagination();
    }

    public function getById(int $id): ?Post
    {
        return $this->repository->getById($id);
    }

    public function findByIdOrFail(int $id): Post
    {
        $role = $this->getById($id);

        if (!$role) {
            throw new NotFoundHttpException();
        }

        return $role;
    }

    public function create(array $data): Post
    {
        $file = $data['file'];
        $tags = explode(',', $data['tags']);
        $dto = PostDto::toInternal($data);
        return $this->manager->transaction(function () use ($dto, $file, $tags) {
            $fileData = $this->fileService->upload($file);
            $tags = $this->tagService->findOrCreate($tags);
            $item = $this->repository->create($dto, $tags, $fileData);

            return $item;
        });
    }

    public function update(Post $post, array $data): Post
    {
        $dto = PostDto::toInternal($data);

        return $this->repository->update($post, $dto);
    }

    public function delete(Post $post): void
    {
        $this->repository->delete($post);
    }
}

