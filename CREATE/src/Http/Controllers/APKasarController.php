<?php namespace Bantenprov\StatusRencanaPengadaan\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\StatusRencanaPengadaan\Facades\StatusRencanaPengadaan;

/* Models */
use Bantenprov\StatusRencanaPengadaan\Models\Bantenprov\StatusRencanaPengadaan\StatusRencanaPengadaan as PdrbModel;
use Bantenprov\StatusRencanaPengadaan\Models\Bantenprov\StatusRencanaPengadaan\Province;
use Bantenprov\StatusRencanaPengadaan\Models\Bantenprov\StatusRencanaPengadaan\Regency;

/* etc */
use Validator;

/**
 * The StatusRencanaPengadaanController class.
 *
 * @package Bantenprov\StatusRencanaPengadaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusRencanaPengadaanController extends Controller
{

    protected $province;

    protected $regency;

    protected $lpse_status_rencana_pengadaan;

    public function __construct(Regency $regency, Province $province, PdrbModel $lpse_status_rencana_pengadaan)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->lpse_status_rencana_pengadaan     = $lpse_status_rencana_pengadaan;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $lpse_status_rencana_pengadaan = $this->lpse-status-rencana-pengadaan->find($id);

        return response()->json([
            'negara'    => $lpse-status-rencana-pengadaan->negara,
            'province'  => $lpse-status-rencana-pengadaan->getProvince->name,
            'regencies' => $lpse-status-rencana-pengadaan->getRegency->name,
            'tahun'     => $lpse-status-rencana-pengadaan->tahun,
            'data'      => $lpse-status-rencana-pengadaan->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->lpse-status-rencana-pengadaan->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->lpse-status-rencana-pengadaan->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

