<?php

namespace Adrien\Table;

use Adrien\Database\Database;

class Table
{

    protected $table;
    protected $db;

    public function __construct(Database $db, $table)
    {
        $this->db = $db;
        $this->table = $table;
    }

    public function query($statement, $attribute = null, $one = false)
    {
        if ($attribute) {
            return $this->db->prepare($statement, $attribute, $one);
        } else {
            return $this->db->query($statement, $one);
        }
    }

    private function sqlPart($array, $separator)
    {

        $sql_part = [];
        foreach ($array as $key) {
            $sql_part[] = $key . ' = ?';
        }
        return implode(' ' . $separator . ' ', $sql_part);

    }

    public function extract($key, $value)
    {
        $records = $this->all();
        $array = [];
        foreach ($records as $name) {
            $array[$name->$key] = $name->$value;
        }
        return $array;
    }

    public function count($where = null, $id = null)
    {
        if (empty($where) && empty($id)) {
            return $this->db->count('SELECT * FROM ' . $this->table);
        } else {

            $where = $this->sqlPart($where, 'AND');

            return $this->db->count('SELECT * FROM ' . $this->table . ' WHERE ' . $where, $id);
        }
    }

    public function insert($array)
    {
        $sql_part = [];
        $attribute = [];

        foreach ($array as $key => $value) {
            $sql_part[] = $key . ' = ?';
            $attribute[] = $value;
        }

        $sql_part = implode(', ', $sql_part);


        $this->query('INSERT INTO ' . $this->table . ' SET ' . $sql_part, $attribute);
    }

    public function delete($where, $id)
    {

        $where = $this->sqlPart($where, 'AND');

        $this->query('DELETE FROM ' . $this->table . ' WHERE ' . $where, $id);

    }

    public function update($array, $where, $id)
    {

        $sql_part = [];
        $attribute = [];

        foreach ($array as $key => $value) {
            $sql_part[] = $key . ' = ?';
            $attribute[] = $value;
        }
        $attribute[] = $id;
        $sql_part = implode(', ', $sql_part);

        $where = $this->sqlPart($where, '');

        $this->query('UPDATE ' . $this->table . ' SET ' . $sql_part . ' WHERE ' . $where, $attribute);

    }

    public function all($where = null, $id = null, $one = false)
    {
        if (empty($id)) {

            return $this->query('SELECT * FROM ' . $this->table);

        } else {

            $where = $this->sqlPart($where, 'AND');

            return $this->query('SELECT * FROM ' . $this->table . ' WHERE ' . $where, $id, $one);
        }
    }

    public function allJoin($where = null, $id = null, $one = false)
    {
        if (empty($where) && empty($id)) {
            return $this->query('SELECT *
                                            FROM `content`
                                            JOIN `category`
                                            ON `category_id` = `id_category`
                                            JOIN `subject` 
                                            ON `subject_id` = `id_subject`
                                            JOIN `format`
                                            ON `format_id` = `id_format`
                                            JOIN `user`
                                            ON `user_id` = `id_user`');
        } else {

            $where = $this->sqlPart($where, 'AND');

            return $this->query('SELECT *
                                            FROM `content`
                                            JOIN `category`
                                            ON `category_id` = `id_category`
                                            JOIN `subject` 
                                            ON `subject_id` = `id_subject`
                                            JOIN `format`
                                            ON `format_id` = `id_format`
                                            JOIN `user`
                                            ON `user_id` = `id_user`
                                            WHERE ' . $where, $id, $one);
        }
    }

    public function group($group, $where = null, $id = null, $one = false)
    {
        if (empty($where) && empty($id)) {
            return $this->query('SELECT *
                                            FROM `content`
                                            JOIN `category`
                                            ON `category_id` = `id_category`
                                            JOIN `subject` 
                                            ON `subject_id` = `id_subject`
                                            JOIN `format`
                                            ON `format_id` = `id_format`
                                            JOIN `user`
                                            ON `user_id` = `id_user`
                                            GROUP BY ' . $group);
        } else {

            $where = $this->sqlPart($where, 'AND');

            return $this->query('SELECT *
                                            FROM `content`
                                            JOIN `category`
                                            ON `category_id` = `id_category`
                                            JOIN `subject` 
                                            ON `subject_id` = `id_subject`
                                            JOIN `format`
                                            ON `format_id` = `id_format`
                                            JOIN `user`
                                            ON `user_id` = `id_user`
                                            WHERE ' . $where . ' GROUP BY ' . $group, $id, $one);
        }
    }

    public function favory($value)
    {
        return $this->query('SELECT * FROM `content`
                                        JOIN `favory` 
                                        ON `content_id_favory` = `id_content`
                                        JOIN `user` 
                                        ON `user_id_favory` = `id_user`
                                        JOIN `category` 
                                        ON `category_id` = `id_category`
                                        JOIN `subject` 
                                        ON `subject_id` = `id_subject`
                                        JOIN `format` 
                                        ON `format_id` = `id_format`
                                        WHERE `pseudo_user` = ?', $value);
    }

    public function userJoin($pseudo)
    {
        return $this->query('SELECT * FROM `user` JOIN `role` ON `role_id` = `id_role` WHERE `pseudo_user` = ?', [$pseudo], true);
    }

    public function search($value)
    {
        return $this->query("SELECT * FROM `content`
                                        JOIN `favory` 
                                        ON `content_id_favory` = `id_content`
                                        JOIN `user` 
                                        ON `user_id_favory` = `id_user`
                                        JOIN `category` 
                                        ON `category_id` = `id_category`
                                        JOIN `subject` 
                                        ON `subject_id` = `id_subject`
                                        JOIN `format` 
                                        ON `format_id` = `id_format`
                                        WHERE `name_content` LIKE '%$value%'
                                        OR `link_content` LIKE '%$value%'
                                        OR `desc_content` LIKE '%$value%'
                                        OR `name_category` LIKE '%$value%'
                                        OR `name_subject` LIKE '%$value%'
                                        ");
    }
}