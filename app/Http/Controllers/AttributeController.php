<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Services\AttributeService;
use App\Services\IAttributeService;
use Error;

class AttributeController extends AppBaseController
{
    private AttributeService $service;

    public function __construct(IAttributeService $iService)
    {
        $this->service = $iService;
    }

    public function index()
    {
        try {
            $attributes = $this->service->getAttributes();

            return view('attributes.index')
                ->with('attributes', $attributes);
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function create()
    {
        return view('attributes.create');
    }

    public function store(CreateAttributeRequest $request)
    {
        try {
            $this->service->createAttribute($request);

            return redirect()
                ->route('attributes.index')
                ->with('success', __('messages.successCreateAttribute'));
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $attribute = $this->service->getAttributeById($id);

            return view('attributes.edit')
                ->with('attribute', $attribute);
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function update($id, UpdateAttributeRequest $request)
    {
        try {
            $attribute = $this->service->getAttributeById($id);

            $this->service->updateAttribute($attribute, $request);

            return redirect()
                ->route('attributes.index')
                ->with('success', __('messages.successUpdateAttribute'));
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $attribute = $this->service->getAttributeById($id);

            $this->service->deleteAttribute($attribute);

            return redirect()
                ->route('attributes.index')
                ->with('success', __('messages.successDeleteAttribute'));
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }
}
