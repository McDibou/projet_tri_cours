<?php

namespace Adrien\Entity;

class Entity
{
    protected array $data;
    protected array $error;

    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }

    private function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $name = explode('_', $key);
            if (count($name) === 2) {
                $methodSetters = "set" . ucfirst($name[0]) . '' . ucfirst($name[1]);
                if (method_exists($this, $methodSetters)) {
                    $this->$methodSetters($value);
                }
            }
        }
    }

    public function analyseData($value, $regex): string
    {
        if (preg_match($regex, $value)) {
            return strip_tags(htmlspecialchars(trim($value)));
        }
        return false;
    }

    public function getAllContent(): ?array
    {
        return (isset($this->data)) ? $this->data : null;
    }

    public function getAllError(): ?array
    {
        return (isset($this->error)) ? $this->error : null;
    }
}
