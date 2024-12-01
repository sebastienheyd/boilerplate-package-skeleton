<?php

namespace ~uc:vendor\~uc:package\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use ~uc:vendor\~uc:package\Models\~uc:resource;

class ~uc:resourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory
     */
    public function index()
    {
        return view('~package::~resource.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory
     */
    public function create()
    {
        return view('~package::~resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @throws ValidationException
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'label' => 'required',
        ],[],[
            'label' => __('~package::resource.~resource.properties.label')
        ]);

        $~resource = ~uc:resource::create($request->post());

        return redirect()
            ->route('~package.~resource.edit', $~resource)
            ->with('growl', [__('~package::resource.~resource.create_success'), 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  ~uc:resource  $~resource
     * @return Application|Factory
     */
    public function show(~uc:resource $~resource)
    {
        return view('~package::~resource.show', compact('~resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ~uc:resource  $~resource
     * @return Application|Factory
     */
    public function edit(~uc:resource $~resource)
    {
        return view('~package::~resource.edit', compact('~resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  ~uc:resource  $~resource
     *
     * @throws ValidationException
     * @return RedirectResponse
     */
    public function update(Request $request, ~uc:resource $~resource): RedirectResponse
    {
        $request->validate([
            'label' => 'required',
        ],[],[
            'label' => __('~package::resource.~resource.properties.label')
        ]);

        $~resource->update($request->post());

        return redirect()
            ->route('~package.~resource.edit', $~resource)
            ->with('growl', [__('~package::resource.~resource.update_success'), 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ~uc:resource  $~resource
     *
     * @throws Exception
     * @return JsonResponse
     */
    public function destroy(~uc:resource $~resource): JsonResponse
    {
        return response()->json(['success' => $~resource->delete() ?? false]);
    }
}
