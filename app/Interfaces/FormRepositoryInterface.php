<?php

namespace App\Interfaces;

interface FormRepositoryInterface
{
    public function getAllForms();
    public function createForm(array $data);
    public function getFormById($id);
    public function updateForm($id, array $data);
    public function deleteForm($id);
}
