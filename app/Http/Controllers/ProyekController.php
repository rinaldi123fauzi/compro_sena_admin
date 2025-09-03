<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Proses;
use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Models\Vendor;
use App\Models\Regional;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\RedirectResponse;


class ProyekController extends Controller
{
    //
    function list()
    {
        $title = 'Daftar Proyek';
        $proyek = DB::table('proyek')
            ->leftJoin('regional', 'proyek.regionalid', '=', 'regional.id')
            ->leftJoin('vendor', 'proyek.vendorid', '=', 'vendor.id')
            ->leftJoin('project', 'proyek.projectid', '=', 'project.id')
            ->select('proyek.*', 'regional.namaregional', 'vendor.namavendor', 'project.namaproject')
            ->get();
        return view('proyek.list', compact('proyek', 'title'));
    }



    function add()
    {
        $vendor = Vendor::all();
        $regional = Regional::all();
        $project = Project::all();

        return view('proyek.add', ['title' => 'Tambah Proyek', 'vendor' => $vendor, 'regional' => $regional, 'project' => $project]);
    }

    function store(Request $request)
    {

        $request->validate([
            'vendor' => 'required',
            'regional' => 'required',
            'project' => 'required',
        ], [
            'vendor.required' => 'Vendor tidak boleh kosong',
            'regional.required' => 'Regional tidak boleh kosong',
            'project.required' => 'Project tidak boleh kosong'
        ]);


        $datavendor = Vendor::where('id', $request->vendor)->first();
        $dataregional = Regional::where('id', $request->regional)->first();
        $dataproyek = Proyek::where([['vendorid', '=', $request->vendor], ['regionalid', '=', $request->regional]])->latest()->first();

        if ($dataproyek) {
            $kodeproyek = $datavendor->kodevendor . '-' . $dataregional->koderegional . '-' . sprintf('%03d', (int)substr($dataproyek->kodeproyek, -3) + 1);
        } else {
            $kodeproyek = $datavendor->kodevendor . '-' . $dataregional->koderegional . '-' . '001';
        }

        $dataproses = DB::table('m_proses')
            ->select('*')
            ->get();

        $proyek = Proyek::create([
            'kodeproyek' => $kodeproyek,
            'vendorid' => $request->vendor,
            'regionalid' => $request->regional,
            'projectid' =>  $request->project,
            'opr' =>  $request->opr,
            'ring' =>  $request->ring,
            'sonumb' =>  $request->sonumb,
            'siteid' =>  $request->siteid,
            'sitename' =>  $request->sitename,
            'spknomor' =>  $request->spknomor,
            'spkremark' =>  $request->spkremark,
            'ponomor' =>  $request->ponomor,
            'potanggal' =>  $request->potanggal,
            'nilaipo' =>  $request->nilaipo,
            'statusproyek' => '1',
        ]);
        $lastInsertedId = $proyek->id;

        foreach ($dataproses as $item) {
            Proses::create([
                'proyekid' => $lastInsertedId,
                'proses' => $item->proses,
                'namaproses' => $item->namaproses,
                'statusproses' =>  '1',
                'statusprosesdua' =>  '1',
            ]);
        }



        return redirect('proyek/add')->with('message', 'Proyek ' . $kodeproyek . ' berhasil ditambahkan');
    }

    function edit(string $id)
    {
        //dd(compact('vendor'));
        $title = 'Edit Proyek';
        $proyek = Proyek::findOrFail($id);
        $vendor = Vendor::all();
        $regional = Regional::all();
        $project = Project::all();
        return view('proyek.edit', ['title' => 'Edit Proyek', 'vendor' => $vendor, 'regional' => $regional, 'project' => $project, 'proyek' => $proyek]);
    }
    function update(Request $request, $id)
    {


        $proyek = Proyek::findOrFail($id);
        $request->validate(
            [
                'vendor' => 'required',
                'regional' => 'required',
                'project' => 'required',
            ],
            [
                'vendor.required' => 'Vendor tidak boleh kosong',
                'regional.required' => 'Regional tidak boleh kosong',
                'project.required' => 'Project tidak boleh kosong'
            ]
        );


        $datavendor = Vendor::where('id', $request->vendor)->first();
        $dataregional = Regional::where('id', $request->regional)->first();
        $dataproyek = Proyek::where([['vendorid', '=', $request->vendor], ['regionalid', '=', $request->regional]])->latest()->first();

        if ($proyek->vendorid == $request->vendor && $proyek->regionalid == $request->regional) {
            $kodeproyek = $proyek->kodeproyek;
        } else {
            if ($dataproyek) {
                $kodeproyek = $datavendor->kodevendor . '-' . $dataregional->koderegional . '-' . sprintf('%03d', (int)substr($dataproyek->kodeproyek, -3) + 1);
                echo '1' . $kodeproyek;
            } else {
                $kodeproyek = $datavendor->kodevendor . '-' . $dataregional->koderegional . '-' . '001';
                echo '2' . $kodeproyek;
            }
        }

        $proyek->update([
            'kodeproyek' => $kodeproyek,
            'vendorid' => $request->vendor,
            'regionalid' => $request->regional,
            'projectid' =>  $request->project,
            'opr' =>  $request->opr,
            'ring' =>  $request->ring,
            'sonumb' =>  $request->sonumb,
            'siteid' =>  $request->siteid,
            'sitename' =>  $request->sitename,
            'spknomor' =>  $request->spknomor,
            'spkremark' =>  $request->spkremark,
            'ponomor' =>  $request->ponomor,
            'potanggal' =>  $request->potanggal,
            'nilaipo' =>  $request->nilaipo,
            'statusproyek' => '1',
        ]);

        return redirect('proyek/edit/' . $id)->with('message', 'Project berhasil diubah');
    }

    public function destroy($id): RedirectResponse
    {
        $project = Proyek::findOrFail($id);
        $project->delete();
        return redirect()->route('proyek.list')->with(['message' => 'Data Berhasil Dihapus!']);
    }


    /* DETAIL */
    function detail(string $id)
    {
        $dataProyek = Proyek::where('id', $id)->first();
        $proyek = DB::table('proyek')
            ->leftJoin('regional', 'proyek.regionalid', '=', 'regional.id')
            ->leftJoin('vendor', 'proyek.vendorid', '=', 'vendor.id')
            ->leftJoin('project', 'proyek.projectid', '=', 'project.id')
            ->where('proyek.id', $id)
            ->select('proyek.*', 'regional.namaregional', 'vendor.namavendor', 'project.namaproject')
            ->first();

        if (!$dataProyek) {
            abort(404);
        } else {
            return view('proyek.detail', ['title' => 'Detail Proyek', 'dataproyek' => $proyek]);
        }
    }
}
