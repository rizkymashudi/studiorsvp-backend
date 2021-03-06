<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssetModel;
use App\Http\Requests\Admin\StudioAssetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class StudioAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = AssetModel::all();
        return view('pages.admin.StudioAsset.index', [ 'assets' => $assets ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.StudioAsset.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudioAssetRequest $request)
    {
       
        $data = $request->all();
        
        if($request->validated()):
            if(!$request->hasFile('imgAsset')):
                AssetModel::create($data);
                $data['slug'] = Str::slug($request->item_name);

            else:
                $data['slug'] = Str::slug($request->item_name);
                $data['image'] = $request->file('imgAsset')->store('assets/studio-assets', 'public');
                AssetModel::create($data);

            endif;

            Alert::toast('Data berhasil diubah', 'success');
            return redirect()->route('assets.index');
        endif; 

        Alert::toast('Gagal mengubah data', 'error');
        return redirect()->route('assets.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset = AssetModel::findOrFail($id);
        return view('pages.admin.StudioAsset.edit')->with(['asset' => $asset]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudioAssetRequest $request, $id)
    {
        $data = $request->all();
        
        if($request->validated()):
            if(!$request->hasFile('imgAsset')):
                $asset = AssetModel::findOrFail($id);
                $data['slug'] = Str::slug($request->item_name);
                $asset->update($data);

            else:
                $data['slug'] = Str::slug($request->item_name);
                $data['image'] = $request->file('imgAsset')->store('assets/studio-assets', 'public');
                $asset = AssetModel::findOrFail($id);
                $asset->update($data);

            endif;

            Alert::toast('Data berhasil diubah', 'success');
            return redirect()->route('assets.index');
        endif; 

        Alert::toast('Gagal mengubah data', 'error');
        return redirect()->route('assets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asset = AssetModel::findOrFail($id);
        $asset->delete();

        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->route('assets.index');
    }
}
