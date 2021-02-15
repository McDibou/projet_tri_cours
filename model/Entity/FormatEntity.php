<?php

namespace Adrien\Entity;

class FormatEntity extends Entity
{
    public function __construct(array $datas)
    {
        parent::__construct($datas);
    }

    public function getNameFormat()
    {
        return $this->data['name_format'];
    }

    public function setNameFormat($name_format)
    {
        $name_format = $this->analyseData($name_format, "/^[a-zA-Z0-9' -]*$/");
        if (empty($name_format)) {
            $this->error['name_format'] = 'Le nom n\'est pas valide';
        } elseif (strlen($name_format) > 80) {
            $this->error['name_format'] = 'Le nom est trop grand';
        } else {
            $this->data['name_format'] = $name_format;
        }
    }
}