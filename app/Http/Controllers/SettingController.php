<?php

namespace App\Http\Controllers;

use App\Enums\SettingTypeEnum;
use App\Models\Setting;
use Illuminate\Http\Request;
use Exception;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $items = Setting::where('type', SettingTypeEnum::NORMAL)->latest()
                    ->paginate($perPage, ['id', 'key'])->withQueryString();
        return view('settings.index', [
            'items' => $items,
            'perPage' => $perPage
        ]);
    }

    public function switches()
    {
        $controls = [
            'airalo_env' => ['values' => ['sandbox', 'production']],
        ];
        $items = Setting::whereIn('key', array_keys($controls))
                ->where('type', SettingTypeEnum::DROPDOWN)
                ->get(['id', 'key', 'value']);
        $items = (!empty($items) && count($items)) ? $items->toArray() : [];

        foreach ($controls as $key => $value) {
            $keyExists = false;
            foreach ($items as &$item2) {
                if($item2['key'] === $key){
                    $keyExists = true;
                    $item2['values'] = $value['values'];
                    break;
                }
            }
            unset($item2);

            if(!$keyExists){
                $items[] = [
                    'id' => nanoid(),
                    'value' => '',
                    'key'=> $key, 'values'=> $value['values'],
                ];
            }
        }

        return view('settings.switches.index', ['items'=> $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        try {
            $item = Setting::create([
                'key' => nanoid(),
                'type' => SettingTypeEnum::NORMAL,
            ]);
            return response()->json([
                'success' => true,
                'redirect' => route('settings.edit', $item) ,
                'message' => 'Loading...',
                'resetForm' => true,
            ]);
        } catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors' => []
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('settings.edit', ['item' => $setting]);
    }

    public function save(Request $req)
    {
        $validated = $req->validate([
            'id' => ['required', 'string', 'max:36'],
            'key'=> ['required', 'string', 'max:255'],
            'value' => ['nullable', 'string'],
        ]);

        try {
            Setting::updateOrCreate(
                [ 'id'=> $validated['id'], 'key'=> $validated['key'] ],
                [ 'value' => $validated['value'], 'type'=> SettingTypeEnum::DROPDOWN ]
            );
        } catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors' => [],
            ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'Saved successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Setting $setting)
    {
        $validated = $req->validate([
            'key'=> ['required', 'string', 'max:255'],
            'value' => ['nullable', 'string'],
        ]);

        $validate['type'] = SettingTypeEnum::NORMAL;

        try {
            $setting->update($validated);
        } catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors' => [],
            ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'Saved successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        try {
            $setting->delete();
        } catch (Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors' => [],
            ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully'
        ]);
    }
}
