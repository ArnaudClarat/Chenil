<?php

interface EntityInterface {
	public function __get($prop);
	public function __set($prop, $value);
	public static function all();
	public static function find($id);
	public static function where($attr, $value);
	public static function first($attr, $value);
	public function belongsTo($class, $prop);
	public function hasMany($class, $prop, $name);
	public function belongsToMany($class, $prop, $table, $key, $foreign);
	public static function intermediate($table, $key, $value, $foreign);
	public function associate($entity, $prop);
	public function sync($table, $key, $foreign_key, $foreign);
	public function unsync($table, $key, $foreign_key, $foreign);
}