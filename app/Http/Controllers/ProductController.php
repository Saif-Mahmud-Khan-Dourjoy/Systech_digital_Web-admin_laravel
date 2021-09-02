<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductBanner;
use App\ProductDescription;
use App\ProductDescriptionPoint;
use App\ProductStatistic;
use App\ProductAllFeature;
use App\ProductFeature;
use App\ProductImage;
use App\ProductOurStrength;
use App\ProductStrength;
use App\ProductPricingPlan;

use App\ProductPackage;
use App\ProductPackagePoint;
use App\ProductTestimonial;
use App\ProductClient;
use App\ProductClientImage;
use App\ProductBuy;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->client_company_logo);
        // exit();
        $this->validate($request, ['product_name' => 'required',
			'product_code' => 'required|unique:products',
			'description' => 'required',
            'product_image' => 'required', 
			'product_image' => 'required|mimes:jpeg,bmp,png,jpg|unique:products',  

            'background_image' => 'required',
            'background_image' => 'required|mimes:jpeg,bmp,png,jpg',  
            'product_icon' => 'required', 
            'product_icon' => 'required|mimes:jpeg,bmp,png,jpg',   
            'banner_headline' => 'required',
            'banner_text' => 'required',
            'button1_text' => 'required',
            'button1_link' => 'required',
            'button2_text' => 'required',
            'button2_link' => 'required',

            'product_description_headline' => 'required',
            'product_description_text' => 'required', 
            'request_for_demo_button_link' => 'required',
            'download_brochure_button_link' => 'required',
            'point.*' => 'required',
            'product_description_video' => 'required|mimes:mp4', 
            'statistic_icon' => 'required', 
            'statistic_icon.*' => 'required|mimes:jpeg,bmp,png,jpg', 
            'statistic_number.*' => 'required',
            'statistic_text.*' => 'required',

            'feature_headline' => 'required',
            'product_photo' => 'required',
            'product_photo.*' => 'required|mimes:jpeg,bmp,png,jpg',

            'feature_icon' => 'required',
            'feature_icon.*' => 'required|mimes:jpeg,bmp,png,jpg',
            'feature_headtext.*' => 'required',
            'feature_subtext.*' => 'required',

            'strength_headline' => 'required',
            'strength_text' => 'required',
            'strength_icon' => 'required',
            'strength_icon.*' => 'required|mimes:jpeg,bmp,png,jpg',
            'strength_headtext.*' => 'required',
            'strength_subtext.*' => 'required',

            'custom_package_button_link' => 'required',
            'contact_for_price_button_link' => 'required',
    
            'package_name' => 'required',
            'package_point.*' => 'required',

            'client_image' => 'required',
            'client_image.*' => 'required|mimes:jpeg,bmp,png,jpg',
            'client_comment.*' => 'required',
            'client_name.*' => 'required',
            'client_designation.*' => 'required',

            'client_headline' => 'required',
            'client_company_logo' => 'required',
            'client_company_logo.*' => 'mimes:jpeg,bmp,png,jpg',

            'sell_headline' => 'required',
            'sell_button_text' => 'required',
            'sell_text' => 'required',
		]);
        
        $image = $request->file('product_image');
		$destinationPath = 'img/product/';
		$originalFile = $image->getClientOriginalName();
		$uniqueName = date("Y-m-d").time().$originalFile;
		$image->move($destinationPath, $uniqueName);
		$originalPath = $destinationPath.$uniqueName;
        $data_product=[
            'product_name' =>  $request->product_name,
            'product_code' => $request->product_code,
			'description' => $request->description,
            'product_image' => $originalPath,
        ];
        $product = Product::create($data_product);

        // Section - 1
        $image = $request->file('background_image');
		$destinationPath = 'img/product/background/';
		$originalFile = $image->getClientOriginalName();
		$uniqueName = date("Y-m-d").time().$originalFile;
		$image->move($destinationPath, $uniqueName);
		$background_image_originalPath = $destinationPath.$uniqueName;

        $image = $request->file('product_icon');
		$destinationPath = 'img/product/icon/';
		$originalFile = $image->getClientOriginalName();
		$uniqueName = date("Y-m-d").time().$originalFile;
		$image->move($destinationPath, $uniqueName);
		$product_icon_originalPath = $destinationPath.$uniqueName;
        $data_banner=[
            'product_id' => $product->id,
            'background_image' => $background_image_originalPath,
            'product_icon' => $product_icon_originalPath,
			'banner_headline' => $request->banner_headline,
            'banner_text' => $request->banner_text,
            'button1_text' => $request->button1_text,
            'button1_link' => $request->button1_link,
            'button2_text' => $request->button2_text,
            'button2_link' => $request->button2_link,
        ];
        $product_banner = ProductBanner::create($data_banner);

        // Section - 2
        $image = $request->file('product_description_video');
		$destinationPath = 'img/product/video/';
		$originalFile = $image->getClientOriginalName();
		$uniqueName = date("Y-m-d").time().$originalFile;
		$image->move($destinationPath, $uniqueName);
		$product_description_video_originalPath = $destinationPath.$uniqueName;
        $data_description=[
            'product_id' => $product->id,
			'product_description_headline' => $request->banner_headline,
            'product_description_text' => $request->banner_text,
            'product_description_video' => $product_description_video_originalPath,
            'request_for_demo_button_link' => $request->request_for_demo_button_link,
            'download_brochure_button_link' => $request->download_brochure_button_link,
        ];
        $product_description = ProductDescription::create($data_description);

        if(count($request->point) > 0) {
            foreach ($request->point as $ppoint) {
                $data_description_point=[
                    'product_description_id' => $product_description->id,
                    'point' => $ppoint, 
                ];
                $product_description_point = ProductDescriptionPoint::create($data_description_point);
            }
        }

        // Section - 3
        for($i=0;$i<3;$i++){
            $image = $request->file('statistic_icon')[$i];
            $destinationPath = 'img/product/icon/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = date("Y-m-d").time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $statistic_icon_originalPath = $destinationPath.$uniqueName;
            $data_statistic=[
                'product_id' => $product->id,
                'statistic_icon' => $statistic_icon_originalPath,
                'statistic_number' => $request->statistic_number[$i],
                'statistic_text' => $request->statistic_text[$i],
            ];
            $product_statistic = ProductStatistic::create($data_statistic);
        }

        // Section - 4
        $data_product_all_feature=[
            'product_id' => $product->id,
            'feature_headline' => $request->feature_headline,
        ];
        $product_all_feature = ProductAllFeature::create($data_product_all_feature);

        if(count($request->product_photo) > 0) {
            $i=0;
            foreach ($request->product_photo as $p_photo) {
                $image = $request->file('product_photo')[$i];
                $destinationPath = 'img/product/photo/';
                $originalFile = $image->getClientOriginalName();
                $uniqueName = date("Y-m-d").time().$originalFile;
                $image->move($destinationPath, $uniqueName);
                $product_photo_originalPath = $destinationPath.$uniqueName;

                $data_product_photo=[
                    'product_all_feature_id' => $product_all_feature->id,
                    'product_photo' => $product_photo_originalPath,
                ];
                $product_image = ProductImage::create($data_product_photo);
                $i++;
            }
        }


        if(count($request->feature_icon) > 0) {
            $i=0;
            foreach ($request->feature_icon as $p_photo) {
                $image = $request->file('feature_icon')[$i];
                $destinationPath = 'img/product/icon/';
                $originalFile = $image->getClientOriginalName();
                $uniqueName = date("Y-m-d").time().$originalFile;
                $image->move($destinationPath, $uniqueName);
                $product_feature_icon_originalPath = $destinationPath.$uniqueName;

                $data_product_feature=[
                    'product_all_feature_id' => $product_all_feature->id,
                    'feature_icon' => $product_feature_icon_originalPath,
                    'feature_headtext' => $request->feature_headtext[$i],
                    'feature_subtext' => $request->feature_subtext[$i],
                ];
                $product_feature = ProductFeature::create($data_product_feature);
                $i++;
            }
        }

        // Section - 5
        // echo $request->strength_text;
        // exit();

        $data_our_strength=[
            'product_id' => $product->id,
            'strength_headline' => $request->strength_headline,
            'strength_text' =>  $request->strength_text,
        ];
        $product_our_strength = ProductOurStrength::create($data_our_strength);

        if(count($request->strength_icon) > 0) {
            $i=0;
            foreach ($request->strength_icon as $p_photo) {
                $image = $request->file('strength_icon')[$i];
                $destinationPath = 'img/product/icon/';
                $originalFile = $image->getClientOriginalName();
                $uniqueName = date("Y-m-d").time().$originalFile;
                $image->move($destinationPath, $uniqueName);
                $product_strength_icon_originalPath = $destinationPath.$uniqueName;

                $data_product_strength=[
                    'product_our_strength_id' => $product_our_strength->id,
                    'strength_icon' => $product_strength_icon_originalPath,
                    'strength_headtext' => $request->strength_headtext[$i],
                    'strength_subtext' => $request->strength_subtext[$i],
                ];
                $product_strength = ProductStrength::create($data_product_strength);
                $i++;
            }
        }

        // Section - 6
       
        $data_pricing_plan=[
            'product_id' => $product->id,
            'custom_package_button_link' => $request->custom_package_button_link,
            'contact_for_price_button_link' => $request->contact_for_price_button_link,
        ];
        $product_pricing_plan = ProductPricingPlan::create($data_pricing_plan);


        $data_product_package=[
            'product_id' => $product->id,
            'package_name' => $request->package_name,
        ];
        $product_package = ProductPackage::create($data_product_package);

        if(count($request->package_point) > 0) {
            foreach ($request->package_point as $pp_point) {
                $data_product_package_point=[
                    'product_package_id' => $product_package->id,
                    'package_point' => $pp_point, 
                ];
                $product_package_point = ProductPackagePoint::create($data_product_package_point);
            }
        }

        // Section - 7
        if(count($request->client_image) > 0) {
            $i=0;
            foreach ($request->client_image as $c_photo) {
                $image = $request->file('client_image')[$i];
                $destinationPath = 'img/product/photo/';
                $originalFile = $image->getClientOriginalName();
                $uniqueName = date("Y-m-d").time().$originalFile;
                $image->move($destinationPath, $uniqueName);
                $product_client_image_originalPath = $destinationPath.$uniqueName;

                $data_product_testimonial=[
                    'product_id' => $product->id,
                    'client_image' => $product_client_image_originalPath,
                    'client_comment' => $request->client_comment[$i],
                    'client_name' => $request->client_name[$i],
                    'client_designation' => $request->client_designation[$i],
                ];
                $product_testimonial = ProductTestimonial::create($data_product_testimonial);
                $i++;
            }
        }

        // Section - 8

        $data_client=[
            'product_id' => $product->id,
            'client_headline' => $request->client_headline,
      
        ];
        $product_client = ProductClient::create($data_client);

        if(count($request->client_company_logo) > 0) {
            $i=0;
            foreach ($request->client_company_logo as $p_photo) {
                $image = $request->file('client_company_logo')[$i];
                $destinationPath = 'img/product/photo/';
                $originalFile = $image->getClientOriginalName();
                $uniqueName = date("Y-m-d").time().$originalFile;
                $image->move($destinationPath, $uniqueName);
                $product_client_image_originalPath = $destinationPath.$uniqueName;

                $data_client_image=[
                    'product_id' => $product->id,
                    'client_company_logo' => $product_client_image_originalPath,
                    'client_link' => $request->client_link[$i],
                ];
                $product_client_image = ProductClientImage::create($data_client_image);
                $i++;
            }
        }

        // Section - 9
        $data_buy=[
            'product_id' => $product->id,
            'sell_headline' => $request->sell_headline,
            'sell_text' => $request->sell_text,
            'sell_button_text' => $request->sell_button_text,
        ];
        $product_buy = ProductBuy::create($data_buy);

        session()->flash('success', 'Successfully Product Created');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('admin.product.products.edit',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_code' => 'required',
            'description' => 'required', 
            'product_image' => 'mimes:jpeg,bmp,png,jpg', 
        ]);
        $image=$request->file('product_image');
        if(!is_null($image)){
            unlink($product->product_image);
            $image = $request->file('product_image');
            $destinationPath = 'img/product/';
            $originalFile = $image->getClientOriginalName();
            $uniqueName = date("Y-m-d").time().$originalFile;
            $image->move($destinationPath, $uniqueName);
            $originalPath = $destinationPath.$uniqueName;
            $data_product=[
                'product_name' =>  $request->product_name,
                'product_code' => $request->product_code,
                'description' => $request->description,
                'product_image' => $originalPath,
            ];
            $product->update($data_product);

        }
        else{
            $data_product=[
                'product_name' =>  $request->product_name,
                'product_code' => $request->product_code,
                'description' => $request->description,
                'product_image' => $product->product_image,
            ];
            $product->update($data_product);
        }

        session()->flash('success', 'Successfully Updated');
        return redirect('/products/'. $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Successfully Deleted');
        return redirect('/products');
    }
}
