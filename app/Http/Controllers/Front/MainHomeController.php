<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Video3D\Video3DModel;
use App\Model\Admin\PickCanopy\PickCanopyModel;
use App\Model\Admin\PillerPost\PillerPostModel;
use App\Model\Admin\MasterWidth\MasterWidthModel;
use App\Model\Admin\MasterHeight\MasterHeightModel;
use App\Model\Admin\PickPostLength\PickPostLengthModel;
use App\Model\Admin\PickUpFootPrint\PickUpFootPrintModel;
use App\Model\Admin\PickLouveredPanel\PickLouveredPanelModel;
use App\Model\Admin\PickOverheadShades\PickOverheadShadesModel;
use App\Model\Admin\PickPostMountBracket\PickPostMountBracketModel;
use App\Model\Front\BeforeCheckoutFinalProductModel;
use App\Model\Admin\FinalProduct\FinalProductModel;

class MainHomeController extends Controller
{
    //
    public function index(Request $request)
    {
        
        return view('frontend.layouts.home');
    }

    // master width view
    public function choose_master_width_fx(Request $request)
    {
        
        $widthQuery = MasterWidthModel::get();
        $html = '<option value="">Choose a width</option>';
        if(count($widthQuery) > 0)
        {
            
            
            foreach($widthQuery as $wQuery)
            {

                $checked = "";
                if($request->session()->has('main_unique_session_key'))
                {
                    $mQuery_check = BeforeCheckoutFinalProductModel::where('unique_session_id',$request->session()->get('main_unique_session_key'))->get();
                    foreach($mQuery_check as $mQc)
                    {
                        if($mQc->final_width == $wQuery->id)
                        {
                            $checked = "selected";
                        }
                        
                    }
                }
                $html .= '<option value='.$wQuery->id.' '.$checked.'>'.$wQuery->master_width_length.'</option>';
            }
        }
        echo json_encode($html);
    }

    // main home
    public function show_3d_video_fx3(Request $request)
    {
        $mainQuery = Video3DModel::where(['master_width' => $_GET['master_width'] , 'master_height' => $_GET['master_height'], 'master_posts' => $_GET['master_post'] , 'master_overhead' => $_GET['overhead_val'] ])->get();
        
       
        if(count($mainQuery) > 0)
        {
            $i = 0;
            foreach($mainQuery as $mQuery)
            {
                if($mQuery->master_3D_video != "" || $mQuery->master_3D_video != null)
                {
                    $video_data = $mQuery->master_3D_video;
                }
                else
                {
                    $video_data = "";
                }
                
            }
        }
        else
        {
            $video_data = "";
        } 

        echo json_encode($video_data);
    }

    // master height view
    public function choose_master_height_fx(Request $request)
    {
        $widthQuery = MasterHeightModel::get();
        $html = '<option value="">Choose a length</option>';
        if(count($widthQuery) > 0)
        {
            foreach($widthQuery as $wQuery)
            {
                $checked = "";
                if($request->session()->has('main_unique_session_key'))
                {
                    $mQuery_check = BeforeCheckoutFinalProductModel::where('unique_session_id',$request->session()->get('main_unique_session_key'))->get();
                    foreach($mQuery_check as $mQc)
                    {
                        if($mQc->final_length == $wQuery->id)
                        {
                            $checked = "selected";
                        }
                        
                    }
                }
                $html .= '<option value='.$wQuery->id.' '.$checked.'>'.$wQuery->master_height_length.'</option>';
            }
        }
        echo json_encode($html);
    }

    // master posts view
    public function choose_master_post_fx(Request $request)
    {
        $widthQuery = PillerPostModel::get();
        $html = '<option value="">Choose posts</option>';
        if(count($widthQuery) > 0)
        {
            foreach($widthQuery as $wQuery)
            {
                $checked = "";
                if($request->session()->has('main_unique_session_key'))
                {
                    $mQuery_check = BeforeCheckoutFinalProductModel::where('unique_session_id',$request->session()->get('main_unique_session_key'))->get();
                    foreach($mQuery_check as $mQc)
                    {
                        if($mQc->final_no_posts == $wQuery->id)
                        {
                            $checked = "selected";
                        }
                        
                    }
                }
                $html .= '<option value='.$wQuery->id.' '.$checked.'>'.$wQuery->no_of_posts.' posts</option>';
            }
        }
        echo json_encode($html);
    }

    // change width look
    public function change_master_width_fx(Request $request)
    {
        $widthQuery = MasterWidthModel::where('id',$_GET['id'])->get();
        foreach($widthQuery as $wQ)
        {
            $main_data = $wQ->master_width_length;
        }
        echo json_encode($main_data);
    }

    // change height look
    public function change_master_height_fx(Request $request)
    {
        $widthQuery = MasterHeightModel::where('id',$_GET['id'])->get();
        foreach($widthQuery as $wQ)
        {
            $main_data = $wQ->master_height_length;
        }
        echo json_encode($main_data);
    }

    // price wish combination look
    public function choose_master_post_wish_price_fx(Request $request)
    {
        
        $check_price = PickUpFootPrintModel::where(['width_master' => $_GET['master_width'], 'height_master' => $_GET['master_height'], 'posts_master' => $_GET['master_post'] ])->get();
        
        
        $html['master_price'] = 0;
        $html['master_img'] = '';
        if(count($check_price) > 0)
        {
            foreach($check_price as $cQuery)
            {
                $html['master_price'] = $cQuery->price_master;
                if($cQuery->img_master != "" || $cQuery->img_master != null)
                {
                    $html['master_img'] = '<img src="'.str_replace("public","storage/app/public",asset($cQuery->img_master)).'" src="no image" />';
                }
                else if($cQuery->img_master == "" || $cQuery->img_master == null)
                {
                    $html['master_img'] = '';
                }
            }
        }
        echo json_encode($html);
    }

    // end of first page


    /// For second page data's

    public function show_overheads_fx2(Request $request)
    {
        $findQuery = PickOverheadShadesModel::where('admin_action','yes')->get();
        $html['overhead_types'] = "<option value=''>Choose a overhead shades</option>";
        if(count($findQuery) > 0)
        {
            
            foreach($findQuery as $fQuery)
            {
                $checked = "";
                if($request->session()->has('main_unique_session_key'))
                {
                    $mQuery_check = BeforeCheckoutFinalProductModel::where('unique_session_id',$request->session()->get('main_unique_session_key'))->get();
                    foreach($mQuery_check as $mQc)
                    {
                        if($mQc->final_overhead == $fQuery->id)
                        {
                            $checked = "selected";
                        }
                        
                    }
                }
                $html['overhead_types'] .= "<option value=".$fQuery->id." ".$checked.">".$fQuery->img_standard_name."</option>";
            }
        }
        echo json_encode($html);
    }

    public function choose_overheads_fx2(Request $request)
    {
        $findQuery = PickOverheadShadesModel::where(['admin_action' => 'yes', 'id' => $_GET['id']])->get();
        $html['overhead_price'] = 0;
        if(count($findQuery) > 0)
        {
            foreach($findQuery as $fQuery)
            {
                $html['overhead_price'] = $fQuery->price_details;
                if($fQuery->img_file == null || $fQuery->img_file == '')
                {
                    $html['overhead_img'] = '';
                }
                else if($fQuery->img_file != null || $fQuery->img_file != '')
                {
                    $html['overhead_img'] = '<img src="'.str_replace("public","storage/app/public",asset($fQuery->img_file)).'" src="no image" />';
                }
                
            }
        }
        echo json_encode($html);
    }

    /// end of Second page

    // start of fourth page
    public function show_pick_post_length_fx4(Request $request)
    {
        $chooseQuery = PickPostLengthModel::where(['admin_action' => 'yes'])->get();
        $html = '<option value="">Choose a post length</option>';
        if(count($chooseQuery) > 0)
        {
            foreach($chooseQuery as $cQuery)
            {    
                $checked = "";
                if($request->session()->has('main_unique_session_key'))
                {
                    $mQuery_check = BeforeCheckoutFinalProductModel::where('unique_session_id',$request->session()->get('main_unique_session_key'))->get();
                    foreach($mQuery_check as $mQc)
                    {
                        if($mQc->final_post_length == $cQuery->id)
                        {
                            $checked = "selected";
                        }
                        
                    }
                }
                $html .= '<option value='.$cQuery->id.' '.$checked.'>'.$cQuery->posts_length.'</option>';
            }
        }
        echo json_encode($html);
    }

    public function choose_pick_post_length_fx4(Request $request)
    {
        $chooseQuery = PickPostLengthModel::where(['admin_action' => 'yes', 'id' => $_GET['id']])->get();
        
        if(count($chooseQuery) > 0)
        {
            foreach($chooseQuery as $cQuery)
            {    
                $html['fourth_price'] = $cQuery->price_details;
                if($cQuery->img_file == null || $cQuery->img_file == "")
                {
                    $html['fourth_img'] = '';
                }
                else if($cQuery->img_file != null || $cQuery->img_file != "")
                {
                    $html['fourth_img'] = '<img src="'.str_replace("public","storage/app/public",asset($cQuery->img_file)).'" src="no image" />';
                }
            }
        }
        echo json_encode($html);
    }
    // end of fourth page

    // fifth start page
    public function show_pick_post_mount_fx5(Request $request)
    {
        $chooseQuery = PickPostMountBracketModel::where(['admin_action' => 'yes'])->get();
        $html = '<option value="">Choose a pick slap</option>';
        if(count($chooseQuery) > 0)
        {
            $checked = "";
                
            foreach($chooseQuery as $cQuery)
            {    
                if($request->session()->has('main_unique_session_key'))
                {
                    $mQuery_check = BeforeCheckoutFinalProductModel::where('unique_session_id',$request->session()->get('main_unique_session_key'))->get();
                    foreach($mQuery_check as $mQc)
                    {
                        if($mQc->final_post_mount == $cQuery->id)
                        {
                            $checked = "selected";
                        }
                        
                    }
                }
                $html .= '<option value='.$cQuery->id.' '.$checked.'>'.$cQuery->pick_slap_name.'</option>';
            }
        }
        echo json_encode($html);
    }

    public function choose_pick_post_mount_fx5(Request $request)
    {
        $chooseQuery = PickPostMountBracketModel::where(['id' => $_GET['id'] ,'admin_action' => 'yes'])->get();
        foreach($chooseQuery as $cQuery)
        {
            $html['price_list'] = $cQuery->price_details;
        }
        echo json_encode($html);
    }
    // end of fifth page

    // start of sixth page
    public function show_pick_canopy_fx6(Request $request)
    {
        $chooseQuery = PickCanopyModel::where(['admin_action' => 'yes'])->limit(1)->get();
        $html = "";
        if(count($chooseQuery) > 0)
        {
            foreach($chooseQuery as $cQuery)
            {
                $html .= '<p>'.ucwords($cQuery->canopy_question).'</p>
                <p>Note: '.$cQuery->canopy_note.'</p>
                <input type="hidden" name="" id="sixth-pregenerated-price-hidden-val-id" value="'.$cQuery->canopy_price.'" />
                <h4>Price <span>$<span id="sixth-price-panel-id">'.$cQuery->canopy_price.'</span></span></h4>';
            }
        }
        echo json_encode($html);
    }
    // start of sixth page

    // start of seventh page
    public function show_pick_lpanel_fx7(Request $request)
    {
        $chooseQuery = PickLouveredPanelModel::where(['admin_action' => 'yes'])->get();
        $html['lpanel_radio_panel'] = "";
        if(count($chooseQuery) > 0)
        {
            foreach($chooseQuery as $cQuery)
            {
                $checking_Checked = PickLouveredPanelModel::where(['admin_action' => 'yes'])->orderBy('id','asc')->limit(1)->get();
                foreach($checking_Checked as $c_new_price)
                {
                    $got_new_id = $c_new_price->id;
                }

                $checking_var = "";
                if($cQuery->id == $got_new_id)
                {
                    $checking_var = "checked";
                }
                $html['lpanel_radio_panel'] .= '<li><input type="radio" name="bracket" onclick=my_seveth_click("'.$cQuery->l_panel_price.'") '.$checking_var.'> '.$cQuery->l_panel_name.'</li>';
            }

                $checking_Checked_query = PickLouveredPanelModel::where(['admin_action' => 'yes'])->orderBy('id','asc')->limit(1)->get();
                foreach($checking_Checked_query as $c_new_price1)
                {
                    $html['new_price'] = $c_new_price1->l_panel_price;
                }
        }
        echo json_encode($html);
    }
    // end of seventh page

    // final page
    public function showFinalPage(Request $request)
    {
        $master_width = $_GET['master_width'];
        $master_height = $_GET['master_height']; 
        $master_post = $_GET['master_post'];
        $overhead_type_val = $_GET['overhead_type_val'];
        $post_length_val = $_GET['post_length_val'];


        $piller_count_query = PillerPostModel::where('id',$master_post)->get();
        foreach($piller_count_query as $pillerQuery)
        {
            $html['posts_no'] = $pillerQuery->no_of_posts;
        }

        $master_width_query = MasterWidthModel::where('id',$master_width)->get();
        foreach($master_width_query as $widthQuery)
        {
            $html['width_data'] = $widthQuery->master_width_length;
        }

        $master_height_query = MasterHeightModel::where('id',$master_height)->get();
        foreach($master_height_query as $heightQuery)
        {
            $html['height_data'] = $heightQuery->master_height_length;
        }

        $master_footprint_query = PickUpFootPrintModel::where(['height_master' => $master_height, 'width_master' => $master_width, 'posts_master' => $master_post ])->get();
        if(count($master_footprint_query) > 0)
        {
            foreach($master_footprint_query as $footprintQuery)
            {
                $html['footprint_data'] = $footprintQuery->id;

                $finalProductQuery = FinalProductModel::where(['pick_footprint' => $footprintQuery->id, 'overhead_shades' => $overhead_type_val, 'post_length' => $post_length_val ])->get();
                if(count($finalProductQuery) > 0)
                {
                    foreach($finalProductQuery as $finalPQuery)
                    {
                        $html['final_prod_img'] = "";
                        $html['final_footprint_img'] = "";
                        if($finalPQuery->final_product_img != "" || $finalPQuery->final_product_img != null){
                            $html['final_prod_img'] = '<img src="'.str_replace('public','storage/app/public',asset($finalPQuery->final_product_img)).'"  alt=""/>';
                        }
                        if($finalPQuery->final_footprint_img != "" || $finalPQuery->final_footprint_img != null){
                            $html['final_footprint_img'] = '<img src="'.str_replace('public','storage/app/public',asset($finalPQuery->final_footprint_img)).'"  alt=""/>';
                        }
                    }
                }
            }
        }

        $post_length_query = PickPostLengthModel::where('id',$post_length_val)->get();
        foreach($post_length_query as $pQuery)
        {
            $html['length_data'] = $pQuery->posts_length;
        }

        $overhead_query = PickOverheadShadesModel::where('id',$overhead_type_val)->get();
        foreach($overhead_query as $pOverQuery)
        {
            $html['overhead_data'] = $pOverQuery->img_standard_name;
        }

        echo json_encode($html);

    }
    // end of final page
}