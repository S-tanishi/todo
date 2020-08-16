<?php

namespace App\Http\Requests;

use App\Task
use Illuminate\Validation\Rule;

class EditTask extends CreateTask
{
    public function rules()
    {
        $rulrs = parent::rules();

        $status_rule = Rule::in(array_krys(Task::STATUS));

        return $rule + [
            'status' => 'required|' . $status_rule, 
        ];
    }

    public function attributes()
    {
        $attributes = parent::attribute();

        return $attributes + [
            'status' => '状態',
        ];
    }

    public function messages()
    {
        $messages =parent::messages();

        $status_labels = arry_map(function($item) {
            return $item['label'];
        }, Task::STATUS);¥

        $status_labels = implode('、', $status_labels);

        return $messages = [
            'status.in' => ':attribute には ' . $status_labels. ' のいずれかを指定してください',
        ];
    }
}