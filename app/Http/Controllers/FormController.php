<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreFormRequest;
use App\Interfaces\FormRepositoryInterface;

use App\Models\Form;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HttpResponses;

    private FormRepositoryInterface $formRepository;

    public function __construct(FormRepositoryInterface $formRepository)
    {
        $this->formRepository = $formRepository;
    }

    public function index(): jsonResponse
    {
        return $this->formRepository->getAllForms();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormRequest $request): JsonResponse
    {

        return $this->formRepository->createForm($request->all());


    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form): JsonResponse
    {
        return $this->formRepository->getFormById($form->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form): JsonResponse
    {
      return  $this->formRepository->updateForm($form->id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        return $this->formRepository->deleteForm($form->id);
    }
}
