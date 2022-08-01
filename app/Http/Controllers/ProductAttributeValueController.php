<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductAttributeValueRequest;
use App\Http\Requests\UpdateProductAttributeValueRequest;
use App\Services\IProductAttributeValueService;
use App\Services\ProductAttributeValueService;
use Error;

class ProductAttributeValueController extends Controller
{
    use forSelector;

    private ProductAttributeValueService $service;

    public function __construct(IProductAttributeValueService $iService)
    {
        $this->service = $iService;
    }

    public function index($id)
    {
        try {
            $product = $this->service->getProductById($id);
            $productAttributeValues = $this->service->getProductAttributeValues($id);

            return view('product_attribute_values.index')
                ->with([
                    'product' => $product,
                    'productAttributeValues' => $productAttributeValues
                ]);
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function create($id)
    {
        try {
            $product = $this->service->getProductById($id);
            $attributeValues = $this->service->removeExistingProductAttributeValues(
                $id, $this->service->getAttributeValuesByProduct($id)
            );

            return view('product_attribute_values.create')
                ->with([
                    'product' => $product,
                    'attributeValues' => $attributeValues
                ]);
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function store($id, CreateProductAttributeValueRequest $request)
    {
        try {
            $product = $this->service->getProductById($id);
            $this->service->createProductAttributeValue($request, $product);

            return redirect()
                ->route('attributeValues', $id)
                ->with('success', __('messages.successCreateProductAttributeValue'));
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function edit($id, $attributeValueId)
    {
        try {
            $product = $this->service->getProductById($id);
            $productAttributeValue = $this->service->getProductAttributeValueById($attributeValueId);

            return view('product_attribute_values.edit')
                ->with([
                    'product' => $product,
                    'productAttributeValue' => $productAttributeValue
                ]);
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function update($id, $attributeValueId, UpdateProductAttributeValueRequest $request)
    {
        try {
            $productAttributeValue = $this->service->getProductAttributeValueById($attributeValueId);
            $this->service->updateProductAttributeValue($productAttributeValue, $request);

            return redirect()
                ->route('attributeValues', $id)
                ->with('success', __('messages.successUpdateProductAttributeValue'));
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function destroy($id, $attributeValueId)
    {
        try {
            $productAttributeValue = $this->service->getProductAttributeValueById($attributeValueId);
            $this->service->deleteProductAttributeValue($productAttributeValue);

            return redirect()
                ->route('attributeValues', $id)
                ->with('success', __('messages.successDeleteProductAttributeValue'));
        }
        catch (Error $error) {
            return back()->with('error', $error->getMessage());
        }
    }
}
