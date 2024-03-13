<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\wards;
use App\Models\Feeship;
use Illuminate\Support\Facades\Session;

class DeliveryController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('admin-login')->send();
        }
    }
    public function show_delivery()
    {
        $this->AuthLogin();
        return view('admin.delivery.show_delivery');
    }
    public function delivery()
    {
        $this->AuthLogin();
        $city = City::orderby('name_city', 'desc')->get();
        return view('admin.delivery.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'city') {
                $select_province = Province::where('matp', $data['ma_id'])->orderby('name_quanhuyen', 'desc')->get();
                $output .= '<option>--Chọn quận huyện--</option>';
                foreach ($select_province as $key => $province) {
                    $output .= '<option value="' . $province->maqh . '">' . $province->name_quanhuyen . '</option>';
                }
            } else {
                $select_wards = wards::where('maqh', $data['ma_id'])->orderby('name_xaphuong', 'desc')->get();
                $output .= '<option>--Chọn xã phường--</option>';
                foreach ($select_wards as $key => $wards) {
                    $output .= '<option value="' . $wards->xaid . '">' . $wards->name_xaphuong . '</option>';
                }
            }
        }
        echo $output;
    }
    public function insert_delivery(Request $request)
    {
        $data = $request->all();
        $feeship = new Feeship();
        $feeship->fee_matp = $data['city'];
        $feeship->fee_maqh = $data['province'];
        $feeship->fee_xaid = $data['wards'];
        $feeship->fee_feeship = $data['feeship'];
        $feeship->save();
    }
    public function select_feeship()
    {
        $feeship = Feeship::orderby('fee_id', 'desc')->get();
        $output = '';
        $output .=
            ' <table class="table table-hover align-middle mb-0">
                    <thread>
                        <tr>
                            <th>Tỉnh thành phố</th>
                            <th>Quận huyện</th>
                            <th>Xã phường</th>
                            <th>Phí vận chuyển</th>
                        </tr>
                    </thread>
                <tbody>';
        foreach ($feeship as $key => $fee) {
            $output .=
                '<tr>
                        <td>' . $fee->city->name_city . '</td>
                        <td>' . $fee->province->name_quanhuyen . '</td>
                        <td>' . $fee->wards->name_xaphuong . '</td>
                        <td contenteditable data-feeship_id="' . $fee->fee_id . '" class="fee_feeship_edit">' . number_format($fee->fee_feeship, 0, ',', '.') . '</td>
                    </tr>';
        }
        $output .=
            '</tbody>
                </table>';
        echo $output;
    }
    public function update_delivery(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $feeship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'], '.');
        $feeship->fee_feeship =  $fee_value;
        $feeship->save();
    }
}
