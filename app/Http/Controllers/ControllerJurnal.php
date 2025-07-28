<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Jurnal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class ControllerJurnal extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        //get all jurnals
        $jurnals = Jurnal::latest()->paginate(10);

        //render view with jurnals
        return view('jurnals.index', compact('jurnals'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('jurnals.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'kegiatan' => 'required|string',
            'dokumentasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
        ]);

        //upload image
        if ($request->hasFile('dokumentasi')) {
            $dokumentasi = $request->file('dokumentasi');
            $dokumentasi->storeAs('jurnals', $dokumentasi->hashName());
        }

        //create product
        Jurnal::create([
            'name'         => $request->name,
            'kegiatan'    => $request->kegiatan,
            'dokumentasi' => $dokumentasi->hashName(),
            'tanggal'     => $request->tanggal,
            'keterangan'  => $request->keterangan,
        ]);

        //redirect to index with success message
        return redirect()->route('jurnals.index')->with('success', 'Jurnal berhasil ditambahkan');
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(Jurnal $jurnal): View
    {
        return view('jurnals.show', compact('jurnal'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id)
    {
        $jurnal = Jurnal::findOrFail($id);
        return view('jurnals.edit', compact('jurnal'));
    }


    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, Jurnal $jurnal): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kegiatan' => 'required|string',
            'dokumentasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
        ]);


        if ($request->hasFile('dokumentasi')) {
            Storage::delete('jurnals/' . $jurnal->dokumentasi);

            $dokumentasi = $request->file('dokumentasi');
            $dokumentasi->storeAs('jurnals', $dokumentasi->hashName());

            $jurnal->update([
                'dokumentasi' => $dokumentasi->hashName(),
                'name' => $request->name,
                'kegiatan' => $request->kegiatan,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);
        } else {

            $jurnal->update([
                'name'         => $request->name,
                'kegiatan'   => $request->kegiatan,
                'tanggal'     => $request->tanggal,
                'keterangan'  => $request->keterangan,
            ]);
        }

        return redirect()->route('jurnals.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get jurnal by ID
        $jurnal = Jurnal::findOrFail($id);

        //delete image
        Storage::delete('jurnals/' . $jurnal->dokumentasi);

        //delete jurnal
        $jurnal->delete();

        //redirect to index
        return redirect()->route('jurnals.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
