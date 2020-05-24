<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\OurService;
use Illuminate\Http\Request;

class OurServiceController extends Controller
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
            $ourservices = OurService::where('active', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ourservices = OurService::latest()->paginate($perPage);
        }

        return view('admin.our-service.index', compact('ourservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ourService = new OurService(['active' => true]);
        return view('admin.our-service.create', compact('ourService'));
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
        
        $requestData = $request->all();
        
        OurService::create($requestData);

        return redirect('admin/our-service')->with('flash_message', 'OurService added!');
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
        $ourservice = OurService::findOrFail($id);

        return view('admin.our-service.show', compact('ourservice'));
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
        $ourService = OurService::findOrFail($id);

        return view('admin.our-service.edit', compact('ourService'));
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
        
        $requestData = $request->all();
        
        $ourservice = OurService::findOrFail($id);
        $ourservice->update($requestData);

        return redirect('admin/our-service')->with('flash_message', 'OurService updated!');
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
        OurService::destroy($id);

        return redirect('admin/our-service')->with('flash_message', 'OurService deleted!');
    }
}
