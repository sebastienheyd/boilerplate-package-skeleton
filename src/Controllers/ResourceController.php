<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;
use Yajra\DataTables\DataTables;
use :uc:vendor\:uc:package\Models\:uc:resource;

class :uc:resourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view(':package:::resource.index');
    }

    /**
     * Get datatable of the resource.
     *
     * @param DataTables $dataTables
     *
     * @link https://yajrabox.com/docs/laravel-datatables
     *
     * @throws Throwable
     * @return mixed
     */
    public function datatable(DataTables $dataTables)
    {
        return $dataTables->eloquent(:uc:resource::query())
            ->rawColumns(['buttons'])
            ->editColumn('buttons', function ($:resource) {
                return view(':package:::resource.listButtons', [':resource' => $:resource])->render();
            })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view(':package:::resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @throws ValidationException
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'label' => 'required',
        ]);

        $:resource = :uc:resource::create($request->post());

        return redirect()
            ->route(':package.:resource.edit', $:resource)
            ->with('growl', [__(':package:::resource.create_success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  :uc:resource  $:resource
     * @return Application|Factory|Response|View
     */
    public function show(:uc:resource $:resource)
    {
        return view(':package:::resource.show', compact(':resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  :uc:resource  $:resource
     * @return Application|Factory|Response|View
     */
    public function edit(:uc:resource $:resource)
    {
        return view(':package:::resource.edit', compact(':resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  :uc:resource  $:resource
     *
     * @throws ValidationException
     * @return RedirectResponse
     */
    public function update(Request $request, :uc:resource $:resource)
    {
        $this->validate($request, [
            'label' => 'required',
        ]);

        $:resource->update($request->post());

        return redirect()
            ->route(':package.:resource.edit', $:resource)
            ->with('growl', [__(':package:::resource.update_success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  :uc:resource  $:resource
     *
     * @throws Exception
     * @return JsonResponse
     */
    public function destroy(:uc:resource $:resource)
    {
        return response()->json(['success' => $:resource->delete() ?? false]);
    }
}
