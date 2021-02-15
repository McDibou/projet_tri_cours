<?php

namespace Adrien\HTML;

class FormHTML
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getValue($index)
    {
        if (is_object($this->data)) {
            return $this->data->$index;
        }
        return (isset($this->data[$index])) ? $this->data[$index] : null;
    }

    public function startForm($method = 'POST'): string
    {
        return '<form method="' . $method . '">';
    }

    public function endForm(): string
    {
        return '</form>';
    }

    public function input($value, $label, $error = ''): string
    {
        $valid = (!empty($error)) ? "is-invalid" : "";

        return '
        <div class="col-md-6">
            <label class="form-label text-light" for="' . $value . '">' . $label . '</label>
            <input class="form-control ' . $valid . '" id="' . $value . '" type="text" name="' . $value . '" value="' . $this->getValue($value) . '" aria-describedby="' . $value . '" required>
            <div id="' . $value . '" class="invalid-feedback">' . $error . '</div>
        </div>
        ';
    }

    public function mail($value, $label, $error = ''): string
    {
        $valid = (!empty($error)) ? "is-invalid" : "";

        return '
        <div class="col-md-6">
            <label class="form-label text-light" for="' . $value . '">' . $label . '</label>
            <input class="form-control ' . $valid . '" id="' . $value . '" type="email" name="' . $value . '" value="' . $this->getValue($value) . '" aria-describedby="' . $value . '" required>
            <div id="' . $value . '" class="invalid-feedback">' . $error . '</div>
        </div>
        ';
    }

    public function password($value, $label, $error = ''): string
    {
        $valid = (!empty($error)) ? "is-invalid" : "";

        return '
        <div class="col-md-6">
            <label class="form-label text-light" for="' . $value . '">' . $label . '</label>
            <input class="form-control ' . $valid . '" id="' . $value . '" type="password" name="' . $value . '" value="' . $this->getValue($value) . '" aria-describedby="' . $value . '" required>
            <div id="' . $value . '" class="invalid-feedback">' . $error . '</div>
        </div>
        ';
    }

    public function text($value, $label, $error = ''): string
    {
        $valid = (!empty($error)) ? "is-invalid" : "";

        return '
        <div class="col-md-6">
            <label class="form-label text-light" for="' . $value . '">' . $label . '</label>
            <textarea class="form-control ' . $valid . '" id="' . $value . '" name="' . $value . '" aria-describedby="' . $value . '" required>' . $this->getValue($value) . '</textarea>
            <div id="' . $value . '" class="invalid-feedback">' . $error . '</div>
        </div>
        ';
    }

    public function hidden($value, $data): string
    {
        return '<input type="hidden" name="' . $value . '" value="' . $data . '">';
    }

    public function button($value, $name ): string
    {
        return '<button class="btn btn-light" type="submit" name="' . $value . '">' . $name . '</button>';
    }

    public function back($name, $value): string
    {
        return '<a class="btn btn-light" href="?p=' . $name . '">' . $value . '</a>';
    }

    public function select($name, $label, $option, $error = ''): string
    {
        $valid = (!empty($error)) ? "is-invalid" : "";

        $input = '
        <div class="col-md-6">
        <label class="form-label text-light" for="' . $name . '">' . $label . '</label>
        <select class="form-control ' . $valid . '" name="' . $name . '" aria-describedby="' . $name . '">
        ';

        foreach ($option as $key => $value) {
            $attribute = '';
            if ($key == $this->getValue($name)) {
                $attribute = ' selected';
            }
            $input .= '<option value="' . $key . '" ' . $attribute . '>' . $value . '</option>';
        }

        $input .= '
        </select>
        <div id="' . $name . '" class="invalid-feedback">' . $error . '</div>
        </div>
        ';

        return $input;
    }
}