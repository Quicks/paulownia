<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Treatise;
use Illuminate\Http\Request;

class TreatisesController extends Controller
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
            $treatises = Treatise::where('name', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->orWhere('active', 'LIKE', "%$keyword%")
                ->orWhere('publish_date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $treatises = Treatise::latest()->paginate($perPage);
        }

        return view('admin.treatises.index', compact('treatises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.treatises.create');
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
			'active' => 'required|boolean',
			'publish_date' => 'required|date'
		]);
        $requestData = $request->all();
        
        Treatise::create($requestData);

        return redirect('admin/treatises')->with('flash_message', 'Treatise added!');
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
        $treatise = Treatise::findOrFail($id);

        return view('admin.treatises.show', compact('treatise'));
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
        $treatise = Treatise::findOrFail($id);

        return view('admin.treatises.edit', compact('treatise'));
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
			'publish_date' => 'required|date'
		]);
        $requestData = $request->all();
        
        $treatise = Treatise::findOrFail($id);
        $treatise->update($requestData);

        return redirect('admin/treatises')->with('flash_message', 'Treatise updated!');
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
        Treatise::destroy($id);

        return redirect('admin/treatises')->with('flash_message', 'Treatise deleted!');
    }
}
