<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class BaseService {

    protected static function failValidation(Validator $validator): void {
        $classNameWithNamespace = Str::lower(Str::replace('\\', '_', static::class));

        $messages = $validator->errors()->getMessages();

        $keyOfFirstMessage = key($messages);

        $firstMessage = Arr::first(Arr::flatten($messages));

        $keyTranslation = Str::replace('.', '_', $classNameWithNamespace . '_' . $keyOfFirstMessage .'_' . $firstMessage);

        throw new \Exception(trans($keyTranslation));
    }
}
