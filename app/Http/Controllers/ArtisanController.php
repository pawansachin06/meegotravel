<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function command(Request $req)
    {
        $commands_arr = [
            'all-cache-clear' => [
                'command' => 'optimize:clear',
                'message' => 'All cache cleared',
            ],
            'cache-clear' => [
                'command' => 'cache:clear',
                'message' => 'Cache cleared',
            ],
        ];
        $command = $req->command;
        $command_keys = array_keys($commands_arr);

        if(!in_array($command, $command_keys)){
            return response()->json([
                'success'=> false, 'message'=> 'Unknown command',
            ]);
        }

        try {
            Artisan::call($commands_arr[$command]['command']);
        } catch(Exception $e) {
            return response()->json([
                'success'=> false, 'message'=> $e->getMessage(),
            ]);
        }

        return response()->json([
            'success'=> true, 'message'=> $commands_arr[$command]['message'],
        ]);
    }
}
