<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Keyword;
use Carbon\Carbon;

class ProductController extends AdminController {
    protected function syncAttribute($attributes, $productID) {
        if (!empty($attributes)) {
            $data = [];
            foreach ($attributes as $key => $value) {
                $data[] = [
                    'pa_product_id' => $productID,
                    'pa_attribute_id' => $value,
                ];
            }
            if (!empty($data)) {
                \DB::table('products_attributes')->where('pa_product_id', $productID)->delete();
                \DB::table('products_attributes')->insert($data);
            }
        }
    }

    protected function syncKeyword($keywords, $productID) {
        if (!empty($keywords)) {
            $data = [];
            foreach ($keywords as $key => $value) {
                $data[] = [
                    'pk_product_id' => $productID,
                    'pk_keyword_id' => $value,
                ];
            }
            if (!empty($data)) {
                \DB::table('products_keywords')->where('pk_product_id', $productID)->delete();
                \DB::table('products_keywords')->insert($data);
            }
        }
    }

    protected function syncAttributeGroup() {
        $attributes = Attribute::get();
        $groupAttribute = [];
        foreach ($attributes as $key => $attribute) {
            $key = $attribute->gettype($attribute->type)['name'];
            $groupAttribute[$key][] = $attribute;
        }
        return $groupAttribute;
    }

    // protected function syncProductImages($files, $productID) {
    //     foreach ($files as $key => $file) {
    //         $ext = $file->getClientOriginalExtension();
    //         $extend = [
    //             'png', 'jpg', 'jpeg', 'PNG', 'JPG',
    //         ];

    //         if (!in_array($ext, $extend)) 
    //             return false;
            
    //         $fileName = date('Y-m-d__').Str::slug($file->getClientOriginalName()).'.'.$ext;
    //         $path = public_path().'/uploads/'.date('Y/m/d/');
    //         if (!\File::exists($path))
    //             mkdir($path, 0777, true);

    //         $file->move($path, $fileName);
    //         \DB::table('product_images')->insert([
    //             'name' => $file->getClientOriginalName(),
    //             'slug' => $fileName,
    //             'product_id' => $productID,
    //             'created_at' => Carbon::now(),
    //         ]);
    //     }
    // }

    public function index() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
        // select `id`, `name` from `categories`where `categories`.`id`
        $products = Product::with('category:id,name')->paginate(10);
    	$data = [
    		'products' => $products,
    	];
    	return view('admin.product.index', $data);
    }

    public function upload(Request $request) {
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = date('Y-m-d__').Str::slug($request->file('upload')->getClientOriginalName()).'.'.$extension;
            $path = public_path().'/uploads/products/';
            $request->file('upload')->move($path, $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/uploads/products/'.$fileName);
            $msg = 'Tải ảnh lên thành công';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset-utf-8');
            echo $response;
        }
    }

    public function create() {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$categories = Category::all();
        $oldAttribute = [];
        $oldKeyword = [];
        $attributes = $this->syncAttributeGroup();
        $keywords = Keyword::all();

        $data = [
            'categories' => $categories,
            'attributes' => $attributes,
            'keywords' => $keywords,
            'oldAttribute' => $oldAttribute,
            'oldKeyword' => $oldKeyword,
        ];

    	return view('admin.product.create', $data);
    }

	public function created(ProductRequest $request) {
    	$data = $request->except('_token', 'avatar', 'attribute', 'keywords', 'file');
     	$data['slug'] = Str::slug($request->name);
    	$data['created_at'] = Carbon::now();
        if($data['sale'])
            $data['price'] = $data['price_old'] - ($data['price_old']*($data['sale']/100));
        else
            $data['price'] = $data['price_old'];
        if ($request->avatar) {
            $avatar = upload_image('avatar');
            if ($avatar['code'] == 1)
                $data['avatar'] = $avatar['name'];
            else
                \Alert::danger('Thất bại', 'Vui lòng chọn ảnh phù hợp');
        }
        if ($request->img1) {
            $img1 = upload_image('img1');
            if ($img1['code'] == 1)
                $data['img1'] = $img1['name'];
            else
                \Alert::danger('Thất bại', 'Vui lòng chọn ảnh phù hợp');
        }
        if ($request->img2) {
            $img2 = upload_image('img2');
            if ($img2['code'] == 1)
                $data['img2'] = $img2['name'];
            else
                \Alert::danger('Thất bại', 'Vui lòng chọn ảnh phù hợp');
        }
        if ($request->img3) {
            $img3 = upload_image('img3');
            if ($img3['code'] == 1)
                $data['img3'] = $img3['name'];
            else
                \Alert::danger('Thất bại', 'Vui lòng chọn ảnh phù hợp');
        }
        if ($request->img4) {
            $img4 = upload_image('img4');
            if ($img4['code'] == 1)
                $data['img4'] = $img4['name'];
            else
                \Alert::danger('Thất bại', 'Vui lòng chọn ảnh phù hợp');
        }
		$id = Product::insertGetId($data);

        if ($id) {
            $this->syncAttribute($request->attribute, $id);
            // keywords là tên của cột input bên form 'name="keywords[]"' 
            $this->syncKeyword($request->keywords, $id);
        }
        \Alert::success('Thành công', 'Thêm mới sản phẩm');
		return redirect()->to('/admin/product');
    }

    public function update($id) {
        // Kiểm tra đăng nhập
        if (!$this->isLogined())
            return redirect()->to('/admin/login');
        
    	$product = Product::findOrFail($id);
        $categories = Category::all();
        $attributes = $this->syncAttributeGroup();
        $keywords = Keyword::all();
        $oldAttribute = \DB::table('products_attributes')
            ->where('pa_product_id', $id)
            ->pluck('pa_attribute_id')
            ->toArray();

        $oldKeyword = \DB::table('products_keywords')
            ->where('pk_product_id', $id)
            ->pluck('pk_keyword_id')
            ->toArray();
        
        if (!$oldAttribute)
            $oldAttribute = [];
        if (!$oldKeyword)
            $oldKeyword = [];
        $data = [
            'product' => $product,
            'categories' => $categories,
            'attributes' => $attributes,
            'keywords' => $keywords,
            'oldAttribute' => $oldAttribute,
            'oldKeyword' => $oldKeyword,
        ];
    	return view('admin.product.update', $data);
    }

	public function updated(ProductRequest $request, $id) {
    	$product = Product::find($id);
    	$data = $request->except('_token', 'avatar', 'attribute', 'keywords', 'file');
     	$data['slug'] = Str::slug($request->name);
    	$data['updated_at'] = Carbon::now();
        if($data['sale'])
            $data['price'] = $data['price_old'] - ($data['price_old']*($data['sale']/100));
        else
            $data['price'] = $data['price_old'];
		if ($request->avatar) {
            $avatar = upload_image('avatar');
            if ($avatar['code'] == 1)
                $data['avatar'] = $avatar['name'];
            else
                \Alert::danger('Thất bại', 'Vui lòng chọn ảnh phù hợp');
        }
        if ($request->img1) {
            $img1 = upload_image('img1');
            if ($img1['code'] == 1)
                $data['img1'] = $img1['name'];
            else
                \Alert::danger('Thất bại', 'Vui lòng chọn ảnh phù hợp');
        }
        if ($request->img2) {
            $img2 = upload_image('img2');
            if ($img2['code'] == 1)
                $data['img2'] = $img2['name'];
            else
                \Alert::danger('Thất bại', 'Vui lòng chọn ảnh phù hợp');
        }
        if ($request->img3) {
            $img3 = upload_image('img3');
            if ($img3['code'] == 1)
                $data['img3'] = $img3['name'];
            else
                \Alert::danger('Thất bại', 'Vui lòng chọn ảnh phù hợp');
        }
        if ($request->img4) {
            $img4 = upload_image('img4');
            if ($img4['code'] == 1)
                $data['img4'] = $img4['name'];
            else
                \Alert::danger('Thất bại', 'Vui lòng chọn ảnh phù hợp');
        }
        $result = $product->update($data);
        if ($id) {
            $this->syncAttribute($request->attribute, $id);
            $this->syncKeyword($request->keywords, $id);
        }
        \Alert::success('Thành công', 'Cập nhật sản phẩm');
		return redirect()->to('/admin/product');
    }

    public function hot($id) {
    	$product = Product::find($id);
    	$product->hot = !$product->hot;
    	$product->save();
        \Alert::success('Thành công', 'Cập nhật trạng thái');
		return redirect()->back();
    }

    public function active($id) {
    	$product = Product::find($id);
    	$product->active = !$product->active;
    	$product->save();
        \Alert::success('Thành công', 'Cập nhật trạng thái');
		return redirect()->back();
    }

    public function delete($id) {
    	$product = Product::find($id);
    	if ($product)
    		$product->delete();
        \Alert::info('Thông báo', 'Đã xóa sản phẩm');
    	return redirect()->back();
    }
}
