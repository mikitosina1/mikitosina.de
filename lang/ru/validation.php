<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	'accepted' => 'Поле :attribute должно быть принято.',
	'accepted_if' => 'Поле :attribute должно быть принято, когда :other равно :value.',
	'active_url' => 'Поле :attribute должно быть действительным URL.',
	'after' => 'Поле :attribute должно быть датой после :date.',
	'after_or_equal' => 'Поле :attribute должно быть датой после или равной :date.',
	'alpha' => 'Поле :attribute должно содержать только буквы.',
	'alpha_dash' => 'Поле :attribute должно содержать только буквы, цифры, дефисы и подчеркивания.',
	'alpha_num' => 'Поле :attribute должно содержать только буквы и цифры.',
	'array' => 'Поле :attribute должно быть массивом.',
	'ascii' => 'Поле :attribute должно содержать только однобайтовые буквенно-цифровые символы и символы.',
	'before' => 'Поле :attribute должно быть датой перед :date.',
	'before_or_equal' => 'Поле :attribute должно быть датой перед или равной :date.',
	'between' => [
		'array' => 'Поле :attribute должно содержать от :min до :max элементов.',
		'file' => 'Поле :attribute должно быть от :min до :max килобайт.',
		'numeric' => 'Поле :attribute должно быть от :min до :max.',
		'string' => 'Поле :attribute должно быть от :min до :max символов.',
	],
	'boolean' => 'Поле :attribute должно быть true или false.',
	'confirmed' => 'Подтверждение поля :attribute не совпадает.',
	'current_password' => 'Пароль неверен.',
	'date' => 'Поле :attribute должно быть действительной датой.',
	'date_equals' => 'Поле :attribute должно быть датой, равной :date.',
	'date_format' => 'Поле :attribute должно соответствовать формату :format.',
	'decimal' => 'Поле :attribute должно иметь :decimal десятичных знаков.',
	'declined' => 'Поле :attribute должно быть отклонено.',
	'declined_if' => 'Поле :attribute должно быть отклонено, когда :other равно :value.',
	'different' => 'Поля :attribute и :other должны быть разными.',
	'digits' => 'Поле :attribute должно содержать :digits цифр.',
	'digits_between' => 'Поле :attribute должно быть от :min до :max цифр.',
	'dimensions' => 'Поле :attribute имеет недопустимые размеры изображения.',
	'distinct' => 'Поле :attribute имеет повторяющееся значение.',
	'doesnt_end_with' => 'Поле :attribute не должно заканчиваться ни одним из следующих: :values.',
	'doesnt_start_with' => 'Поле :attribute не должно начинаться ни с одного из следующих: :values.',
	'email' => 'Поле :attribute должно быть действительным адресом электронной почты.',
	'ends_with' => 'Поле :attribute должно заканчиваться одним из следующих: :values.',
	'enum' => 'Выбранное значение для :attribute недопустимо.',
	'exists' => 'Выбранное значение для :attribute недопустимо.',
	'file' => 'Поле :attribute должно быть файлом.',
	'filled' => 'Поле :attribute должно иметь значение.',
	'gt' => [
		'array' => 'Поле :attribute должно содержать более :value элементов.',
		'file' => 'Поле :attribute должно быть больше :value килобайт.',
		'numeric' => 'Поле :attribute должно быть больше :value.',
		'string' => 'Поле :attribute должно быть больше :value символов.',
	],
	'gte' => [
		'array' => 'Поле :attribute должно содержать :value элементов или больше.',
		'file' => 'Поле :attribute должно быть больше или равно :value килобайт.',
		'numeric' => 'Поле :attribute должно быть больше или равно :value.',
		'string' => 'Поле :attribute должно быть больше или равно :value символов.',
	],
	'image' => 'Поле :attribute должно быть изображением.',
	'in' => 'Выбранное значение для :attribute недопустимо.',
	'in_array' => 'Поле :attribute не существует в :other.',
	'integer' => 'Поле :attribute должно быть целым числом.',
	'ip' => 'Поле :attribute должно быть действительным IP-адресом.',
	'ipv4' => 'Поле :attribute должно быть действительным IPv4-адресом.',
	'ipv6' => 'Поле :attribute должно быть действительным IPv6-адресом.',
	'json' => 'Поле :attribute должно быть действительной JSON-строкой.',
	'lowercase' => 'Поле :attribute должно быть в нижнем регистре.',
	'lt' => [
		'array' => 'Поле :attribute должно содержать менее :value элементов.',
		'file' => 'Поле :attribute должно быть меньше :value килобайт.',
		'numeric' => 'Поле :attribute должно быть меньше :value.',
		'string' => 'Поле :attribute должно быть меньше :value символов.',
	],
	'lte' => [
		'array' => 'Поле :attribute не должно содержать более :value элементов.',
		'file' => 'Поле :attribute должно быть меньше или равно :value килобайт.',
		'numeric' => 'Поле :attribute должно быть меньше или равно :value.',
		'string' => 'Поле :attribute должно быть меньше или равно :value символов.',
	],
	'mac_address' => 'Поле :attribute должно быть действительным MAC-адресом.',
	'max' => [
		'array' => 'Поле :attribute не должно содержать более :max элементов.',
		'file' => 'Поле :attribute не должно быть больше :max килобайт.',
		'numeric' => 'Поле :attribute не должно быть больше :max.',
		'string' => 'Поле :attribute не должно быть больше :max символов.',
	],
	'max_digits' => 'Поле :attribute не должно содержать более :max цифр.',
	'mimes' => 'Поле :attribute должно быть файлом типа: :values.',
	'mimetypes' => 'Поле :attribute должно быть файлом типа: :values.',
	'min' => [
		'array' => 'Поле :attribute должно содержать не менее :min элементов.',
		'file' => 'Поле :attribute должно быть не менее :min килобайт.',
		'numeric' => 'Поле :attribute должно быть не менее :min.',
		'string' => 'Поле :attribute должно быть не менее :min символов.',
	],
	'min_digits' => 'Поле :attribute должно содержать не менее :min цифр.',
	'missing' => 'Поле :attribute должно быть отсутствующим.',
	'missing_if' => 'Поле :attribute должно отсутствовать, когда :other равно :value.',
	'missing_unless' => 'Поле :attribute должно отсутствовать, если :other не входит в :values.',
	'missing_with' => 'Поле :attribute должно отсутствовать, когда :values присутствует.',
	'missing_with_all' => 'Поле :attribute должно отсутствовать, когда присутствуют :values.',
	'multiple_of' => 'Поле :attribute должно быть кратным :value.',
	'not_in' => 'Выбранное значение для :attribute недопустимо.',
	'not_regex' => 'Формат поля :attribute недействителен.',
	'numeric' => 'Поле :attribute должно быть числом.',
	'password' => [
		'letters' => 'Поле :attribute должно содержать по крайней мере одну букву.',
		'mixed' => 'Поле :attribute должно содержать по крайней мере одну заглавную букву и одну строчную букву.',
		'numbers' => 'Поле :attribute должно содержать по крайней мере одну цифру.',
		'symbols' => 'Поле :attribute должно содержать по крайней мере один символ.',
		'uncompromised' => 'Указанное :attribute появилось в утечке данных. Пожалуйста, выберите другое :attribute.',
	],
	'present' => 'Поле :attribute должно присутствовать.',
	'prohibited' => 'Поле :attribute запрещено.',
	'prohibited_if' => 'Поле :attribute запрещено, когда :other равно :value.',
	'prohibited_unless' => 'Поле :attribute запрещено, если :other не входит в :values.',
	'prohibits' => 'Поле :attribute запрещает наличие :other.',
	'regex' => 'Формат поля :attribute недействителен.',
	'required' => 'Поле :attribute обязательно для заполнения.',
	'required_array_keys' => 'Поле :attribute должно содержать записи для: :values.',
	'required_if' => 'Поле :attribute обязательно, когда :other равно :value.',
	'required_if_accepted' => 'Поле :attribute обязательн',    'required_unless' => 'Поле :attribute обязательно, если :other не входит в :values.',
	'required_with' => 'Поле :attribute обязательно, когда присутствует :values.',
	'required_with_all' => 'Поле :attribute обязательно, когда присутствуют :values.',
	'required_without' => 'Поле :attribute обязательно, когда отсутствует :values.',
	'required_without_all' => 'Поле :attribute обязательно, когда отсутствуют все :values.',
	'same' => 'Поле :attribute должно совпадать с :other.',
	'size' => [
		'array' => 'Поле :attribute должно содержать :size элементов.',
		'file' => 'Поле :attribute должно быть :size килобайт.',
		'numeric' => 'Поле :attribute должно быть размером :size.',
		'string' => 'Поле :attribute должно быть :size символов.',
	],
	'starts_with' => 'Поле :attribute должно начинаться с одного из следующих: :values.',
	'string' => 'Поле :attribute должно быть строкой.',
	'timezone' => 'Поле :attribute должно быть допустимым часовым поясом.',
	'unique' => 'Поле :attribute уже занято.',
	'uploaded' => 'Не удалось загрузить :attribute.',
	'uppercase' => 'Поле :attribute должно быть в верхнем регистре.',
	'url' => 'Поле :attribute должно быть действительным URL.',
	'ulid' => 'Поле :attribute должно быть допустимым ULID.',
	'uuid' => 'Поле :attribute должно быть допустимым UUID.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'пользовательское-сообщение',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap our attribute placeholder
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". This simply helps us make our message more expressive.
	|
	*/

	'attributes' => [],

];

