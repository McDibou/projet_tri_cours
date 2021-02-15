<?php

namespace Adrien\Entity;

class SubjectEntity extends Entity
{
    public function __construct(array $datas)
    {
        parent::__construct($datas);
    }

    public function getNameSubject()
    {
        return $this->data['name_subject'];
    }

    public function setNameSubject($name_subject)
    {
        $name_subject = $this->analyseData($name_subject, "/^[a-zA-Z0-9' -]*$/");
        if (empty($name_subject)) {
            $this->error['name_subject'] = 'Le nom n\'est pas valide';
        } elseif (strlen($name_subject) > 80) {
            $this->error['name_subject'] = 'Le nom est trop grand';
        } else {
            $this->data['name_subject'] = $name_subject;
        }
    }
}