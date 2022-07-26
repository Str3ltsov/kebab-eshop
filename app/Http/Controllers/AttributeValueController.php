<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttributeValueRequest;
use App\Http\Requests\UpdateAttributeValueRequest;
use App\Services\AttributeValueService;
use App\Services\IAttributeValueService;
use Error;

class AttributeValueController extends AppBaseController
{
    use forSelector;

    private AttributeValueService $service;

    public function __construct(IAttributeValueService $iService)
    {
        $this->service = $iService;
    }

    public function index()
    {
        try {
            $attributeValues = $this->service->getAttributeValues();

            return view('attribute_values.index')
                ->with('attributeValues', $attributeValues);
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function create()
    {
        return view('attribute_values.create')
            ->with('attributes', $this->attributeForSelector());
    }

    public function store(CreateAttributeValueRequest $request)
    {
        try {
            $this->service->createAttributeValue($request);

            return redirect()
                ->route('attribute_values.index')
                ->with('success', __('messages.successCreateAttributeValue'));
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $attributeValue = $this->service->getAttributeValueById($id);

            return view('attribute_values.edit')
                ->with([
                    'attributeValue' => $attributeValue,
                    'attributes' => $this->attributeForSelector()
                ]);
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function update($id, UpdateAttributeValueRequest $request)
    {
        try {
            $attributeValue = $this->service->getAttributeValueById($id);

            $this->service->updateAttributeValue($attributeValue, $request);

            return redirect()
                ->route('attribute_values.index')
                ->with('success', __('messages.successUpdateAttributeValue'));
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $attributeValue = $this->service->getAttributeValueById($id);

            $this->service->deleteAttributeValue($attributeValue);

            return redirect()
                ->route('attribute_values.index')
                ->with('success', __('messages.successDeleteAttributeValue'));
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }
}
