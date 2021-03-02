<?php

namespace App\Http\Controllers\Admin\Dashboard\FinalProduct;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\FinalProduct\FinalProductModel;
use App\Model\Admin\PillerPost\PillerPostModel;
use App\Model\Admin\PickUpFootPrint\PickUpFootPrintModel;
use App\Model\Admin\PickOverheadShades\PickOverheadShadesModel;
use App\Model\Admin\PickPostLength\PickPostLengthModel;

class FinalProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showPage(Request $request)
    {
        return view('backend.pages.final-product.final-product');
    }

    public function submitOverheadShades(Request $request)
    {
        $checkQuery = FinalProductModel::where(['pick_footprint' => $request->input('post_length_width') , 'post_length' => $request->input('post_length') , 'overhead_shades' => $request->input('overhead_shades') ])->get();
        if(count($checkQuery) > 0)
        {
            $request->session()->flash('error_msg', 'This post length already added before');
            return redirect()->back();
        }
        else
        {
                if($request->hasFile('final_product_img'))
                {
                    $our_story_img = $request->file('final_product_img')->store('public/final_imgs');
                }
                else
                {
                    $our_story_img = "";
                }

                if($request->hasFile('final_footprint_img'))
                {
                    $our_story_img2 = $request->file('final_footprint_img')->store('public/final_imgs');
                }
                else
                {
                    $our_story_img2 = "";
                }

                $insertArr = [
                    'pick_footprint' => $request->input('post_length_width'), 
                    'post_length' => $request->input('post_length'), 
                    'overhead_shades' => $request->input('overhead_shades'),
                    'final_product_img' => $our_story_img,
                    'final_footprint_img' => $our_story_img2,
                    'admin_action' => 'yes', 
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $insertQuery = FinalProductModel::insert($insertArr);
                if($insertQuery)
                {
                    $request->session()->flash('success_msg', 'Successfully Inserted ');
                }
                else
                {
                    $request->session()->flash('error_msg', 'Something went wrong ! Try  again later');
                }
                return redirect()->back();
        }
    }


    public function showOverheadShades(Request $request)
    {
        $showQuery = FinalProductModel::get();
        if(count($showQuery) > 0)
        {
            $html = "";
            $i = 0;
            foreach($showQuery as $sQuery)
            {
                if($sQuery->admin_action == 'yes' )
                {
                    $status = '<span class="text-success"><i class="fa fa-check"></i> Active</span>';
                    $action_btn = '<a href="javascript: ;" onclick=make_btn_change("'.$sQuery->admin_action.'",'.$sQuery->id.') class="btn btn-sm btn-danger">Make it In-Active</a>';
                }
                else if($sQuery->admin_action == 'no' )
                {
                    $status = '<span class="text-danger"><i class="fa fa-times"></i> Deactive</span>';
                    $action_btn = '<a href="javascript: ;" onclick=make_btn_change("'.$sQuery->admin_action.'",'.$sQuery->id.') class="btn btn-sm btn-success">Make it Active</a>';
                }
                else
                {

                }

                if($sQuery->final_product_img == "" || $sQuery->final_product_img == null)
                {
                    $img_path = "No Image";
                }
                else
                {
                    $change_path = str_replace('public','storage/app/public',$sQuery->final_product_img);
                    $img_path = '<img src="'.asset($change_path).'" alt="no image" width="100px" />';
                }

                $del_state = '<a href="javascript: ;" onclick=make_del_change('.$sQuery->id.') class="text-danger"><i class="fa fa-trash"></i></a>';

                $edit_state = '<a href="javascript: ;" onclick=make_edit_change('.$sQuery->id.') class="text-info"><i class="fa fa-edit"></i></a>';

                //

                $mainQuery01 = PickUpFootPrintModel::where('id',$sQuery->pick_footprint)->get();
                foreach($mainQuery01 as $mQuery01)
                {
                        $getQuery01 = PillerPostModel::where('id',$mQuery01->posts_master)->get();
                        foreach($getQuery01 as $gQuery01)
                        {
                            $posts_no01 = $gQuery01->no_of_posts;
                        }

                        $combination_types_name = $mQuery01->height_master.' ft. height x '.$mQuery01->width_master.' ft. width ,'.$posts_no01.' posts ';
                }

                //

                    $mainQuery02 = PickPostLengthModel::where('id',$sQuery->post_length)->get();
                    foreach($mainQuery02 as $mQuery02)
                    {
                            $post_length_combination = $mQuery02->posts_length.' ft.';            
                    }
                
                //

                    $mainQuery03 = PickOverheadShadesModel::where('id',$sQuery->overhead_shades)->get();
                    foreach($mainQuery03 as $mQuery03)
                    {
                            $overheadShades_combination = $mQuery03->img_standard_name;            
                    }
                
                $html .= "<tr>
                            <td>".++$i."</td>
                            <td>".$img_path."</td>
                            <td>".$combination_types_name."</td>
                            <td>".$post_length_combination."</td>
                            <td>".ucwords($overheadShades_combination)."</td>
                            <td>".$status."</td>
                            <td>".$action_btn." ".$del_state." ".$edit_state."</td>
                        </tr>";
            }
        }
        else
        {
            $html = '<tr>
                        <td colspan="5"><center class="text-danger"><i class="fa fa-times"></i> No Data</center></td>
                    </tr>';   
        }

        echo json_encode($html);
    }

    public function overheadShadesActionChange(Request $request)
    {
        if($_GET['state'] == "yes")
        {
            $state = "no";
        }
        else if($_GET['state'] == "no")
        {
            $state = "yes";
        }
        $changeQuery = FinalProductModel::where('id',$_GET['id'])->update(['admin_action' => $state]);
        if($changeQuery)
        {
            $msg = "success";
        }
        else
        {
            $msg = "error";
        }

        echo json_encode($msg);
    }


    // choose footprint

    public function choose_footprint_fx(Request $request)
    {
        $html = '<option value="">Choose a combination</option>';
        $mainQuery = PickUpFootPrintModel::get();
        $i = 0;
        $count = count($mainQuery);
        foreach($mainQuery as $mQuery)
        {
                $getQuery = PillerPostModel::where('id',$mQuery->posts_master)->get();
                foreach($getQuery as $gQuery)
                {
                    $posts_no = $gQuery->no_of_posts;
                }

                $html.= '<option value='.$mQuery->id.'>'.$mQuery->height_master.' ft. height x '.$mQuery->width_master.' ft. width ,'.$posts_no.' posts </option>';
                $i++;
           
            
        }

        echo json_encode($html);
    }

    public function choose_post_length_fx(Request $request)
    {
        $html = '<option value="">Choose a post length</option>';
        $mainQuery = PickPostLengthModel::get();
        foreach($mainQuery as $mQuery)
        {
                $html.= '<option value='.$mQuery->id.'>'.$mQuery->posts_length.' ft.</option>';            
        }

        echo json_encode($html);
    }

    public function choose_overhead_shades_fx(Request $request)
    {
        $html = '<option value="">Choose a overhead shades type</option>';
        $mainQuery = PickOverheadShadesModel::get();
        foreach($mainQuery as $mQuery)
        {
                $html.= '<option value='.$mQuery->id.'>'.$mQuery->img_standard_name.'</option>';            
        }

        echo json_encode($html);
    }


    // delete fx
    public function delActionFx(Request $request)
    {
        $changeQuery = FinalProductModel::where('id',$_GET['id'])->delete();
        if($changeQuery)
        {
            $msg = "success";
        }
        else
        {
            $msg = "error";
        }

        echo json_encode($msg);
    }

    public function viewEditActionFx(Request $request)
    {
        $changeQuery = FinalProductModel::where('id',$_GET['id'])->get();
        foreach($changeQuery as $cData)
        {
            //
            $html['img_file_name'] = '<img src="'.asset(str_replace('public','storage/app/public',$cData->final_product_img)).'" alt="no image" width="100px" />';
            $html['footprint_file_name'] = '<img src="'.asset(str_replace('public','storage/app/public',$cData->final_footprint_img)).'" alt="no image" width="100px" />';
            // 
            $html['combination'] = '<option value="">Choose a combination</option>';
            $mainQuery = PickUpFootPrintModel::get();
            $i = 0;
            $count = count($mainQuery);
            foreach($mainQuery as $mQuery)
            {
                    $getQuery = PillerPostModel::where('id',$mQuery->posts_master)->get();
                    foreach($getQuery as $gQuery)
                    {
                        $posts_no = $gQuery->no_of_posts;
                    }

                    $sel_var = "";
                    if($mQuery->id == $cData->pick_footprint)
                    {
                        $sel_var = "selected";
                    }

                    $html['combination'] .= '<option value='.$mQuery->id.' '.$sel_var.'>'.$mQuery->height_master.' ft. height x '.$mQuery->width_master.' ft. width ,'.$posts_no.' posts </option>';
                    $i++;
            
                
            }

            //

            $html['post_length'] = '<option value="">Choose a post length</option>';
            $mainQuery1 = PickPostLengthModel::get();
            foreach($mainQuery1 as $mQuery1)
            {
                    $sel_var1 = "";
                    if($mQuery1->id == $cData->post_length)
                    {
                        $sel_var1 = "selected";
                    }
                    $html['post_length'] .= '<option value='.$mQuery1->id.' '.$sel_var1.'>'.$mQuery1->posts_length.' ft.</option>';            
            }

            //

            $html['img_standard'] = '<option value="">Choose a overhead shades type</option>';
            $mainQuery2 = PickOverheadShadesModel::get();
            foreach($mainQuery2 as $mQuery2)
            {
                    $sel_var2 = "";
                    if($mQuery2->id == $cData->overhead_shades)
                    {
                        $sel_var2 = "selected";
                    }
                    $html['img_standard'] .= '<option value='.$mQuery2->id.' '.$sel_var2.'>'.$mQuery2->img_standard_name.'</option>';            
            }
        }

        echo json_encode($html);
    }

    
    public function editActionFx(Request $request, $my_data)
    {
        $checkQuery = FinalProductModel::where('id','!=',$my_data)->where(['pick_footprint' => $request->input('post_length_width') , 'post_length' => $request->input('post_length') , 'overhead_shades' => $request->input('overhead_shades') ])->get();
        if(count($checkQuery) > 0)
        {
            $request->session()->flash('error_msg', 'This post length already added before');
            return redirect()->back();
        }
        else
        {
                if($request->hasFile('final_product_img') && $request->hasFile('final_footprint_img'))
                {
                    $our_story_img = $request->file('final_product_img')->store('public/final_imgs');
                    $our_story_img2 = $request->file('final_footprint_img')->store('public/final_imgs');
                    $insertArr = [
                        'pick_footprint' => $request->input('post_length_width'), 
                        'post_length' => $request->input('post_length'), 
                        'overhead_shades' => $request->input('overhead_shades'),
                        'final_product_img' => $our_story_img,
                        'final_footprint_img' => $our_story_img2,
                        'admin_action' => 'yes', 
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    $insertQuery = FinalProductModel::where('id',$my_data)->update($insertArr);
                }
                else if($request->hasFile('final_product_img'))
                {
                    $our_story_img = $request->file('final_product_img')->store('public/final_imgs');
                    $our_story_img2 = $request->file('final_footprint_img')->store('public/final_imgs');
                    $insertArr = [
                        'pick_footprint' => $request->input('post_length_width'), 
                        'post_length' => $request->input('post_length'), 
                        'overhead_shades' => $request->input('overhead_shades'),
                        'final_product_img' => $our_story_img,
                        'admin_action' => 'yes', 
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    $insertQuery = FinalProductModel::where('id',$my_data)->update($insertArr);
                }
                else if($request->hasFile('final_footprint_img'))
                {
                    $our_story_img2 = $request->file('final_footprint_img')->store('public/final_imgs');
                    $insertArr = [
                        'pick_footprint' => $request->input('post_length_width'), 
                        'post_length' => $request->input('post_length'), 
                        'overhead_shades' => $request->input('overhead_shades'),
                        'final_footprint_img' => $our_story_img2,
                        'admin_action' => 'yes', 
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    $insertQuery = FinalProductModel::where('id',$my_data)->update($insertArr);
                }
                else
                {
                    $insertArr = [
                        'pick_footprint' => $request->input('post_length_width'), 
                        'post_length' => $request->input('post_length'), 
                        'overhead_shades' => $request->input('overhead_shades'),
                        'admin_action' => 'yes', 
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    $insertQuery = FinalProductModel::where('id',$my_data)->update($insertArr);
                }

                
                if($insertQuery)
                {
                    $request->session()->flash('success_msg', 'Successfully Updated ');
                }
                else
                {
                    $request->session()->flash('error_msg', 'Something went wrong ! Try  again later');
                }
                return redirect()->back();
        }
    }
}
