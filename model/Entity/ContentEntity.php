<?php

namespace Adrien\Entity;

class ContentEntity extends Entity
{
    public function __construct(array $datas)
    {
        parent::__construct($datas);
        $this->data['user_id'] = $_SESSION['id'];
    }

    public function getNameContent()
    {
        return $this->data['name_content'];
    }

    public function getLinkContent()
    {
        return $this->data['link_content'];
    }

    public function getDescContent()
    {
        return $this->data['desc_content'];
    }

    public function getCategoryId()
    {
        return $this->data['category_id'];
    }

    public function getSubjectId()
    {
        return $this->data['subject_id'];
    }

    public function getFormatId()
    {
        return $this->data['format_id'];
    }

    public function getUserId()
    {
        return $this->data['user_id'];
    }

    public function setNameContent($name_content): void
    {
        $name_content = $this->analyseData($name_content, "/^[a-zA-Z0-9' -]*$/");
        if (empty($name_content)) {
            $this->error['name_content'] = 'le nom n\'est pas valide';
        } elseif (strlen($name_content) > 80) {
            $this->error['name_content'] = 'le nom est trop long';
        } else {
            $this->data['name_content'] = $name_content;
        }
    }

    public function setLinkContent($link_content): void
    {
        $link_content = $this->analyseData($link_content, "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/");
        if (empty($link_content)) {
            $this->error['link_content'] = 'le lien n\'est pas valide';
        } elseif (strlen($link_content) > 255) {
            $this->error['link_content'] = 'le lien est trop long';
        } else {
            $this->data['link_content'] = $link_content;
        }
    }

    public function setDescContent($desc_content): void
    {
        $desc_content = $this->analyseData($desc_content, "/^[a-zA-Z0-9[:punct:]]*$/");
        if (empty($desc_content)) {
            $this->error['desc_content'] = 'la description n\'est pas valide';
        } else {
            $this->data['desc_content'] = $desc_content;
        }
    }

    public function setCategoryId($category_id): void
    {
        if (!ctype_digit($category_id)) {
            $this->error['category_id'] = 'Une erreur c\'est produite';
        } else {
            $this->data['category_id'] = $category_id;
        }
    }

    public function setSubjectId($subject_id): void
    {
        if (!ctype_digit($subject_id)) {
            $this->error['subject_id'] = 'Une erreur c\'est produite';
        } else {
            $this->data['subject_id'] = $subject_id;
        }
    }

    public function setFormatId($format_id): void
    {
        if (!ctype_digit($format_id)) {
            $this->error['format_id'] = 'Une erreur c\'est produite';
        } else {
            $this->data['format_id'] = $format_id;
        }
    }
}