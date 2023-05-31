<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CurrentOpening;
use App\Http\Resources\api\CurrentOpeningResource;
use Symfony\Component\HttpFoundation\Response;

class CurrentOpeningcontroller extends Controller
{

   /**
     * @api {get} /api/getopening  Get Current Opening
     * @apiVersion 1.0.0
     * @apiName current Opening
     * @apiGroup Quarec Resources
     * @apiDescription Get list of all active Current Opening.
     *
     *
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 200 OK
     * {
     *   "data": [
     *     {
     *      "title": "React js Developer [4-Posts] [Experience 0-3+ Years ]",
     *       "description": "<p><span style=\"color:#1abc9c\"><span style=\"font-size:18px\">"
     *       "<strong>Skill:</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:16px\">"
     *       "Quarec IT Solutions provides the best work culture where you can explore your skills and have a good career exposure.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">1.We are always on the look-out for creative out-of-the-box thinkers to </span></p>\r\n\r\n<p><span style=\"font-size:16px\">2.We are always on the look-out for creative out-of-the-box thinkers to</span></p>\r\n\r\n<p><span style=\"font-size:16px\">3.We are always on the look-out for creative out-of-the-box thinkers to</span></p>\r\n\r\n<p><span style=\"font-size:16px\">4.join our team. We offer outstanding professional development and competitive compensation and benefits. </span></p>\r\n\r\n<p><span style=\"font-size:16px\">5 Strengthen your skills and build a career working on exciting international projects!</span></p>"
     *   },
      *     {
     *      "title": "React js Developer [4-Posts] [Experience 0-3+ Years ]",
     *       "description": "<p><span style=\"color:#1abc9c\"><span style=\"font-size:18px\">"
     *       "<strong>Skill:</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:16px\">"
     *       "Quarec IT Solutions provides the best work culture where you can explore your skills and have a good career exposure.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">1.We are always on the look-out for creative out-of-the-box thinkers to </span></p>\r\n\r\n<p><span style=\"font-size:16px\">2.We are always on the look-out for creative out-of-the-box thinkers to</span></p>\r\n\r\n<p><span style=\"font-size:16px\">3.We are always on the look-out for creative out-of-the-box thinkers to</span></p>\r\n\r\n<p><span style=\"font-size:16px\">4.join our team. We offer outstanding professional development and competitive compensation and benefits. </span></p>\r\n\r\n<p><span style=\"font-size:16px\">5 Strengthen your skills and build a career working on exciting international projects!</span></p>"
     *   },
      *     {
     *      "title": "React js Developer [4-Posts] [Experience 0-3+ Years ]",
     *       "description": "<p><span style=\"color:#1abc9c\"><span style=\"font-size:18px\">"
     *       "<strong>Skill:</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:16px\">"
     *       "Quarec IT Solutions provides the best work culture where you can explore your skills and have a good career exposure.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">1.We are always on the look-out for creative out-of-the-box thinkers to </span></p>\r\n\r\n<p><span style=\"font-size:16px\">2.We are always on the look-out for creative out-of-the-box thinkers to</span></p>\r\n\r\n<p><span style=\"font-size:16px\">3.We are always on the look-out for creative out-of-the-box thinkers to</span></p>\r\n\r\n<p><span style=\"font-size:16px\">4.join our team. We offer outstanding professional development and competitive compensation and benefits. </span></p>\r\n\r\n<p><span style=\"font-size:16px\">5 Strengthen your skills and build a career working on exciting international projects!</span></p>"
     *   },
     *  ]..
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
    public function getCurrentOpening(){
      $currentOpening=CurrentOpening::all();
       $data = CurrentOpeningResource::collection($currentOpening);
      return response()->json(compact('data'), Response::HTTP_OK);
    }
}
