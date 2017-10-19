<?php

namespace App\Http\Controllers;

//use App\drug;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ptM;
use App\drugM;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function createbi(Request $req)
    {
    	$pid= $req->Pid;
    	$drugid= $req->drugid;
    	$quan= $req->Quantity;
        $exis=DB::table('patient')->where('Ptid','=',$pid)->first();
        if(is_null($exis))
        {
            $pt1=$req->Pid;
            $pt2=$req->Pname;
            $pt3=$req->Sex;
            $pt4=$req->age;
            $pt5=$req->Cont;
            $pt6=$req->Addr;
            $ar=array('Ptid'=>$pt1, 'PName'=>$pt2, 'Sex'=>$pt3, 'Age'=>$pt4, 'Contact'=>$pt5, 'Address'=>$pt6);
            DB::table('patient')->insert($ar);
        }
        
    	$amt=0;
    	$price = DB::table('drug')->where('DrugId', $drugid)->value('Price');
    	$amt=$price*$quan;
        $dy=DB::table('drug')->where('DrugId', $drugid)->value('Quantity');
        $tup=DB::table('drug')->where('DrugId', $drugid)->update(['Quantity'=>$dy-$quan]);
    	for($i=0, $count = count($req->txtbox);$i<$count;$i++) 
    	{
			 $x = $req->txtbox[$i];
			 $y = $req->txtbox1[$i];
			 $price=DB::table('drug')->where('DrugId','=', $x)->value('Price');
    		 $amt=$amt+($price*$y);
             $dy=DB::table('drug')->where('DrugId', $x)->value('Quantity');
             $tup=DB::table('drug')->where('DrugId', $x)->update(['Quantity'=>$dy-$y]);
             

		}
		$user=Auth::user();
		$data=array('Pid'=>$pid , 'BillAmount'=>$amt, 'Eid'=>  $user['id']);
    	DB::table('bill')->insert($data);
        $bno=DB::table('bill')->max('BillId');
        $d1=array('Billid'=>$bno, 'Drugid'=>$drugid, 'Quantity'=>$quan);
        DB::table('drugsinbill')->insert($d1);
        //$ids=ptM::all();
        $w=array($drugid);
        for($i=0, $count = count($req->txtbox);$i<$count;$i++)
        {
            //$w=$w->merge(
            $w[$i+1]=$req->txtbox[$i];
        }
        $ids = DB::table('drug')->whereIn('DrugId',$w)->get();
        //$quans = DB::table('drug')->whereIn('',[$req->txtbox,$drugid])->get();
        for($i=0, $count = count($req->txtbox);$i<$count;$i++) 
        {

             $x = $req->txtbox[$i];
             $y = $req->txtbox1[$i];
             //$ids1=$ids->merge(drugM::where('DrugId','=', $x)->get());
             $d=array('Billid'=>$bno, 'Drugid'=>$x, 'Quantity'=>$y);
             DB::table('drugsinbill')->insert($d);

        }
        $w1=array();
        for($i=0, $count = count($ids);$i<$count;$i++)
        {
            for($j=0, $count1 = count($req->txtbox);$j<$count1;$j++)
            {
                if($ids[$i]->DrugId == $req->txtbox[$j])
                {
                    $w1[$i]=$req->txtbox1[$j];
                }
            }
            if($ids[$i]->DrugId  == $drugid)
                $w1[$i]=$quan;
        }
    	return view('showbill')->with("ids",$ids)->with("quan",$w1);
    }

    function newuserbi(Request $req)
    {
        $r=-1;
        $pno=DB::table('patient')->max('PtId');
        return view('createbill')->with("p",$r)->with("r",$pno+1);
    }

    function minicreatebi(Request $req)
    {
        $pid=$req->Pid;
        $pt1=DB::table('patient')->where('Ptid','=', $pid)->value('Ptid');
        $pt2=DB::table('patient')->where('Ptid','=', $pid)->value('PName');
        $pt3=DB::table('patient')->where('Ptid','=', $pid)->value('Sex');
        $pt4=DB::table('patient')->where('Ptid','=', $pid)->value('Age');
        $pt5=DB::table('patient')->where('Ptid','=', $pid)->value('Contact');
        $pt6=DB::table('patient')->where('Ptid','=', $pid)->value('Address');
        return view('createbill')->with("pt1",$pt1)->with("pt2",$pt2)->with("pt3",$pt3)->with("pt4",$pt4)->with("pt5",$pt5)->with("pt6",$pt6)->with("p",0);
    }

    function AddDrugbi(Request $req)
    {
        $dnam=$req->Dname;
        $dq=$req->quan;
        $dp=$req->price;
        $exis=DB::table('drug')->where('DrugName','=',$dnam)->first();
        //echo $exis->Ptid;
        if(is_null($exis))
        {
            $tup=DB::table('drug')->max('DrugId');
            $d1=array('DrugId'=>$tup +1, 'DrugName'=>$dnam, 'Quantity'=>$dq, 'Price'=>$dp);
            DB::table('drug')->insert($d1);

        }
        else
        {
            $did=DB::table('drug')->where('DrugName','=',$dnam)->value('DrugId');
            //$did=$exis['DrugId'];//DB::table('drug')->where('DrugNmae','=',$exis)->value('DrugId');
            //$update=drug::where()
            $dqq=DB::table('drug')->where('DrugId','=',$did)->value('Quantity');
            $tup=DB::table('drug')->where('DrugId', $did)->update(['Quantity'=>$dqq+$dq]);//find($did);
            //$tup['Quantity']=$tup['Quantity'] + $dq;
            //$tup->save();
        }
        return view('Sucess');
    }
}
