<?php

namespace App\Repositories;

use App\Http\Resources\FormResource;
use App\Interfaces\FormRepositoryInterface;
use App\Models\Form;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\DB;

class FormRepository implements FormRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    use HttpResponses;

    public function getAllForms()
    {
        $forms = FormResource::collection(Form::select('id','title')->latest()->paginate(10));
        return $this->success(['data' => $forms->response()
            ->getData(true)

        ], 'Orders found.', 200);
    }

    public function createForm(array $data)
    {
        DB::beginTransaction();
        try {
            $form = Form::create(['title' => $data['title']]);
            $field_data = [];
            foreach ($data['fields'] as $field) {
                $field_data[] = [
                    'type' => $field['type'],
                    'name' => $field['name'],
                    'label' => $field['label'],
                    'placeholder' => $field['placeholder'],
                    'required' => $field['required'],
                    'validation_rules' => $field['validation_rules'] ?? null
                ];
            }
            $form->fields()->createMany($field_data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('Error', 400, ['error' => $e->getMessage()]);
        }
        return $this->success(['data' => $form->load('fields')], 'Form created successfully.', 201);

    }

    public function getFormById($id)
    {
        $form = Form::with('fields')->findOrFail($id);
        return $this->success(['data' => $form], 'Form Data get successfully.', 200);
    }

    public function updateForm($id, array $data)
    {
        DB::beginTransaction();
        try {
            $form = Form::findOrFail($id);
            $form->update(['title' => $data['title']]);

            foreach ($data['fields'] as $field) {
                $form->fields()->updateOrCreate(
                    ['name' => $field['name'], 'form_id' => $form->id], // Assuming 'name' and 'form_id' are unique identifiers for the fields
                    [
                        'type' => $field['type'],
                        'label' => $field['label'],
                        'placeholder' => $field['placeholder'],
                        'required' => $field['required'],
                        'validation_rules' => $field['validation_rules'],
                    ]
                );
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('Error', 400, ['error' => $e->getMessage()]);
        }
        return $this->success(['data' => $form->load('fields')], 'Form updated successfully.', 200);
    }

    public function deleteForm($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();
        return $this->success(['data' => $form], 'Form deleted successfully.', 200);
    }
}
