<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use App\Models\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;

class ConfigController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = Config::getData();
        $data['galleries'] = Gallery::all();
        return view('admin.config.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(ConfigRequest $request)
    {
        $form = array_filter($request->validated());
        Config::where('id', '>', 0)->delete();
        foreach($form as $key => $val){
            $config = new Config();
            $config->key = $key;
            $config->value = $val;
            $config->save();
        }
        return redirect()->back()->with('success', 'Configurações atualizadas com sucesso!');
    }
}
