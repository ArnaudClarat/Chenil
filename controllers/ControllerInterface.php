<?php

interface ControllerInterface {
	public function list ();
	public function show ($id);
	public function create ();
	public function edit ($id);
	public function store ($data);
	public function update ($id, $data);
	public function destroy($id);
}