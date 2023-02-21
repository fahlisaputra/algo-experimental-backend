<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AuthToken;
use App\Models\Course;
use App\Models\CourseData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    public function get(Request $request)
    {
        $token = $request->bearerToken();
        $data = [];
        $user = AuthToken::where('token', $token)->first();

        if (!$user) {
            return response()->json([
                'code' => 401,
                'status' => 'HTTP_UNAUTHORIZED',
                'message' => 'Invalid token for authentication',
                'data' => null,
                'generated_at' => date('Y-m-d H:i:s'),
                'credit' => 'www.fahli.net'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = $user->user;

        $courses = CourseData::where('user_id', $user->id)->get();
        foreach ($courses as $course) {
            $sub = [];
            $sub['id'] = $course->course->id;
            $sub['name'] = $course->course->name;
            $sub['description'] = $course->course->description;
            $sub['estimated_duration'] = $course->course->estimated_duration;
            $sub['image'] = $course->course->image;
            $data[] = $sub;
        }

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Data retrieved successfully',
            'data' => $data,
            'generated_at' => date('Y-m-d H:i:s'),
            'credit' => 'www.fahli.net'
        ], Response::HTTP_OK);
    }
}
