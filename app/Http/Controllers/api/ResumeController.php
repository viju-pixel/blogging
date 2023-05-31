<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Resume;
use App\Http\Resources\api\ResumeResource;
use App\Http\Requests\api\ResumeCreateRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;

class ResumeController extends Controller
{


   /**
     * @api {post} /api/addresume Add Resume
     * @apiVersion 1.0.0
     * @apiName  Resume
     * @apiGroup Profile
     * @apiDescription Add Resume for User.
     *
     *
     * @apiBody {String} name User Name
     * @apiBody {String} phone User Phone number
     * @apiBody {String} email User Email ID
     * @apiBody {String} message User message 
     * @apiBody {file}   resume User file upload 
     * @apiBody {String} position User job position 
     *
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 201 Created
     *   {
     *      "data": {
     *          "id": 1,
     *          "name": "mayank",
     *          "email": "vijaypratap002@gmail.com",
     *          "phone": "78787877773",
     *          "message": "hello  mayank",
     *          "resume": "resume/dNiK2t30ZJmZYMQmlkiBzRS1z1TDFHsF9m6nt4qJ.pdf",
     *          "position": "c++",
     *          "created_at": "2023-04-13T10:54:49.000000Z",
     *          "updated_at": "2023-04-13T11:17:20.000000Z"
     *     },
     *     "message": "Details saved Successfully"
     *   }
     *
     * @apiError (500 Internal Server Error) InternalServerError The server encountered an internal error
     */

 public function addResume(ResumeCreateRequest $request)
    {
        $userDetails = $request->only([
            'name',
            'phone' ,
            'email',
            'message',
            'position',
        ]);
         $userDetails['resume'] = $request->file('resume')->store('resume');

        $email=Resume::where('email',$request->email)->first();

        $message = trans('Details saved Successfully');

      if($email===null){
        $user = Resume::create($userDetails);
        $data = new ResumeResource($user);
        return response()->json(compact('data', 'message'), Response::HTTP_CREATED);
      }
      else{
        $email->update($userDetails);
        $data = new ResumeResource($email);
        return response()->json(compact('data', 'message'), Response::HTTP_CREATED);
      }
    }
  
}
