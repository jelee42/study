<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 사용자가 이 폼 리퀘스트를 주입받는 메서드에 접근할 권한이 있는지를 검사하여 서비스를 보호하는 일을 한다.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 유효성 검사 규칙을 정의한다.
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'content' => ['required', 'min:10'],
        ];
    }

    /**
     * 사용자 정의 유효성 검사 오류 메시지를 정의한다.
     * :attribute라는 특수한 자리 표시자를 이용하고 있다.
     * 이 자리 표시자는 필드 이름으로 교체된다.
     * @return array
     */
    public function messages()
    {
        return [
            'title' => '제목',
            'content' => '본문',
        ];
    }

    /**
     * 오류 메시지에 표시할 필드 이름을 사용자 친화적인 이름으로 바꿀 수 있다.
     * 이 메서드가 없다면 'title은(는) 필수 입력 항목입니다.'로 오류 메시지가 표시된다.
     * @return array
     */
    public function attributes()
    {
        return parent::attributes(); // TODO: Change the autogenerated stub
    }
}
