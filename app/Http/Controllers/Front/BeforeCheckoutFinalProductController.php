<?php

namespace App\Http\Controllers\Front;

use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Video3D\Video3DModel;
use App\Model\Admin\PillerPost\PillerPostModel;
use App\Model\Admin\PickCanopy\PickCanopyModel;
use App\Model\Admin\MasterWidth\MasterWidthModel;
use App\Model\Admin\FinalProduct\FinalProductModel;
use App\Model\Admin\MasterHeight\MasterHeightModel;
use App\Model\Front\BeforeCheckoutFinalProductModel;
use App\Model\Admin\PickPostLength\PickPostLengthModel;
use App\Model\Admin\PickUpFootPrint\PickUpFootPrintModel;
use App\Model\Admin\PickLouveredPanel\PickLouveredPanelModel;
use App\Model\Admin\PickOverheadShades\PickOverheadShadesModel;
use App\Model\Admin\PickPostMountBracket\PickPostMountBracketModel;


class BeforeCheckoutFinalProductController extends Controller
{
    //
    public function saveData(Request $request)
    {
        if($request->session()->has('main_unique_session_key'))
        {
            $insertQuery = [
                'final_width' => $_GET['master_width'], 
                'final_length' => $_GET['master_height'], 
                'final_no_posts' => $_GET['master_post'], 
                'final_overhead' => $_GET['overhead_type_val'], 
                'final_post_length' => $_GET['post_length_val'], 
                'final_post_mount_type' => $_GET['slap_mount_type'], 
                'final_post_mount' => $_GET['mount_data'], 
                'final_canopy_type' => $_GET['canopy_type_data'], 
                'final_canopy' => 'yes', 
                'final_lpanel_type' => $_GET['lpanel_val_type'], 
                'final_lpanel' => $_GET['lpanel_main_data'], 
                'final_price' => $_GET['total_price'],  
                'pay_status' => 'no', 
                'admin_action' => 'yes', 
                'created_at' => date('Y-m-d'), 
                'updated_at' => date('Y-m-d')
            ];

            $insertQuery = BeforeCheckoutFinalProductModel::where(['unique_session_id' => $request->session()->get('main_unique_session_key')])->update($insertQuery);
            if($insertQuery)
            {
                $request->session()->put('main_unique_session_key', $unique_id);
                $event_res = "success";
            }
            else
            {
                $event_res = "error";
            }
        }
        else
        {
            // unique id
            $unique_id = rand(1000000,9999999);
            
            $checkingQuery = BeforeCheckoutFinalProductModel::where('unique_session_id', $unique_id)->get();
            if(count($checkingQuery) > 0){
                $unique_id = rand(1000000,9999999);
                return $this->saveData();
            }
            else
            {
                $insertQuery = [
                    'final_width' => $_GET['master_width'], 
                    'final_length' => $_GET['master_height'], 
                    'final_no_posts' => $_GET['master_post'], 
                    'final_overhead' => $_GET['overhead_type_val'], 
                    'final_post_length' => $_GET['post_length_val'], 
                    'final_post_mount_type' => $_GET['slap_mount_type'], 
                    'final_post_mount' => $_GET['mount_data'], 
                    'final_canopy_type' => $_GET['canopy_type_data'], 
                    'final_canopy' => 'yes', 
                    'final_lpanel_type' => $_GET['lpanel_val_type'], 
                    'final_lpanel' => $_GET['lpanel_main_data'], 
                    'final_price' => $_GET['total_price'], 
                    'unique_session_id' => $unique_id, 
                    'pay_status' => 'no', 
                    'admin_action' => 'yes', 
                    'created_at' => date('Y-m-d'), 
                    'updated_at' => date('Y-m-d')
                ];

                $insertQuery = BeforeCheckoutFinalProductModel::insert($insertQuery);
                if($insertQuery)
                {
                    $request->session()->put('main_unique_session_key', $unique_id);
                    $event_res = "success";
                }
                else
                {
                    $event_res = "error";
                }
            }
        }
        echo json_encode($event_res);
    }


    /// pdf details --- start
    public function generate_pdf(Request $request) 
	{
        if($request->session()->has('main_unique_session_key'))
        {
            $get_session_data = $request->session()->get('main_unique_session_key');
        }
        $mainQuery = BeforeCheckoutFinalProductModel::where('unique_session_id',$get_session_data)->get();
        foreach($mainQuery as $mQuery)
        {
            // width query
            $getWidthQuery = MasterWidthModel::where('id',$mQuery->final_width)->get();
            foreach($getWidthQuery as $getW)
            {
                $data['master_width_length'] = $getW->master_width_length;
            }

            // height query
            $getHeightQuery = MasterHeightModel::where('id',$mQuery->final_length)->get();
            foreach($getHeightQuery as $getH)
            {
                $data['master_height_length'] = $getH->master_height_length;
            }

            // overhead shades query
            $getOverheadShadesQuery = PickOverheadShadesModel::where('id',$mQuery->final_overhead)->get();
            foreach($getOverheadShadesQuery as $getOverHead)
            {
                $data['overhead_shades'] = $getOverHead->img_standard_name;
            }

            // piller post query
            $PillerPostModelQuery = PickPostLengthModel::where('id',$mQuery->final_post_length)->get();
            foreach($PillerPostModelQuery as $getP)
            {
                $data['piller_length'] = $getP->posts_length;
            }

            $data['mount_count'] = ucwords($mQuery->final_post_mount_type);
            $data['final_canopy_type'] = ucwords($mQuery->final_canopy_type);
            $data['final_lpanel_type'] = ucwords($mQuery->final_lpanel_type);
            $data['final_price'] = ucwords($mQuery->final_price);


            /////

            $footprintQuery = PickUpFootPrintModel::where(['height_master' => $mQuery->final_length, 'width_master' => $mQuery->final_width, 'posts_master' =>  $mQuery->final_no_posts])->get();
            foreach($footprintQuery as $fQuery)
            {
                $finalImgQuery = FinalProductModel::where(['pick_footprint' => $fQuery->id, 'overhead_shades' => $mQuery->final_overhead, 'post_length' => $mQuery->final_post_length])->get();
                if(count($finalImgQuery) > 0)
                {
                    foreach($finalImgQuery as $imgQ)
                    {
                        $data['image_data'] = '<img style="" src="'.str_replace('public','storage/app/public',asset($imgQ->final_product_img)).'" alt="">';
                    }
                }
                else if(count($finalImgQuery) == 0)
                {
                    $data['image_data'] = "";
                }
            }

            /////
        }
		
		$pdf = PDF::loadView('frontend.pages.pdf-docx', $data);
		return $pdf->stream('document.pdf');
	}
    /// end of pdf details --- end
}
