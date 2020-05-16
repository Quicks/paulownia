<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Certificate;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $certificates = Certificate::where('name', 'LIKE', "%$keyword%")
                ->orWhere('string1', 'LIKE', "%$keyword%")
                ->orWhere('string2', 'LIKE', "%$keyword%")
                ->orWhere('string3', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $certificates = Certificate::latest()->paginate($perPage);
        }

        return view('admin.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $certificate = new Certificate(['active' => true]);
        return view('admin.certificates.create', compact('certificate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|max:90',
			'active' => 'boolean',
			'string1' => 'required|max:200',
			'string2' => 'required|max:200',
			'string3' => 'required|max:200',
			'date' => 'required|date'
		]);
        $requestData = $request->all();
        
        Certificate::create($requestData);
        
        return redirect('admin/certificates')->with('flash_message', 'Certificate added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('admin.certificates.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);

        return view('admin.certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required|max:90',
			'active' => 'required|boolean',
			'string1' => 'required|max:200',
			'string2' => 'required|max:200',
			'string3' => 'required|max:200',
			'date' => 'required|date'
		]);
        $requestData = $request->all();
        
        $certificate = Certificate::findOrFail($id);
        $certificate->update($requestData);

        if($certificate->active && $certificate->wasChanged('active')) {
            $qrImage = QrCode::format('png')->size(500)
                 ->generate($certificate->qrCodeLink);
            Storage::put('/qr-codes/'.$certificate->qrCode.'.png', $qrImage);
        }

        return redirect('admin/certificates')->with('flash_message', 'Certificate updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);
        Storage::delete($certificate->qrCodeImage);
        Certificate::destroy($id);
        return redirect('admin/certificates')->with('flash_message', 'Certificate deleted!');
    }
}
