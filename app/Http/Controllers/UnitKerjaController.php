namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKerja;

class UnitKerjaController extends Controller
{
    public function getUnits(Request $request)
    {
        $search = $request->get('q');
        $units = UnitKerja::where('nama', 'like', '%' . $search . '%')->get();

        return response()->json($units);
    }
}
