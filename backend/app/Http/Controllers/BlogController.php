<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    /*
        URL: /blogs
        method: POST
    */
    public function getBlogs(Request $request)
    {
        try {
            // Validate inputs with more specific rules
            $validated = $request->validate([
                'paginate' => 'sometimes|integer|min:1|max:100',
                'group' => 'sometimes|boolean',
                'only_featured' => 'sometimes|boolean',
                'without_featured' => 'sometimes|boolean',
                'order_by' => 'sometimes|string|in:created_at,updated_at,title',
                'order_direction' => 'sometimes|string|in:asc,desc',
            ]);

            $paginateNumber = $validated['paginate'] ?? 10;
            $orderBy = $validated['order_by'] ?? 'created_at';
            $orderDirection = $validated['order_direction'] ?? 'desc';

            $query = Blog::query()
                ->orderBy($orderBy, $orderDirection);

            if (!empty($validated['group']) && $validated['group']) {
                $blogs = [
                    'featured' => (clone $query)->where('featured', true)->get(),
                    'non_featured' => (clone $query)->where('featured', false)->get(),
                ];
            } elseif (!empty($validated['only_featured']) && $validated['only_featured']) {
                $blogs = (clone $query)
                    ->where('featured', true)
                    ->paginate($paginateNumber);
            } elseif (!empty($validated['without_featured']) && $validated['without_featured']) {
                $blogs = (clone $query)
                    ->where('featured', false)
                    ->paginate($paginateNumber);
            } else {
                $blogs = $query->paginate($paginateNumber);
            }

            return $this->success('Blogs retrieved successfully', $blogs);

        } catch (ValidationException $e) {
            return $this->error('Validation failed', $e->errors(), 422);
        } catch (\Exception $e) {
            return $this->error('Failed to retrieve blogs', [$e->getMessage()], 500);
        }
    }


}
