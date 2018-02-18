<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ErpAgent;

class ErpAgentController extends Controller
{
    public function showAgent()
    {
      $agents = ErpAgent::all();

      return view('backend.erp.agent.agent', compact('agents'));
    }

    public function createAgent(Request $request){

      $insert = new ErpAgent();

      $insert->agent_name = $request->agent_name;
      $insert->agent_email = $request->agent_email;
      $insert->agent_phone = $request->agent_phone;
      $insert->agent_area = $request->agent_area;

      if($request->hasFile('agent_image')){
        $image = $request->file('agent_image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $request->agent_image->move(public_path('backendimages'), $filename);
        $insert->agent_image = $filename;
      }
      else{
        $filename = 'agent_dafault.png';
        $insert->agent_image = $filename;
      }

      $insert->save();

      return back();

    }

    public function viewAgent($id){

      $agent = ErpAgent::find($id);

      return response()->json(['agentdata'=>$agent]);
    }

    public function editAgent($id){

      $agent = ErpAgent::find($id);

      return response()->json(['agentdata'=>$agent]);
    }

    public function updateAgent(Request $request, $id){

      $update = ErpAgent::find($id);

      $update->agent_name = $request->agent_name;
      $update->agent_email = $request->agent_email;
      $update->agent_phone = $request->agent_phone;
      $update->agent_area = $request->agent_area;

      if($request->hasFile('agent_image')){
        $image = $request->file('agent_image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $request->agent_image->move(public_path('backendimages'), $filename);
        $update->agent_image = $filename;
      }

      $update->save();

      return back();

    }

    public function deleteAgent(Request $request){

      $agent_id = $request->agent_id;
      $agent = ErpAgent::find($agent_id);
      $agent->delete();

      return redirect('/adminerpagent');
    }





}
