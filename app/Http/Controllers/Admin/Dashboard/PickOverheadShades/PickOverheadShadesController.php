<?php

namespace App\Http\Controllers\Admin\Dashboard\PickOverheadShades;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\PickOverheadShades\PickOverheadShadesModel;

class PickOverheadShadesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function showPage(Request $request)
    {
        return view('backend.pages.pick-overhead-shades.pick-overhead-shades');
    }

    public function submitOverheadShades(Request $request)
    {
        $checkQuery = PickOverheadShadesModel::where(['img_standard_name' => strtolower($request->input('ladder_spacing')) ])->get();
        if(count($checkQuery) > 0)
        {
            $request->session()->flash('error_msg', 'This ladder spacing already added before');
            return redirect()->back();
        }
        else
        {
                if($request->hasFile('ladder_spacing_file'))
                {
                    $our_story_img = $request->file('ladder_spacing_file')->store('public/ladder_spacing');
                }
                else
                {
                    $our_story_img = "";
                }

            

                $insertArr = [
                    'img_standard_name' => strtolower($request->input('ladder_spacing')), 
                    'price_details' => $request->input('ladder_spacing_price'), 
                    'img_file' => $our_story_img, 
                    'admin_action' => 'yes', 
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                    
                ];
                $insertQuery = PickOverheadShadesModel::insert($insertArr);
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
        $showQuery = PickOverheadShadesModel::get();
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
                            <td>".ucwords($sQuery->img_standard_name)."<br /><b>$".$sQuery->price_details."</b></td>
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

    public function changeActionOverheadShades(Request $request)
    {
        if($_GET['state'] == "yes")
        {
            $state = "no";
        }
        else if($_GET['state'] == "no")
        {
            $state = "yes";
        }
        $changeQuery = PickOverheadShadesModel::where('id',$_GET['id'])->update(['admin_action' => $state]);
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

    public function delActionOverheadShades(Request $request)
    {
        $changeQuery = PickOverheadShadesModel::where('id',$_GET['id'])->delete();
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

    public function viewEditActionOverheadShades(Request $request)
    {
        $editQuery = PickOverheadShadesModel::where('id',$_GET['id'])->get();
        foreach($editQuery as $eQuery)
        {
            $html['name_type'] = $eQuery->img_standard_name;
            $html['price_details'] = $eQuery->price_details;
            $html['img_details'] = '<img src="'.asset(str_replace('public','storage/app/public',$eQuery->img_file)).'" alt="no image" width="100px"/>';
        }
        echo json_encode($html);
    }

    // edit fx

    public function editActionOverheadShades(Request $request, $main_edit_id)
    {
        $checkQuery = PickOverheadShadesModel::where('id','!=',$main_edit_id)->where('img_standard_name',strtolower($request->input('ladder_spacing')))->get();

        if(count($checkQuery) > 0)
        {
            $request->session()->flash('error_msg', 'This ladder spacing already added before');
            return redirect()->back();
        }
        else
        {
                if($request->hasFile('ladder_spacing_file'))
                {
                    $our_story_img = $request->file('ladder_spacing_file')->store('public/ladder_spacing');
                    $insertArr = [
                        'img_standard_name' => strtolower($request->input('ladder_spacing')), 
                        'price_details' => $request->input('ladder_spacing_price'), 
                        'img_file' => $our_story_img, 
                        'admin_action' => 'yes', 
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                        
                    ];
                    $insertQuery = PickOverheadShadesModel::where('id',$main_edit_id)->update($insertArr);
                }
                else
                {
                    $insertArr = [
                        'img_standard_name' => strtolower($request->input('ladder_spacing')), 
                        'price_details' => $request->input('ladder_spacing_price'), 
                        'admin_action' => 'yes', 
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                        
                    ];
                    $insertQuery = PickOverheadShadesModel::where('id',$main_edit_id)->update($insertArr);
                }

                if($insertQuery)
                {
                    $request->session()->flash('success_msg', 'Successfully Updated ');
                }
                else
                {
                    $request->session()->flash('error_msg', 'Nothing is updated ! Try  again later');
                }
                return redirect()->back();
        }
    }
}
