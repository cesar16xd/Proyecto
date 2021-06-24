<?php
    interface IModel{
        public function save();
        public function getAll();
        public function getId($id);
        public function deleteId($id);
        public function updateData();
        public function from($array);
    }

?>