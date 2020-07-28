<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Media;
use App\Models\ProductImage;
use App\Repositories\Eloquent\MediaRepository;
use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Product;

/**
 * Resource controller class for product.
 */
class ProductResourceController extends BaseController
{

    /**
     * Initialize product resource controller.
     *
     * @param type ProductRepository $product
     * @param type MediaRepository $mediaRepository
     */
    public function __construct(
        ProductRepository       $product,
        MediaRepository $mediaRepository
    ) {
        parent::__construct();
        $this->repository = $product;
        $this->mediaRepository = $mediaRepository;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }

    /**
     * Display a list of product.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));

        if ($this->response->typeIs('json')) {

            $products = $this->repository
                ->orderBy('id','asc')
                ->paginate($limit);

            return $this->response
                ->success()
                ->count($products->total())
                ->data($products->toArray()['data'])
                ->output();
        }

        return $this->response->title(trans('product.names'))
            ->view('product.index', true)
            ->output();
    }

    /**
     * Display product.
     *
     * @param Request $request
     * @param Product   $product
     *
     * @return Response
     */
    public function show(Request $request, Product $product)
    {
        if ($product->exists) {
            $view = 'product.show';
        } else {
            $view = 'product.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('product.name'))
            ->data(compact('product'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $product = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('product.name'))
            ->view('product.create', true)
            ->data(compact('product'))
            ->output();
    }

    /**
     * Create new product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $data = $attributes = $request->all();

            if(isset($attributes['parameters_name']) && $attributes['parameters_name'])
            {
                $parameters = [];
                foreach ($attributes['parameters_name'] as $key => $name)
                {
                    if($name)
                    {
                        $parameters[$name] = $attributes['parameters_value'][$key];
                    }
                }
                $data['parameters'] = serialize($parameters);
            }
            $data['image'] = isset($data['images'][0]) ? $data['images'][0] : '';
            //$data['images'] = isset($data['images']) ? implode(',',$data['images']) : '';

            $product = $this->repository->create($data);

            if(isset($attributes['images'])) {
                if (is_array($attributes['images'])) {
                    $images = $attributes['images'];
                } else {
                    $images[] = $attributes['images'];
                }

                foreach ($images as $key => $image) {
                    $product_image = ProductImage::create([
                        'url' => $image,
                        'product_id' => $product->id
                    ]);
                    Media::where('url', $image)->update([
                        'mediaable_id' => $product->id,
                        'mediaable_type' => 'App\Models\Product'
                    ]);
                }
            }

            return $this->response->message(trans('messages.success.created', ['Module' => trans('product.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('product/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/product'))
                ->redirect();
        }

    }

    /**
     * Update the product.
     *
     * @param Request $request
     * @param Product   $product
     *
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $data = $attributes = $request->all();

            if(isset($attributes['images'])) {
                $data['image'] = isset($data['images'][0]) ? $data['images'][0] : '';
                //$data['images'] = isset($data['images']) ? implode(',',$data['images']) : '';
            }

            $product->update($data);

            if(isset($attributes['images']))
            {
                if(is_array($attributes['images']))
                {
                    $images = $attributes['images'];
                }else{
                    $images[] = $attributes['images'];
                }
                foreach ($images as $key => $image)
                {
                    $product_image = ProductImage::where('url',$image)->where('product_id',$product->id)->first();
                    if(!$product_image)
                    {
                        $product_image = ProductImage::create([
                            'url' => $image,
                            'product_id' => $product->id,
                            'order' => $key+1
                        ]);
                        Media::where('url',$image)->update([
                            'mediaable_id' => $product->id,
                            'mediaable_type' => 'App\Models\Contract'
                        ]);
                    }else{
                        $product_image->update([
                            'order' => $key+1
                        ]);
                    }
                }
            }

            if(isset($attributes['images'])) {
                if (is_array($attributes['images'])) {
                    $images = $attributes['images'];
                } else {
                    $images[] = $attributes['images'];
                }
                foreach ($images as $key => $image) {
                    Media::where('url', $image)->update([
                        'mediaable_id' => $product->id,
                        'mediaable_type' => 'App\Models\Product'
                    ]);
                }
            }

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('product.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('product'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product/' . $product->id))
                ->redirect();
        }

    }

    /**
     * Remove the product.
     *
     * @param Request $request
     * @param Product   $product
     *
     * @return Response
     */
    public function destroy(Request $request, Product $product)
    {
        try {
            $product->forceDelete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product.name')]))
                ->http_code(202)
                ->status('success')
                ->url(guard_url('product'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product'))
                ->redirect();
        }

    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('product'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product'))
                ->redirect();
        }
    }
    public function destroyImage(Request $request)
    {
        try{
            $url = $request->get('url');

            ProductImage::where('url',$url)->delete();
            $this->mediaRepository->deleteMedia($url);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product.label.images')]))
                ->status("success")
                ->http_code(201)
                ->url(guard_url('product'))
                ->redirect();

        }catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->http_code(400)
                ->url(guard_url('product'))
                ->redirect();
        }
    }
}
