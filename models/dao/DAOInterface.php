<?php

interface DAOInterface {
	public function connect();
	public function createAll($datas);
	public function fetch($id);
	public function fetchAll();
    public function insert($statement, $data, $entity);
    public function fetchWhere($attr, $value);
    public function first($attr, $value);
    public function destroy($id);
    public function intermediate($table, $key, $value, $foreign);
    public function associate($table, $key, $foreign_key, $entity, $foreign);
    public function associate_one($table, $key, $foreign_key, $entity, $foreign);
    public function dissociate($table, $key, $foreign_key, $entity, $foreign = NULL);
	public function __get($prop);
	public function __set($prop, $value);
}