<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Subsidiary;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\SubsidiaryRepository;

class SubsidiaryResourceController extends BaseController
{
    public function __construct(SubsidiaryRepository $subsidiary)
    {
        parent::__construct();
        $this->repository = $subsidiary;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        if ($this->response->typeIs('json')) {
            $subsidiaries = $this->repository
                ->orderBy('order','desc')
                ->orderBy('id','asc')
                ->get();

            return $this->response
                ->success()
                ->data($subsidiaries->toArray())
                ->output();
        }
        return $this->response->title(trans('subsidiary.name'))
            ->view('subsidiary.index')
            ->output();
    }
    public function create(Request $request)
    {
        $subsidiary = $this->repository->newInstance([]);

        return $this->response->title(trans('app.admin.panel'))
            ->view('subsidiary.create')
            ->data(compact('subsidiary'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $subsidiary = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('subsidiary.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('subsidiary'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('subsidiary'))
                ->redirect();
        }
    }
    public function show(Request $request,Subsidiary $subsidiary)
    {
        if ($subsidiary->exists) {
            $view = 'subsidiary.show';
        } else {
            $view = 'subsidiary.create';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('subsidiary.name'))
            ->data(compact('subsidiary'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Subsidiary $subsidiary)
    {
        try {
            $attributes = $request->all();

            $subsidiary->update($attributes);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('subsidiary.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('subsidiary' ))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('subsidiary/' . $subsidiary->id))
                ->redirect();
        }
    }
    public function destroy(Request $request,Subsidiary $subsidiary)
    {
        try {
            $this->repository->forceDelete([$subsidiary->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('subsidiary.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('subsidiary'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('subsidiary'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('subsidiary.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('subsidiary'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('subsidiary'))
                ->redirect();
        }
    }
}
