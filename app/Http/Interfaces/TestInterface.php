<?php

namespace App\Http\Interfaces;

interface TestInterface
{

    public function index();

    public function create();

    /**
     * @param $request
     */
    public function store($request);

    /**
     * @param $id
     */
    public function show($id);

    /**
     * @param $id
     */
    public function edit($id);

    /**
     * @param $request
     * @param $id
     */
    public function update($request, $id);

    /**
     * @param $id
     */
    public function destroy($id);

}