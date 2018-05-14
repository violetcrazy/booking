{%- macro formGroupText(name, data) %}
    <div class="form-group m-form__group row">
        <label for="{{ data['id'] }}" class="col-3 col-form-label">
            {{ data['label'] }}
        </label>

        <div class="col-9">
            <input class="form-control m-input" name="{{ name }}" type="text" value="{{ data['value'] is defined ? data['value'] : '' }}" id="{{ data['id'] }}">
        </div>
    </div>
{%- endmacro %}

{%- macro formGroupInputVertical(name, data) %}
    <div class="form-group">
        <label for="{{ data['id'] }}" class="col-form-label">
            {{ data['label'] }}
        </label>
        {% if data['type'] == 'text' %}
            <input class="form-control m-input {{ data['class'] is defined ? data['class'] : '' }}" name="{{ name }}" type="text" value="{{ data['value'] is defined ? data['value'] : '' }}" id="{{ data['id'] }}">
        {% elseif data['type'] == 'number' %}
            <input class="form-control m-input" name="{{ name }}" type="number" value="{{ data['value'] is defined ? data['value'] : '' }}" id="{{ data['id'] }}">
        {% elseif data['type'] == 'textarea' %}
            <textarea name="{{ name }}" id="{{ data['id'] }}" class="form-control" rows="3"></textarea>
        {% endif %}

    </div>
{%- endmacro %}

{%- macro formGroupInputGroup2Text(name, data) %}
    <div class="form-group m-form__group">
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">
                    {{  data['label'] }}
                </span>
            </div>

            <input type="text" class="form-control m-input" placeholder="" aria-describedby="basic-addon2">

            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">
                    {{  data['label_after'] }}
                </span>
            </div>
        </div>
    </div>
{%- endmacro %}

