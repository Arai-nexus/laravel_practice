<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditTask extends CreateTask
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // CreateTaskのルールを継承
        $rule = parent::rules();
        
        // タスクのキーを取得
        $status_rules = Rule::in(array_keys(Task::STATUS));


        return $rule + [
            'status' => 'required|' . $status_rules,
        ];
    }

    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態',
        ];
    }

    public function messages()
    {
        $messages = parent::messages();

        $status_labels = array_map(function($item){
            return $item['label']; 
        }, Task::STATUS);

        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attribute には' . ' ' . $status_labels . ' ' . 'のいずれかを指定してください。',
        ];
    }
}
