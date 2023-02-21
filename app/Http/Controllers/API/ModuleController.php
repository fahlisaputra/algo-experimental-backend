<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AuthToken;
use App\Models\ModuleData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModuleController extends Controller
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

        $modules = ModuleData::where('user_id', $user->id)->get();
        foreach ($modules as $module) {
            $sub = [];
            $sub['id'] = $module->id;
            $sub['module_id'] = $module->module->id;
            $sub['name'] = $module->module->name;
            $sub['description'] = $module->module->description;
            $sub['image'] = $module->module->image;
            $sub['progress'] = $module->progress;
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
