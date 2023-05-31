<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Portfolio;
use App\Http\Resources\api\PortfolioResource;
use Symfony\Component\HttpFoundation\Response;

class PortfolioController extends Controller
{

/**
     * @api {get} /api/getportfolio Get Portfolio
     * @apiVersion 1.0.0
     * @apiName Portfolio
     * @apiGroup Quarec Resources
     * @apiDescription Get list of all active Portfolio.
     *
     *
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "data": [
     *   {
     *      "id": 1,
     *      "portfolio_category": "Web Development",
     *      "title": "Barone LLC",
     *      "tags": null,
     *      "description": "Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt mollit dolore cillum minim tempor enim. Elit aute irure tempor cupidatat incididunt sint deserunt ut voluptate aute id deserunt nisi",
     *      "portfolio_image": "/uploads/portfolio/"
     *  },
     *   {
     *      "id": 2,
     *      "portfolio_category": "Web Development",
     *      "title": "Barone LLC",
     *      "tags": null,
     *      "description": "Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt mollit dolore cillum minim tempor enim. Elit aute irure tempor cupidatat incididunt sint deserunt ut voluptate aute id deserunt nisi",
     *      "portfolio_image": "/uploads/portfolio/"
     *  },
     *  {
     *      "id": 3,
     *      "portfolio_category": "Web Development",
     *      "title": "Barone LLC",
     *      "tags": null,
     *      "description": "Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt mollit dolore cillum minim tempor enim. Elit aute irure tempor cupidatat incididunt sint deserunt ut voluptate aute id deserunt nisi",
     *      "portfolio_image": "/uploads/portfolio/"
     *  },
     *    ]..
     *  }
     *
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "data":[]
     * }
     *
     * @apiError (500 Internal Server Error) InternalServerError The server encountered an internal error
     */



 public function getPortfolio($name=null)
    {
        $category= $name?Portfolio::Where(['portfolio_category'=>$name])->get():Portfolio::all();
        $data = PortfolioResource::collection($category);
        return response()->json(compact('data'), Response::HTTP_OK);

    }  
}
