<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

/**
     * @api {get} /api/getcategory Get Categories
     * @apiVersion 1.0.0
     * @apiName Categories
     * @apiGroup Quarec Resources
     * @apiDescription Get list of all active categories.
     *
     *
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     *  "category": [
     *     "Web Development",
     *     "App Development",
     *     "UI-UX Design",
     *     "Graphic Design",
     *     "Digital Marketing"
     *   ]
     *  }
     *
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "category":[]
     * }
     *
     * @apiError (500 Internal Server Error) InternalServerError The server encountered an internal error
     */
    
 public function getCategory(Request $request)
    {
        $category=Category::pluck('name');

        // $data = FaqResource::collection($faq);

        return response()->json(compact('category'), Response::HTTP_OK);

    }
  
}
