<?php

namespace App\Http\Controllers\Admin\Dashboard\PickPostLength;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\PickPostLength\PickPostLengthModel;

class PickPostLengthController extends Controller
{
        //
        public function __construct()
        {
            $this->middleware('auth:admin');
        }
    
    
        public function showPage(Request $request)
        {
            return view('backend.pages.pick-post-length.pick-post-length');
        }
    
        public function submitOverheadShades(Request $request)
        {
            $checkQuery = PickPostLengthModel::where(['posts_length' => $request->input('post_length') ])->get();
            if(count($checkQuery) > 0)
            {
                $request->session()->flash('error_msg', 'This post length already added before');
                return redirect()->back();
            }
            else
            {
                    if($request->hasFile('post_length_file'))
                    {
                        $our_story_img = $request->file('post_length_file')->store('public/post_length');
                    }
                    else
                    {
                        $our_story_img = "";
                    }
    
                
    
                    $insertArr = [
                        'posts_length' => $request->input('post_length'), 
                        'price_details' => $request->input('post_length_price'), 
                        'img_file' => $our_story_img, 
                        'admin_action' => 'yes', 
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                        
                    ];
                    $insertQuery = PickPostLengthModel::insert($insertArr);
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
            $showQuery = PickPostLengthModel::get();
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
    
                    if($sQuery->img_file == "" || $sQuery->img_file == null)
                    {
                        $img_path = "No Image";
                    }
                    else
                    {
                        $change_path = str_replace('public','storage/app/public',$sQuery->img_file);
                        $img_path = '<img src="'.asset($change_path).'" alt="no image" width="100px" />';
                    }

                    $del_state = '<a href="javascript: ;" onclick=make_del_change('.$sQuery->id.') class="text-danger"><i class="fa fa-trash"></i></a>';

                    $edit_state = '<a href="javascript: ;" onclick=make_edit_change('.$sQuery->id.') class="text-info"><i class="fa fa-edit"></i></a>';
                    
                    
                    $html .= "<tr>
                                <td>".++$i."</td>
                                <td>".$img_path."</td>
                                <td> Size : ".$sQuery->posts_length." ft.<br /><b>Price : $".$sQuery->price_details."</b></td>
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
            $changeQuery = PickPostLengthModel::where('id',$_GET['id'])->update(['admin_action' => $state]);
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


        // del fx
        public function delActionChange(Request $request)
        {
            $changeQuery = PickPostLengthModel::where('id',$_GET['id'])->delete();
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

        // view edit fx
        public function viewEditActionChange(Request $request)
        {
            $editQuery = PickPostLengthModel::where('id',$_GET['id'])->get();
            foreach($editQuery as $eQuery)
            {
                $html['name_type'] = $eQuery->posts_length;
                $html['price_details'] = $eQuery->price_details;
                $html['img_details'] = '<img src="'.asset(str_replace('public','storage/app/public',$eQuery->img_file)).'" alt="no image" width="100px"/>';
            }
            echo json_encode($html);
        }

        // edit fx
        public function editActionChange(Request $request, $edit_id)
        {
            $checkQuery = PickPostLengthModel::where('id','!=',$edit_id)->where(['posts_length' => $request->input('post_length') ])->get();
            if(count($checkQuery) > 0)
            {
                $request->session()->flash('error_msg', 'This post length already added before');
                return redirect()->back();
            }
            else
            {
                    if($request->hasFile('post_length_file'))
                    {
                        $our_story_img = $request->file('post_length_file')->store('public/post_length');
                        $insertArr = [
                            'posts_length' => $request->input('post_length'), 
                            'price_details' => $request->input('post_length_price'), 
                            'img_file' => $our_story_img, 
                            'admin_action' => 'yes', 
                            'updated_at' => date('Y-m-d H:i:s')
                            
                        ];
                        $insertQuery = PickPostLengthModel::where('id',$edit_id)->update($insertArr);
                    }
                    else
                    {
                        $insertArr = [
                            'posts_length' => $request->input('post_length'), 
                            'price_details' => $request->input('post_length_price'), 
                            'admin_action' => 'yes', 
                            'updated_at' => date('Y-m-d H:i:s')
                            
                        ];
                        $insertQuery = PickPostLengthModel::where('id',$edit_id)->update($insertArr);
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
