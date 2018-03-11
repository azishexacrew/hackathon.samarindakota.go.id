<?php

namespace App\Http\Controllers\API\Data\Rute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data\Rute\Rutetrack;

class RutetrackController extends Controller
{
  public function __construct(Request $request, Rutetrack $rutetrack)
  {
      $this->request = $request;
      $this->rutetrack = $rutetrack;
  }

  public function index()
  {
      $rutetrack = Rutetrack::with('rutedetail')->first();

      //return $rutetrack;
      return Rutetrack::all();
  }

  public function store(Request $request)
  {
      $data = Rutetrack::create($request->all());
      $rutetrack = Rutetrack::with('rutedetail')->first();

      return response()->json(['status' => 'success', 'input', 'data' => $data, $rutetrack]);
  }

  public function show($id)
  {
      $data = $this->rutetrack
                ->where('id', $id)->paginate(10);
      return response()->json( ['status' => 'success', 'data' => $data] );
  }

  public function update(Request $request, $id)
  {
      $data = $this->rutetrack::findOrFail($id);
      $data->update($request->all());
      $rutetrack = Rutetrack::with('rutedetail')->first();

      return response()->json(['status' => 'success', 'update','data' => $data, $rutetrack]);
  }

  public function destroy($id)
  {
      $data = $this->rutetrack::findOrFail($id);
      $data->delete();
      return '';
  }
}