<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\JobPosition;
use Symfony\Component\HttpFoundation\Response;

class JobPositionController extends Controller
{

/**
     * @api {get} /api/job_title Get Job Position
     * @apiVersion 1.0.0
     * @apiName  Job Position
     * @apiGroup Quarec Resources
     * @apiDescription Get list of all active  Job Position.
     *
     *
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "position": [
     *          "Python",
     *          "Java",
     *          "PHP",
     *          "Full Stack developer",
     *          "MERN Stack"
     *        ]
     *  }
     *
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     *      "position":[]
     * }
     *
     * @apiError (500 Internal Server Error) InternalServerError The server encountered an internal error
     */

 public function getJobPosition(Request $request)
    {
        $position=JobPosition::pluck('name');

        // $data = FaqResource::collection($faq);

        return response()->json(compact('position'), Response::HTTP_OK);

    }
  
}
