<?php

namespace Adrien\Entity;

class CategoryEntity extends Entity
{
    public function __construct(array $datas)
    {
        parent::__construct($datas);
    }

    public function getNameCategory()
    {
        return $this->data['name_category'];
    }

    public function setNameCategory($name_category)
    {
        $name_category = $this->analyseData($name_category, "/^[a-zA-Z0-9' -]*$/");
        if (empty($name_category)) {
            $this->error['name_category'] = 'Le nom n\'est pas valide';
        } elseif (strlen($name_category) > 80) {
            $this->error['name_category'] = 'Le nom est trop grand';
        } else {
            $this->data['name_category'] = $name_category;
        }
    }
}