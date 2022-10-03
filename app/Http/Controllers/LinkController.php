<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function store(Request $request)
    {
        if ($request->token != 'sInTjxaBFeIriMQ1y2Mr') abort(404);
        $request->validate([
            'url' => 'required|url'
        ]);

        $code = Str::random(5);
        Link::query()->updateOrCreate([
            'url' => $request->url,
        ], [
            'code' => $code,
        ]);

        return response()->json([
            'code' => $code,
        ]);
    }

    public function show($code)
    {
        $link = Link::query()->where('code', $code)->firstOrFail();

        $device = 'web';
        if (preg_match('/iPhone|iPod/i', $_SERVER['HTTP_USER_AGENT'])) $device = 'iPhone';
        elseif (preg_match('/iPad/i', $_SERVER['HTTP_USER_AGENT'])) $device = 'iPad';
        elseif (preg_match('/android/i', $_SERVER['HTTP_USER_AGENT'])) $device = 'android';
        $link->visits()->create([
            'ip' => $_SERVER['REMOTE_ADDR'] ?? request()->ip(),
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? request()->userAgent(),
            'device' => $device,
            'protocol' => $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? null,
        ]);

        return redirect()->to($link->url);
    }
}
