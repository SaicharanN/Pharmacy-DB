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
use App\billM;
use App\drugM;
use App\druginbillM;
use App\users;
use Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function createbi(Request $req)
    {
    	$pid= $req->Pid;
    	$drugN= $req->drugid;
        $drugid=DB::table('drug')->where('DrugName','=',$drugN)->value('DrugId');
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
            /*$ar=array('Ptid'=>$pt1, 'PName'=>$pt2, 'Sex'=>$pt3, 'Age'=>$pt4, 'Contact'=>$pt5, 'Address'=>$pt6);
            DB::table('patient')->insert($ar);*/
            $qq=new ptM;
            $qq->Ptid=$pt1;
            $qq->PName=$pt2;
            $qq->Sex=$pt3;
            $qq->Age=$pt4;
            $qq->Contact=$pt5;
            $qq->Address=$pt6;
            $qq->save();

        }
        
    	$amt=0;
    	$price = DB::table('drug')->where('DrugId', $drugid)->value('Price');
    	$amt=$price*$quan;
        $dy=DB::table('drug')->where('DrugId', $drugid)->value('Quantity');
        //$tup=DB::table('drug')->where('DrugId', $drugid)->update(['Quantity'=>$dy-$quan]);
        $dr1 = drugM::where('DrugId',$drugid)->update(['Quantity'=>$dy-$quan]);
        /*$dr1->Quantity=$dy-$quan;
        $dr1->save();*/
    	for($i=0, $count = count($req->txtbox);$i<$count;$i++) 
    	{
			 $x1 = $req->txtbox[$i];
             $x=DB::table('drug')->where('DrugName','=',$x1)->value('DrugId');
			 $y = $req->txtbox1[$i];
			 $price=DB::table('drug')->where('DrugId','=', $x)->value('Price');
    		 $amt=$amt+($price*$y);
             $dy=DB::table('drug')->where('DrugId', $x)->value('Quantity');
             //$tup=DB::table('drug')->where('DrugId', $x)->update(['Quantity'=>$dy-$y]);
             $dr1 = drugM::where('DrugId',$x)->update(['Quantity'=>$dy-$y]);
             /*$dr1->Quantity=$dy-$y;
             $dr1->save();*/
		}
		$user=Auth::user();
		/*$data=array('Pid'=>$pid , 'BillAmount'=>$amt, 'Eid'=>  $user['id']);
    	DB::table('bill')->insert($data);*/
        $qq1=new billM;
        $qq1->Pid=$pid;
        $qq1->BillAmount=$amt;
        $qq1->Eid=$user['id'];
        $qq1->save();

        $bno=DB::table('bill')->max('BillId');
        /*$d1=array('Billid'=>$bno, 'Drugid'=>$drugid, 'Quantity'=>$quan);*/
        $qq2=new druginbillM;
        $qq2->Billid=$bno;
        $qq2->Drugid=$drugid;
        $qq2->Quantity=$quan;
        $qq2->save();

        //DB::table('drugsinbill')->insert($d1);
        //$ids=ptM::all();
        $w=array($drugid);
        for($i=0, $count = count($req->txtbox);$i<$count;$i++)
        {
            //$w=$w->merge(
            $temp=$req->txtbox[$i];
            //$w[$i+1]=$req->txtbox[$i];
            $w[$i+1]=DB::table('drug')->where('DrugName','=',$temp)->value('DrugId');
        }
        $ids = DB::table('drug')->whereIn('DrugId',$w)->get();
        //$quans = DB::table('drug')->whereIn('',[$req->txtbox,$drugid])->get();
        for($i=0, $count = count($req->txtbox);$i<$count;$i++) 
        {

             $x1 = $req->txtbox[$i];
             $x=DB::table('drug')->where('DrugName','=',$x1)->value('DrugId');
             $y = $req->txtbox1[$i];
             //$ids1=$ids->merge(drugM::where('DrugId','=', $x)->get());
             //$d=array('Billid'=>$bno, 'Drugid'=>$x, 'Quantity'=>$y);
             $qq3=new druginbillM;
             $qq3->Billid=$bno;
             $qq3->Drugid=$x;
             $qq3->Quantity=$y;
             $qq3->save();

             //DB::table('drugsinbill')->insert($d);

        }
        $w1=array();
        for($i=0, $count = count($ids);$i<$count;$i++)
        {
            for($j=0, $count1 = count($req->txtbox);$j<$count1;$j++)
            {
                if($ids[$i]->DrugName == $req->txtbox[$j])
                {
                    $w1[$i]=$req->txtbox1[$j];
                }
            }
            if($ids[$i]->DrugId  == $drugid)
                $w1[$i]=$quan;
        }

    	return view('showbill')->with("ids",$ids)->with("quan",$w1)->with("req",$req)->with("bno",$bno);
    }

    function newuserbi(Request $req)
    {
        $r=-1;
        $pno=DB::table('patient')->max('PtId');
        $drug=DB::table('drug')->get();
        return view('createbill')->with("p",$r)->with("r",$pno+1)->with("drug",$drug);
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
        $drug=DB::table('drug')->get();
        return view('createbill')->with("pt1",$pt1)->with("pt2",$pt2)->with("pt3",$pt3)->with("pt4",$pt4)->with("pt5",$pt5)->with("pt6",$pt6)->with("p",0)->with("drug",$drug);
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
            //$d1=array('DrugId'=>$tup +1, 'DrugName'=>$dnam, 'Quantity'=>$dq, 'Price'=>$dp);
            $qq=new drugM;
            $qq->DrugId=$tup +1;
            $qq->DrugName=$dnam;
            $qq->Quantity=$dq;
            $qq->Price=$dp;
            $qq->save();
            //DB::table('drug')->insert($d1);

        }
        else
        {
            $did=DB::table('drug')->where('DrugName','=',$dnam)->value('DrugId');
            //$did=$exis['DrugId'];//DB::table('drug')->where('DrugNmae','=',$exis)->value('DrugId');
            //$update=drug::where()
            $dqq=DB::table('drug')->where('DrugId','=',$did)->value('Quantity');
            $tup=DB::table('drug')->where('DrugId', $did)->update(['Quantity'=>$dqq+$dq]);
            $tup=DB::table('drug')->where('DrugId', $did)->update(['Price'=>$dp]);

            //find($did);
            //$tup['Quantity']=$tup['Quantity'] + $dq;
            //$tup->save();
        }
        return view('Sucess');
    }

    function searchbi()
    {
        $drug=DB::table('drug')->get();
        return view('search')->with('drug',$drug);
    }

    function search1bi(Request $req)
    {
        $dN=$req->did;
        $drug=DB::table('drug')->where('DrugName','=',$dN)->get();
        $did=DB::table('drug')->where('DrugName','=',$dN)->value('DrugId');
        $bill=DB::table('bill')->get();
        $user=DB::table('users')->get();
        $dib=DB::table('drugsinbill')->where('Drugid','=',$did)->orderBy('created_at','desc')->get();
        return view('s1')->with("drug",$drug)->with("bill",$bill)->with("dib",$dib)->with("user",$user);
    }

    function search2bi(Request $req)
    {
        $pid=$req->Pid;
        $user=DB::table('users')->get();
        $bill=DB::table('bill')->get();
        $pt=DB::table('patient')->get();
        return view('s2')->with("bill",$bill)->with("user",$user)->with("pt",$pt)->with("pid",$pid);
    }
    function search3bi(Request $req)
    {
        $r=$req->did;
        $y=DB::table('bill')->where('BillId','=',$r)->first();
        $pt=DB::table('patient')->get();
        $user=DB::table('users')->get();
        $dib=DB::table('drugsinbill')->get();
        $drug=DB::table('drug')->get();
        return view('s3')->with("bill",$y)->with("pt",$pt)->with("user",$user)->with("dib",$dib)->with("drug",$drug);
    }
    function historybi()
    {
        $y=DB::table('bill')->orderBy('created_at', 'desc')->get();
        $user=DB::table('users')->get();
        return view('history')->with("bill",$y)->with("user",$user);
    }
    function profilebi()
    {
        $bill=DB::table('bill')->orderBy('created_at', 'desc')->get();
        $user=DB::table('users')->get();
        $dib=DB::table('drugsinbill')->get();
        return view('profile')->with("user",$user)->with("dib",$dib)->with("bill",$bill);
    }
    function editbi(Request $req)
    {
        $name=$req->name;
        $email=$req->email;
        $id=DB::table('users')->where('id','=',Auth::user()->id)->value('id');
        $r=DB::table('users')->where('id', $id)->update(['name'=>$name]);
        $r1=DB::table('users')->where('id', $id)->update(['email'=>$email]);
        //$dr1 = User::where('id',$id)->update(['name'=>$name]);
        //$dr1 = User::where('id',$id)->update(['email'=>$email]);
        return view('updated')->with("id",$id);
    }
    function passbi(Request $req)
    {
        
        $old=($req->old);
        $new=bcrypt($req->new);
        $pass=DB::table('users')->where('id','=',Auth::user()->id)->value('password');
        
        if(hash::check($old,$pass))
            $r=DB::table('users')->where('id', Auth::user()->id)->update(['password'=>$new]);
            return view('updated')->with("a",$old)->with("b",bcrypt($pass));
        
    }
}
