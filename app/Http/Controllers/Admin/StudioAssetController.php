<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssetModel;
use App\Http\Requests\Admin\StudioAssetRequest;
use App\Models\LogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;
use Auth;

class StudioAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = AssetModel::orderBy('id', 'desc')->get();
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

            $user = Auth::user()->roles;
            LogModel::create([
                'action' => "CREATE",
                'user'  => $user,
                'description' => "$user menambahkan studio asset baru $request->item_name" 
            ]);

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

            $user = Auth::user()->roles;
            LogModel::create([
                'action' => "UPDATE",
                'user'  => $user,
                'description' => "$user melakukan perubahan pada studio asset $request->item_name" 
            ]);

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

        $user = Auth::user()->roles;
        LogModel::create([
            'action' => "DELETE",
            'user'  => $user,
            'description' => "$user menghapus data pada studio asset $asset->item_name" 
        ]);

        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->route('assets.index');
    }
}
